{{-- ============================================================ --}}
{{-- AISAH LIVE CHAT WIDGET - Pesantren Al Amin                 --}}
{{-- Proxy via Laravel → Aisah Bot (Node.js)                   --}}
{{-- Riwayat disimpan ke database (chat_sessions, chat_messages)--}}
{{-- ============================================================ --}}

@if(!request()->is('aisah*', 'chat*'))
{{-- ── CSRF meta (jika belum ada di layout head) ── --}}
@once
<meta name="csrf-token" content="{{ csrf_token() }}">
@endonce

<style>
    /* Styling pasti (bebas dari dependensi build CSS Tailwind) */
    #aisahToggleBtn {
        position: fixed !important;
        bottom: 80px !important;
        right: 16px !important;
        z-index: 99999 !important;
        width: 52px !important;
        height: 52px !important;
        border-radius: 9999px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: linear-gradient(135deg, #16a34a, #15803d) !important;
        box-shadow: 0 10px 25px rgba(22, 163, 74, 0.45) !important;
        cursor: pointer !important;
        border: none !important;
        outline: none !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    #aisahToggleBtn:hover {
        transform: scale(1.08) !important;
    }
    #aisahToggleBtn:active {
        transform: scale(0.95) !important;
    }
    #aisahChatWindow {
        position: fixed !important;
        bottom: 142px !important;
        right: 12px !important;
        left: 12px !important;
        z-index: 100000 !important;
        max-width: 380px !important;
        margin-left: auto !important;
        max-height: calc(100vh - 165px) !important;
        border-radius: 16px !important;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25) !important;
        border: 1px solid rgba(22, 163, 74, 0.25) !important;
        background: #ffffff !important;
    }
    @media (min-width: 640px) {
        #aisahToggleBtn {
            bottom: 24px !important;
            right: 24px !important;
            width: 58px !important;
            height: 58px !important;
        }
        #aisahChatWindow {
            bottom: 92px !important;
            right: 24px !important;
            left: auto !important;
            width: 380px !important;
            max-height: 520px !important;
        }
    }
</style>

{{-- ── Toggle Button (Ganti tombol WA) ── --}}
<button id="aisahToggleBtn"
    onclick="toggleAisahChat()"
    aria-label="Chat dengan Aisah AI">
    <span id="aisahIconChat">
        {{-- Icon chat bubble --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 24 24">
            <path d="M12 2C6.477 2 2 6.253 2 11.5c0 1.938.575 3.74 1.563 5.247L2.03 21.142a.5.5 0 0 0 .633.633l4.395-1.533A10.432 10.432 0 0 0 12 21c5.523 0 10-4.253 10-9.5S17.523 2 12 2Z"/>
        </svg>
    </span>
    <span id="aisahIconClose" class="hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24">
            <path d="M18 6 6 18M6 6l12 12" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
        </svg>
    </span>
    {{-- Badge notifikasi --}}
    <span id="aisahNotifBadge"
        class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center font-bold hidden"
        style="font-size:11px;">1</span>
</button>

{{-- ── Jendela Chat ── --}}
<div id="aisahChatWindow"
    class="hidden flex-col overflow-hidden">

    {{-- Header --}}
    <div class="flex items-center gap-3 px-4 py-3 flex-shrink-0"
        style="background: linear-gradient(135deg, #16a34a, #15803d);">
        <div class="relative flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/>
                </svg>
            </div>
            <span id="aisahStatusDot"
                class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full"
                style="background:#fca5a5;"></span>
        </div>
        <div class="flex-1 min-w-0">
            <div class="text-white font-semibold text-sm leading-tight">Aisah</div>
            <div class="text-green-100 text-xs" id="aisahStatusText">AI Customer Service Al Amin</div>
        </div>
        <div class="flex items-center gap-1">
            <a href="{{ route('aisah.page') }}"
                class="text-white/70 hover:text-white p-1.5 rounded-lg hover:bg-white/10 transition-colors flex-shrink-0"
                title="Buka Layar Penuh">
                <i class="ti ti-arrows-maximize text-base"></i>
            </a>
            <button onclick="toggleAisahChat()"
                class="text-white/70 hover:text-white p-1.5 rounded-lg hover:bg-white/10 transition-colors flex-shrink-0"
                aria-label="Tutup chat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Area Pesan --}}
    <div id="aisahMessages"
        class="flex-1 overflow-y-auto p-4 space-y-3"
        style="background:#f8faf9; min-height:260px; max-height:300px;">

        {{-- Pesan sambutan --}}
        <div class="flex items-end gap-2">
            <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                style="background:linear-gradient(135deg,#16a34a,#15803d)">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="white" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/>
                </svg>
            </div>
            <div class="max-w-[82%]">
                <div class="bg-white rounded-2xl rounded-bl-sm px-3.5 py-2.5 text-sm text-gray-700 shadow-sm border border-gray-100 leading-relaxed">
                    Assalamu'alaikum! 👋 Saya <strong>Aisah</strong>, asisten AI Pesantren Al Amin.<br>
                    Ada yang bisa saya bantu seputar SPMB atau informasi pesantren?
                </div>
                <div class="text-xs text-gray-400 mt-1 ml-1">Aisah • Sekarang</div>
            </div>
        </div>
    </div>

    {{-- Area Input --}}
    <div class="border-t border-gray-100 px-3 py-3 bg-white flex-shrink-0">
        <div class="flex items-end gap-2">
            <textarea id="aisahInput"
                placeholder="Ketik pesan..."
                rows="1"
                class="flex-1 resize-none rounded-xl border border-gray-200 px-3 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                style="max-height:90px; line-height:1.4; focus-ring-color:#16a34a;"
                onkeydown="aisahHandleKey(event)"
                oninput="aisahResizeTextarea(this)"></textarea>
            <button id="aisahSendBtn"
                onclick="aisahSendMessage()"
                class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center transition-all hover:scale-105 active:scale-95"
                style="background:linear-gradient(135deg,#16a34a,#15803d);"
                aria-label="Kirim pesan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 24 24">
                    <path d="M22 2 11 13M22 2 15 22l-4-9-9-4 20-7Z"/>
                </svg>
            </button>
        </div>
        <p class="text-xs text-gray-400 text-center mt-2 leading-tight">
            Dijawab AI · Jawaban mungkin kurang akurat, harap verifikasi
        </p>
    </div>
</div>

<script>
(function () {
    'use strict';

    // ─── Konfigurasi ───────────────────────────────────────────
    const API_CHAT   = '/aisah/chat';
    const API_STATUS = '/aisah/status';
    const LS_TOKEN   = 'aisah_session_token';

    // ─── State ─────────────────────────────────────────────────
    let isOpen    = false;
    let isBusy    = false;
    let sessionToken = localStorage.getItem(LS_TOKEN) || null;

    // Tampilkan badge setelah 4 detik
    setTimeout(function () {
        var badge = document.getElementById('aisahNotifBadge');
        if (badge && !isOpen) badge.classList.remove('hidden');
    }, 4000);

    // Cek status Aisah saat halaman dimuat
    checkStatus();

    // ─── Toggle buka/tutup chat ────────────────────────────────
    window.toggleAisahChat = function () {
        isOpen = !isOpen;
        var win   = document.getElementById('aisahChatWindow');
        var iChat = document.getElementById('aisahIconChat');
        var iClose = document.getElementById('aisahIconClose');
        var badge = document.getElementById('aisahNotifBadge');

        if (isOpen) {
            win.classList.remove('hidden');
            win.classList.add('flex');
            iChat.classList.add('hidden');
            iClose.classList.remove('hidden');
            badge.classList.add('hidden');
            setTimeout(function () {
                var inp = document.getElementById('aisahInput');
                if (inp) inp.focus();
                scrollToBottom();
            }, 150);
        } else {
            win.classList.add('hidden');
            win.classList.remove('flex');
            iChat.classList.remove('hidden');
            iClose.classList.add('hidden');
        }
    };

    // ─── Enter kirim (Shift+Enter = newline) ──────────────────
    window.aisahHandleKey = function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            aisahSendMessage();
        }
    };

    window.aisahResizeTextarea = function (el) {
        el.style.height = 'auto';
        el.style.height = Math.min(el.scrollHeight, 90) + 'px';
    };

    // ─── Kirim pesan ───────────────────────────────────────────
    window.aisahSendMessage = async function () {
        var input = document.getElementById('aisahInput');
        var msg   = input.value.trim();
        if (!msg || isBusy) return;

        input.value = '';
        input.style.height = 'auto';
        isBusy = true;

        appendBubble(msg, 'user');

        var typingId = showTyping();

        try {
            var csrf = document.querySelector('meta[name="csrf-token"]');
            var res  = await fetch(API_CHAT, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf ? csrf.content : '',
                },
                body: JSON.stringify({
                    message:       msg,
                    session_token: sessionToken,
                }),
            });

            removeTyping(typingId);

            var data = await res.json();

            // Simpan session_token jika baru
            if (data.session_token) {
                sessionToken = data.session_token;
                localStorage.setItem(LS_TOKEN, sessionToken);
            }

            if (data.reply) {
                appendBubble(data.reply, 'aisah', data.provider);
            } else {
                appendBubble(data.error || 'Maaf, terjadi kesalahan.', 'aisah');
            }

        } catch (err) {
            removeTyping(typingId);
            appendBubble('Maaf, Aisah sedang tidak dapat dihubungi. Silakan coba lagi atau hubungi kami melalui WhatsApp. 🙏', 'aisah');
        } finally {
            isBusy = false;
        }
    };

    // ─── Tambah bubble pesan ───────────────────────────────────
    function appendBubble(text, role, provider) {
        var container = document.getElementById('aisahMessages');
        var isUser    = role === 'user';
        var time      = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

        var wrap = document.createElement('div');
        wrap.className = 'flex items-end gap-2' + (isUser ? ' flex-row-reverse' : '');

        var avatar = isUser ? '' : '<div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center" style="background:linear-gradient(135deg,#16a34a,#15803d)">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="white" viewBox="0 0 24 24"><path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/></svg></div>';

        var bubbleClass = isUser
            ? 'rounded-2xl rounded-br-sm px-3.5 py-2.5 text-sm text-white leading-relaxed'
            : 'bg-white rounded-2xl rounded-bl-sm px-3.5 py-2.5 text-sm text-gray-700 shadow-sm border border-gray-100 leading-relaxed';
        var bubbleStyle = isUser
            ? 'style="background:linear-gradient(135deg,#16a34a,#15803d);white-space:pre-wrap"'
            : 'style="white-space:pre-wrap"';

        var meta = isUser
            ? '<div class="text-xs text-gray-400 mt-1 mr-1 text-right">Kamu · ' + time + '</div>'
            : '<div class="text-xs text-gray-400 mt-1 ml-1">Aisah' + (provider ? ' · ' + provider : '') + ' · ' + time + '</div>';

        wrap.innerHTML = avatar + '<div class="max-w-[82%]"><div class="' + bubbleClass + '" ' + bubbleStyle + '>' + formatBubbleText(text, isUser) + '</div>' + meta + '</div>';
        container.appendChild(wrap);
        scrollToBottom();
    }

    function formatBubbleText(text, isUser) {
        var html = esc(text);
        if (isUser) return html;

        // Bold *text*
        html = html.replace(/\*(.*?)\*/g, '<strong>$1</strong>');
        // Bullet points
        html = html.replace(/^• (.*?)$/gm, '<div style="display:flex;gap:5px;margin:2px 0;"><span style="color:#16a34a;">•</span><span>$1</span></div>');
        // Images (jpg, jpeg, png, webp)
        html = html.replace(/(https?:\/\/[^\s<]+\.(?:jpg|jpeg|png|webp))/gi, function(url) {
            return '<div style="margin:8px 0;">' +
                '<a href="' + url + '" target="_blank" rel="noopener noreferrer">' +
                '<img src="' + url + '" alt="Brosur Rincian Biaya" style="max-width:100%;max-height:220px;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.12);display:block;cursor:pointer;border:1px solid #e2e8f0;" loading="lazy">' +
                '</a>' +
                '<span style="display:inline-block;font-size:0.7rem;color:#16a34a;margin-top:4px;font-weight:600;">🔍 Klik gambar untuk memperbesar</span>' +
                '</div>';
        });
        return html;
    }

    // ─── Typing indicator ──────────────────────────────────────
    function showTyping() {
        var container = document.getElementById('aisahMessages');
        var id = 'typing_' + Date.now();
        var el = document.createElement('div');
        el.id = id;
        el.className = 'flex items-end gap-2';
        el.innerHTML = '<div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center" style="background:linear-gradient(135deg,#16a34a,#15803d)">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="white" viewBox="0 0 24 24"><path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/></svg></div>' +
            '<div class="bg-white rounded-2xl rounded-bl-sm px-4 py-3 shadow-sm border border-gray-100">' +
            '<div class="flex gap-1 items-center h-4">' +
            '<span class="w-2 h-2 rounded-full animate-bounce" style="background:#4ade80;animation-delay:0s"></span>' +
            '<span class="w-2 h-2 rounded-full animate-bounce" style="background:#4ade80;animation-delay:.15s"></span>' +
            '<span class="w-2 h-2 rounded-full animate-bounce" style="background:#4ade80;animation-delay:.3s"></span>' +
            '</div></div>';
        container.appendChild(el);
        scrollToBottom();
        return id;
    }

    function removeTyping(id) {
        var el = document.getElementById(id);
        if (el) el.remove();
    }

    function scrollToBottom() {
        var c = document.getElementById('aisahMessages');
        if (c) requestAnimationFrame(function () { c.scrollTop = c.scrollHeight; });
    }

    function esc(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    // ─── Cek status online/offline Aisah ──────────────────────
    async function checkStatus() {
        try {
            var res = await fetch(API_STATUS, { signal: AbortSignal.timeout(6000) });
            if (res.ok) {
                var data = await res.json();
                var dot = document.getElementById('aisahStatusDot');
                var txt = document.getElementById('aisahStatusText');
                if (data.online) {
                    if (dot) dot.style.background = '#4ade80';
                    if (txt) txt.textContent = 'Online · Siap membantu';
                } else {
                    if (dot) dot.style.background = '#fca5a5';
                    if (txt) txt.textContent = 'Offline · Coba lagi nanti';
                }
            }
        } catch (e) { /* silent */ }
    }
})();
</script>
@endif
