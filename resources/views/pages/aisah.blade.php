<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Aisah - AI Customer Service | Pesantren Persatuan Islam 80 Al Amin</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $pengaturan ? $pengaturan->getAdminImageUrl($pengaturan->logo) : asset('favicon.ico') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            --brand-green-dark: #062d27;
            --brand-green-main: #16a34a;
            --brand-green-hover: #15803d;
            --brand-lime: #bef264;
            --bg-chat: #f4f6f5;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--brand-green-dark);
            color: var(--text-dark);
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* App Container */
        .chat-app {
            width: 100%;
            height: 100%;
            max-width: 1100px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .chat-app {
                height: 96dvh;
                border-radius: 24px;
                box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        }

        /* Header */
        .chat-header {
            background: linear-gradient(135deg, #062d27 0%, #0d4a40 100%);
            color: #ffffff;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
            z-index: 20;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .back-btn {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 1.25rem;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-2px);
        }

        .avatar-wrap {
            position: relative;
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .avatar svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        .online-dot {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 12px;
            height: 12px;
            background: #4ade80;
            border: 2px solid #062d27;
            border-radius: 50%;
            box-shadow: 0 0 6px #4ade80;
        }

        .bot-info h1 {
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .bot-badge {
            font-size: 0.65rem;
            padding: 2px 7px;
            background: rgba(190, 242, 100, 0.2);
            color: var(--brand-lime);
            border: 1px solid rgba(190, 242, 100, 0.3);
            border-radius: 999px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .bot-sub {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.75);
            margin-top: 2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn {
            height: 36px;
            padding: 0 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .action-btn.btn-wa {
            background: #25D366;
            border-color: #25D366;
            color: #ffffff;
        }

        .action-btn.btn-wa:hover {
            background: #1ebd59;
        }

        /* Chat Body */
        .chat-body {
            flex: 1;
            background-color: var(--bg-chat);
            background-image: radial-gradient(rgba(22, 163, 74, 0.06) 1.5px, transparent 1.5px);
            background-size: 20px 20px;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* Date Banner */
        .date-divider {
            align-self: center;
            background: rgba(0, 0, 0, 0.05);
            color: var(--text-muted);
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Welcome Card */
        .welcome-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            max-width: 650px;
            margin: 0 auto 10px auto;
            text-align: center;
        }

        .welcome-card h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--brand-green-dark);
            margin-bottom: 6px;
        }

        .welcome-card p {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 16px;
        }

        /* Quick Prompt Chips */
        .chips-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
        }

        .chip {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--brand-green-dark);
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .chip:hover {
            background: #e2e8f0;
            border-color: #cbd5e1;
            transform: translateY(-1px);
        }

        /* Message Row */
        .msg-row {
            display: flex;
            gap: 10px;
            max-width: 82%;
            animation: fadeIn 0.25s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .msg-row.user {
            align-self: flex-end;
            flex-direction: row-reverse;
        }

        .msg-row.bot {
            align-self: flex-start;
        }

        .msg-avatar {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: white;
            margin-top: 4px;
        }

        .msg-avatar svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        .msg-bubble {
            padding: 12px 16px;
            border-radius: 18px;
            font-size: 0.92rem;
            line-height: 1.55;
            word-break: break-word;
            white-space: pre-wrap;
            position: relative;
        }

        .msg-row.user .msg-bubble {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: #ffffff;
            border-bottom-right-radius: 4px;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.25);
        }

        .msg-row.bot .msg-bubble {
            background: #ffffff;
            color: var(--text-dark);
            border-bottom-left-radius: 4px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
        }

        .msg-meta {
            font-size: 0.7rem;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .msg-row.user .msg-meta {
            color: var(--text-muted);
            justify-content: flex-end;
            margin-right: 4px;
        }

        .msg-row.bot .msg-meta {
            color: var(--text-muted);
            margin-left: 4px;
        }

        .provider-tag {
            background: #f1f5f9;
            padding: 1px 6px;
            border-radius: 4px;
            font-size: 0.65rem;
            font-family: monospace;
        }

        /* Typing Dots */
        .typing-bubble {
            padding: 14px 18px;
            background: #ffffff;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
            border: 1px solid #e2e8f0;
            display: flex;
            gap: 5px;
            align-items: center;
            width: fit-content;
        }

        .typing-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #16a34a;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); opacity: 0.4; }
            40% { transform: scale(1); opacity: 1; }
        }

        /* Footer Input Bar */
        .chat-footer {
            background: #ffffff;
            border-top: 1px solid var(--border-color);
            padding: 14px 20px;
            flex-shrink: 0;
            z-index: 20;
        }

        .input-row {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 18px;
            padding: 6px 8px 6px 14px;
            transition: all 0.2s ease;
        }

        .input-row:focus-within {
            border-color: #16a34a;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15);
        }

        .chat-input {
            flex: 1;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text-dark);
            outline: none;
            resize: none;
            max-height: 120px;
            line-height: 1.45;
            padding: 6px 0;
        }

        .chat-input::placeholder {
            color: #94a3b8;
        }

        .send-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
        }

        .send-btn:hover:not(:disabled) {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(22, 163, 74, 0.4);
        }

        .send-btn:active:not(:disabled) {
            transform: scale(0.95);
        }

        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .disclaimer {
            text-align: center;
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 10px;
        }

        @media (max-width: 640px) {
            .bot-sub { display: none; }
            .header-actions .btn-text { display: none; }
            .action-btn { padding: 0 10px; }
            .msg-row { max-width: 90%; }
            .chat-header { padding: 12px 14px; }
            .chat-body { padding: 14px; }
            .chat-footer { padding: 10px 14px; }
        }
    </style>
</head>
<body>

    <div class="chat-app">
        <!-- ── Top Header ── -->
        <header class="chat-header">
            <div class="header-left">
                <a href="/" class="back-btn" title="Kembali ke Web Al Amin">
                    <i class="ti ti-arrow-left"></i>
                </a>
                <div class="avatar-wrap">
                    <div class="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/>
                        </svg>
                    </div>
                    <span class="online-dot" id="headerStatusDot"></span>
                </div>
                <div class="bot-info">
                    <h1>
                        Aisah
                        <span class="bot-badge">AI Assistant</span>
                    </h1>
                    <div class="bot-sub" id="headerStatusText">Customer Service SPMB Al Amin · Online</div>
                </div>
            </div>

            <div class="header-actions">
                <button type="button" onclick="confirmResetChat()" class="action-btn" title="Mulai ulang percakapan">
                    <i class="ti ti-refresh"></i>
                    <span class="btn-text">Reset Chat</span>
                </button>
                @if(isset($pengaturan) && $pengaturan->telepon)
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $pengaturan->telepon)) }}?text=Halo%20Admin%20Al%20Amin,%20saya%20ingin%20tanya%20seputar%20pesantren" 
                   target="_blank" class="action-btn btn-wa" title="Hubungi CS WhatsApp">
                    <i class="ti ti-brand-whatsapp"></i>
                    <span class="btn-text">WhatsApp</span>
                </a>
                @endif
            </div>
        </header>

        <!-- ── Chat Body ── -->
        <main class="chat-body" id="chatBody">
            <div class="date-divider">Hari Ini</div>

            <!-- Welcome / Suggested Prompts -->
            <div class="welcome-card" id="welcomeCard">
                <h3>Assalamu'alaikum! 👋</h3>
                <p>Saya <strong>Aisah</strong>, asisten AI resmi Pesantren Persatuan Islam 80 Al Amin Sindangkasih. Silakan tanyakan informasi seputar SPMB, pendaftaran santri baru, rincian biaya, atau program pendidikan.</p>
                
                <div class="chips-container">
                    <button type="button" class="chip" onclick="askQuestion('Berapa biaya pendaftaran santri baru?')">
                        <i class="ti ti-cash"></i> Biaya Pendaftaran
                    </button>
                    <button type="button" class="chip" onclick="askQuestion('Apa saja syarat pendaftaran santri baru?')">
                        <i class="ti ti-file-text"></i> Syarat Pendaftaran
                    </button>
                    <button type="button" class="chip" onclick="askQuestion('Jelaskan jenjang pendidikan MTs dan MA Persis')">
                        <i class="ti ti-school"></i> MTs & MA Persis
                    </button>
                    <button type="button" class="chip" onclick="askQuestion('Bagaimana jadwal seleksi masuk dan tes?')">
                        <i class="ti ti-calendar-event"></i> Jadwal Tes SPMB
                    </button>
                </div>
            </div>

            <!-- Messages Stream Container -->
            <div id="messagesContainer" style="display: flex; flex-direction: column; gap: 14px;"></div>
        </main>

        <!-- ── Footer Input ── -->
        <footer class="chat-footer">
            <div class="input-row">
                <textarea 
                    id="messageInput" 
                    class="chat-input" 
                    rows="1" 
                    placeholder="Tanyakan sesuatu pada Aisah..." 
                    onkeydown="handleKeyDown(event)"
                    oninput="autoResize(this)"
                ></textarea>
                <button type="button" id="sendBtn" class="send-btn" onclick="sendMessage()" title="Kirim Pesan">
                    <i class="ti ti-send text-lg"></i>
                </button>
            </div>
            <div class="disclaimer">
                Aisah adalah asisten AI resmi Pesantren Al Amin. Jawaban disarikan dari pedoman resmi SPMB.
            </div>
        </footer>
    </div>

    <script>
    (function() {
        'use strict';

        const API_CHAT = '/aisah/chat';
        const API_HISTORY = '/aisah/history';
        const API_STATUS = '/aisah/status';
        const LS_KEY = 'aisah_session_token';

        let sessionToken = localStorage.getItem(LS_KEY) || ('web_fs_' + Math.random().toString(36).substring(2, 10));
        localStorage.setItem(LS_KEY, sessionToken);

        let isSending = false;

        const chatBody = document.getElementById('chatBody');
        const container = document.getElementById('messagesContainer');
        const input = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        const welcomeCard = document.getElementById('welcomeCard');

        // Auto resize textarea
        window.autoResize = function(el) {
            el.style.height = 'auto';
            el.style.height = Math.min(el.scrollHeight, 120) + 'px';
        };

        window.handleKeyDown = function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        };

        window.askQuestion = function(text) {
            input.value = text;
            sendMessage();
        };

        window.confirmResetChat = function() {
            if (confirm('Mulai sesi percakapan baru? Riwayat chat sebelumnya di halaman ini akan direset.')) {
                sessionToken = 'web_fs_' + Math.random().toString(36).substring(2, 10);
                localStorage.setItem(LS_KEY, sessionToken);
                container.innerHTML = '';
                if (welcomeCard) welcomeCard.style.display = 'block';
                input.value = '';
                input.focus();
            }
        };

        // Render message to DOM
        function renderMessage(role, text, time, provider) {
            if (welcomeCard && container.children.length === 0) {
                welcomeCard.style.display = 'none';
            }

            const row = document.createElement('div');
            row.className = 'msg-row ' + (role === 'user' ? 'user' : 'bot');

            const formattedTime = time || new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

            if (role === 'user') {
                row.innerHTML = `
                    <div style="max-width: 100%;">
                        <div class="msg-bubble">${escapeHtml(text)}</div>
                        <div class="msg-meta">Kamu · ${formattedTime}</div>
                    </div>
                `;
            } else {
                row.innerHTML = `
                    <div class="msg-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/>
                        </svg>
                    </div>
                    <div style="max-width: calc(100% - 44px);">
                        <div class="msg-bubble">${formatMarkdown(text)}</div>
                        <div class="msg-meta">
                            <span>Aisah</span>
                            ${provider ? `<span class="provider-tag">${escapeHtml(provider)}</span>` : ''}
                            <span>· ${formattedTime}</span>
                        </div>
                    </div>
                `;
            }

            container.appendChild(row);
            scrollToBottom();
        }

        // Show typing indicator
        function showTypingIndicator() {
            const typingRow = document.createElement('div');
            typingRow.id = 'typingIndicator';
            typingRow.className = 'msg-row bot';
            typingRow.innerHTML = `
                <div class="msg-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2a5 5 0 1 0 0 10A5 5 0 0 0 12 2ZM4 20c0-4 3.6-7 8-7s8 3 8 7H4Z"/>
                    </svg>
                </div>
                <div class="typing-bubble">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `;
            container.appendChild(typingRow);
            scrollToBottom();
        }

        function removeTypingIndicator() {
            const el = document.getElementById('typingIndicator');
            if (el) el.remove();
        }

        function scrollToBottom() {
            requestAnimationFrame(() => {
                chatBody.scrollTop = chatBody.scrollHeight;
            });
        }

        function escapeHtml(str) {
            return String(str || '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;');
        }

        function formatMarkdown(text) {
            let html = escapeHtml(text);
            // Bold **text** or *text*
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            html = html.replace(/\*(.*?)\*/g, '<strong>$1</strong>');
            // Bullet points
            html = html.replace(/^• (.*?)$/gm, '<div style="display:flex;gap:6px;margin:2px 0;"><span style="color:#16a34a;">•</span><span>$1</span></div>');
            return html;
        }

        // Send Message Handler
        window.sendMessage = async function() {
            const text = input.value.trim();
            if (!text || isSending) return;

            isSending = true;
            sendBtn.disabled = true;
            input.value = '';
            input.style.height = 'auto';

            renderMessage('user', text);
            showTypingIndicator();

            try {
                const res = await fetch(API_CHAT, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        message: text,
                        session_token: sessionToken,
                    })
                });

                removeTypingIndicator();

                const data = await res.json();
                if (data.session_token) {
                    sessionToken = data.session_token;
                    localStorage.setItem(LS_KEY, sessionToken);
                }

                if (data.reply) {
                    renderMessage('bot', data.reply, null, data.provider);
                } else {
                    renderMessage('bot', data.error || 'Maaf, terjadi kendala teknis.', null);
                }
            } catch (err) {
                removeTypingIndicator();
                renderMessage('bot', 'Maaf, koneksi ke server terputus. Silakan periksa jaringan Anda atau coba sesaat lagi.');
            } finally {
                isSending = false;
                sendBtn.disabled = false;
                input.focus();
            }
        };

        // Load History
        async function loadHistory() {
            if (!sessionToken) return;

            try {
                const res = await fetch(`${API_HISTORY}?session_token=${encodeURIComponent(sessionToken)}`);
                if (res.ok) {
                    const data = await res.json();
                    if (data.messages && data.messages.length > 0) {
                        data.messages.forEach(msg => {
                            const time = msg.created_at ? new Date(msg.created_at).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) : null;
                            renderMessage(msg.role === 'user' ? 'user' : 'bot', msg.message, time, msg.ai_provider);
                        });
                    }
                }
            } catch (e) {
                // silent
            }
        }

        // Check Online Status
        async function checkStatus() {
            try {
                const res = await fetch(API_STATUS);
                if (res.ok) {
                    const data = await res.json();
                    const dot = document.getElementById('headerStatusDot');
                    const txt = document.getElementById('headerStatusText');
                    if (data.online) {
                        if (dot) dot.style.background = '#4ade80';
                        if (txt) txt.textContent = 'Customer Service SPMB Al Amin · Online';
                    } else {
                        if (dot) dot.style.background = '#f87171';
                        if (txt) txt.textContent = 'Customer Service SPMB Al Amin · Offline';
                    }
                }
            } catch (e) {}
        }

        // Init
        loadHistory();
        checkStatus();
    })();
    </script>
</body>
</html>
