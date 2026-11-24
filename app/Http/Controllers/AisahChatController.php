<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Models\PengaturanUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AisahChatController extends Controller
{
    /**
     * Halaman Web Chat Full-Screen khusus Aisah
     */
    public function page()
    {
        $pengaturan = PengaturanUmum::first();
        return view('pages.aisah', compact('pengaturan'));
    }

    /**
     * Ambil riwayat chat berdasarkan session_token untuk full-screen chat
     */
    public function history(Request $request)
    {
        $token = $request->query('session_token');
        if (!$token) {
            return response()->json(['messages' => []]);
        }

        $session = ChatSession::where('session_token', $token)->first();
        if (!$session) {
            return response()->json(['messages' => []]);
        }

        $messages = $session->messages()
            ->orderBy('created_at')
            ->get(['role', 'message', 'ai_provider', 'created_at']);

        return response()->json([
            'session_token' => $token,
            'messages'      => $messages,
        ]);
    }

    /**
     * Proxy pesan ke Aisah Bot + simpan ke database.
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message'      => 'required|string|max:1000',
            'session_token' => 'nullable|string|max:64',
        ]);

        $message      = trim($request->input('message'));
        $sessionToken = $request->input('session_token') ?: (string) Str::uuid();

        // 1. Cari atau buat sesi chat
        $session = ChatSession::firstOrCreate(
            ['session_token' => $sessionToken],
            [
                'ip_address'    => $request->ip(),
                'user_agent'    => substr($request->userAgent() ?? '', 0, 500),
                'page_origin'   => $request->header('referer', '/'),
                'started_at'    => now(),
                'last_active_at' => now(),
            ]
        );

        // 2. Simpan pesan user
        ChatMessage::create([
            'chat_session_id'  => $session->id,
            'role'             => 'user',
            'message'          => $message,
            'created_at'       => now(),
        ]);

        // 3. Kirim ke Aisah Bot
        $aisahUrl     = rtrim(env('AISAH_BOT_URL', 'http://localhost:3000'), '/');
        $timeout      = (int) env('AISAH_TIMEOUT', 60);
        $startTime    = microtime(true);

        try {
            $response = Http::timeout($timeout)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post("{$aisahUrl}/api/test-chat", [
                    'message'   => $message,
                    'sessionId' => "web_{$sessionToken}",
                ]);

            $responseMs = (int) ((microtime(true) - $startTime) * 1000);

            if (! $response->successful()) {
                throw new \Exception("Aisah API error: HTTP {$response->status()}");
            }

            $data  = $response->json();
            $reply = $data['reply'] ?? 'Maaf, Aisah tidak memberikan balasan.';

            // 4. Simpan balasan Aisah
            ChatMessage::create([
                'chat_session_id'  => $session->id,
                'role'             => 'aisah',
                'message'          => $reply,
                'ai_provider'      => isset($data['provider']) ? substr($data['provider'], 0, 100) : null,
                'context_retrieved' => (bool) ($data['contextRetrieved'] ?? false),
                'response_time_ms' => $responseMs,
                'created_at'       => now(),
            ]);

            // 5. Update sesi
            $session->increment('message_count', 2);
            $session->update(['last_active_at' => now()]);

            return response()->json([
                'success'       => true,
                'reply'         => $reply,
                'provider'      => $data['provider'] ?? null,
                'session_token' => $sessionToken,
            ]);

        } catch (\Exception $e) {
            Log::error('[AisahChat] Gagal menghubungi Aisah Bot: ' . $e->getMessage());

            $session->increment('message_count', 1);
            $session->update(['last_active_at' => now()]);

            return response()->json([
                'success' => false,
                'error'   => 'Mohon maaf, Aisah sedang membutuhkan waktu sedikit lebih lama untuk merespons. Silakan coba kirim ulang pertanyaan Anda ya Bapak/Ibu.',
                'session_token' => $sessionToken,
            ], 503);
        }
    }

    /**
     * Cek status Aisah Bot (untuk indikator online/offline di widget).
     */
    public function status()
    {
        $aisahUrl = rtrim(env('AISAH_BOT_URL', 'http://localhost:3000'), '/');

        try {
            $response = Http::timeout(5)->get("{$aisahUrl}/api/status");

            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'online'   => true,
                    'botName'  => $data['botName'] ?? 'Aisah',
                    'provider' => $data['aiProvider'] ?? null,
                ]);
            }
        } catch (\Exception $e) {
            // Aisah tidak bisa dihubungi
        }

        return response()->json(['online' => false], 200);
    }
}
