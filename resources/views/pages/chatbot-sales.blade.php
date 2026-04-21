@extends('layouts.app')

@section('title', 'Are You Losing Customers Because You Miss Calls & WhatsApp Messages? | EINOVATECH')
@section('meta_description', 'Every missed call is lost revenue. Our AI Patient Automation System handles WhatsApp 24/7, books appointments automatically, and qualifies leads. Book a 15-minute demo.')
@section('meta_keywords', 'AI automation, WhatsApp chatbot, missed calls, appointment booking, patient automation, lead qualification, clinic automation')
@section('og_title', 'Stop Losing Customers to Missed Calls & Messages | EINOVATECH')
@section('og_description', 'If you miss just 3 customers per week — that is thousands lost monthly. See how AI automation recovers that revenue in 14 days.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "EINOVATECH AI WhatsApp Chatbot",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "WhatsApp, Web",
    "description": "AI-powered WhatsApp chatbot that automates customer enquiries, books appointments, and qualifies leads 24/7.",
    "offers": {
        "@type": "Offer",
        "priceCurrency": "INR",
        "price": "0",
        "description": "Free 15-minute demo"
    },
    "provider": {
        "@type": "Organization",
        "name": "EINOVATECH",
        "url": "https://einovatech.com"
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "EINOVATECH",
    "url": "{{ url('/') }}",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endsection

@section('content')

{{-- ============================================================ --}}
{{-- INLINE SCRIPT: Registers Alpine components via alpine:init   --}}
{{-- MUST be inline here so it runs BEFORE app.js calls           --}}
{{-- Alpine.start() — this is the correct Alpine v3 pattern.      --}}
{{-- ============================================================ --}}
<script>
document.addEventListener('alpine:init', () => {

    /* ── Pain-Points Store (shared across all components) ── */
    Alpine.store('painPoints', {
        labels: [
            'Missed calls after working hours',
            'Reception/front desk overloaded',
            'WhatsApp messages not followed up within 5 minutes',
            'Staff answering the same questions every single day',
            'Google Ads leads not converting',
        ],
        checked: [false, false, false, false, false],
        get totalChecked() { return this.checked.filter(c => c).length; },
        toggle(i) { this.checked[i] = !this.checked[i]; },
        /** Return an array of the selected label strings */
        get selected() {
            return this.labels.filter((_, i) => this.checked[i]);
        },
    });

    /* ── Hero WhatsApp Chat Simulator ── */
    Alpine.data('heroChatSimulator', () => ({
        visibleMessages: [],
        isTyping: false,
        isUserTyping: false,
        currentTypingText: '',
        currentConversation: 0,
        conversations: [],

        _scrollToBottom() {
            this.$nextTick(() => {
                const el = document.getElementById('hero-chat-area');
                if (el) el.scrollTop = el.scrollHeight;
            });
        },

        init() {
            // Load conversations from geo store when ready
            const loadGeo = () => {
                const geo = this.$store.geo;
                if (geo && geo.conversations && geo.conversations.length) {
                    this.conversations = geo.conversations;
                }
            };
            loadGeo();
            document.addEventListener('geo:ready', () => { loadGeo(); });
            this._runConversation();
        },

        _delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        },

        async _runConversation() {
            const self = this;
            while (true) {
                const conv = self.conversations[self.currentConversation];
                self.visibleMessages = [];
                self.currentTypingText = '';
                self.isUserTyping = false;

                await self._delay(800);

                for (let i = 0; i < conv.length; i++) {
                    const msg = conv[i];
                    if (msg.sender === 'user') {
                        // Type characters into the input bar
                        self.isUserTyping = true;
                        const fullText = msg.typingPreview || msg.text.replace(/<[^>]*>/g, '');
                        self.currentTypingText = '';
                        for (let c = 0; c < fullText.length; c++) {
                            self.currentTypingText = fullText.substring(0, c + 1);
                            await self._delay(38 + Math.random() * 28);
                        }
                        await self._delay(220);
                        self.isUserTyping = false;
                        self.currentTypingText = '';
                        self.visibleMessages = [...self.visibleMessages, msg];
                        self._scrollToBottom();
                        await self._delay(320);
                    } else {
                        // Show typing indicator then reveal bubble
                        self.isTyping = true;
                        self._scrollToBottom();
                        const ms = Math.min(900 + msg.text.length * 2.2, 2300);
                        await self._delay(ms);
                        self.isTyping = false;
                        self.visibleMessages = [...self.visibleMessages, msg];
                        self._scrollToBottom();
                        await self._delay(420);
                    }
                }

                await self._delay(4200);
                self.currentConversation = (self.currentConversation + 1) % self.conversations.length;
            }
        }
    }));

    /* ── CRM Bookings Dashboard ── */
    Alpine.data('crmDashboard', () => ({
        visibleBookings: [],
        showNewBookingAlert: false,
        stats: { todayBookings: 0, confirmed: 0, revenue: 0 },
        allBookings: [],

        init() {
            // Load bookings from geo store when ready
            const loadGeo = () => {
                const geo = this.$store.geo;
                if (geo && geo.bookings && geo.bookings.length) {
                    this.allBookings = geo.bookings;
                }
            };
            loadGeo();
            document.addEventListener('geo:ready', () => { loadGeo(); });
            this._animateBookings();
        },

        async _animateBookings() {
            const self = this;
            while (true) {
                self.visibleBookings = [];
                self.stats = { todayBookings: 0, confirmed: 0, revenue: 0 };

                for (let i = 0; i < self.allBookings.length; i++) {
                    await new Promise(r => setTimeout(r, 1200));
                    self.visibleBookings = [...self.visibleBookings, self.allBookings[i]];
                    self.stats.todayBookings = self.visibleBookings.length;
                    self.stats.confirmed = self.visibleBookings.filter(b => b.status === 'Confirmed').length;
                    self.stats.revenue = self.visibleBookings.reduce((s, b) => s + b.amount, 0);
                    if (self.allBookings[i].isNew) {
                        self.showNewBookingAlert = true;
                        await new Promise(r => setTimeout(r, 2500));
                        self.showNewBookingAlert = false;
                    }
                }
                await new Promise(r => setTimeout(r, 5000));
            }
        }
    }));

    /* ── Revenue Loss Calculator ── */
    Alpine.data('lossCalculator', () => ({
        missedPerWeek: 5,
        valuePerCustomer: 2000,
        get currency() { return this.$store.geo ? this.$store.geo.currency : '₹'; },
        get weeklyLoss()  { return this.missedPerWeek * this.valuePerCustomer; },
        get monthlyLoss() { return this.weeklyLoss * 4; },
        get yearlyLoss()  { return this.monthlyLoss * 12; },
        init() {
            const loadGeo = () => {
                const geo = this.$store.geo;
                if (geo && geo.lossCalc) {
                    this.valuePerCustomer = geo.lossCalc.defaultValue;
                }
            };
            loadGeo();
            document.addEventListener('geo:ready', () => { loadGeo(); });
        }
    }));

    /* ── Lead Capture Form ── */
    Alpine.data('leadForm', () => ({
        form: { name: '', businessName: '', teamSize: '', monthlyVolume: '', runsAds: '', whatsapp: '', email: '' },
        loading: false,
        submitted: false,
        sessionId: '',

        init() {
            this.sessionId = crypto.randomUUID();
        },

        async submitForm() {
            this.loading = true;
            try {
                const payload = {
                    ...this.form,
                    session_id: this.sessionId,
                    source: 'form',
                    painPoints: this.$store.painPoints.selected,
                    page_url: window.location.href,
                    referrer: document.referrer || '',
                };
                const response = await fetch('/chatbot-sales-lead', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify(payload),
                });
                if (response.ok) { this.submitted = true; } else { this._redirectToWhatsApp(); }
            } catch (e) { this._redirectToWhatsApp(); }
            this.loading = false;
        },

        async _redirectToWhatsApp() {
            // Attempt to save lead before redirecting to WhatsApp
            try {
                await fetch('/chatbot-sales-lead', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        ...this.form,
                        session_id: this.sessionId,
                        source: 'form',
                        painPoints: this.$store.painPoints.selected,
                        page_url: window.location.href,
                        referrer: document.referrer || '',
                    }),
                });
            } catch (ignored) { /* best-effort save */ }
            const msg = encodeURIComponent(
                `Hi! I'd like to book a 15-minute AI demo.\n\nBusiness: ${this.form.businessName}\nTeam size: ${this.form.teamSize}\nMonthly volume: ${this.form.monthlyVolume}\nGoogle Ads: ${this.form.runsAds}\nEmail: ${this.form.email}`
            );
            const waNum = (this.$store.geo && this.$store.geo.whatsappNumber) || '919243077840';
            window.open(`https://wa.me/${waNum}?text=${msg}`, '_blank');
            this.submitted = true;
        }
    }));

    /* ── Demo Qualifier — Inline AI Sales Chat ── */
    Alpine.data('demoQualifier', () => ({
        phase: 'idle',   // idle | guided | contact | chat | done
        messages: [],
        aiHistory: [],
        context: { businessType: '', dailyEnquiries: '', channel: '', afterHours: '' },
        contactInfo: { name: '', whatsapp: '', email: '' },
        contactErrors: { whatsapp: '', email: '' },
        inputText: '',
        isLoading: false,
        showBookingCta: false,
        aiTurnCount: 0,
        isAfterHours: false,
        started: false,
        sessionId: '',
        chatId: '',
        guidedStep: 0,
        guidedSteps: [
            {
                botMsg: "Hey! 👋 I'm Lexi, EINOVATECH's AI assistant. I'll show you exactly what AI automation can do for YOUR business — just 4 quick questions first!\n\nWhat type of business do you run?",
                options: [
                    { label: '🏥 Clinic / Hospital', value: 'Clinic' },
                    { label: '💇 Salon / Spa', value: 'Salon' },
                    { label: '🏘 Real Estate', value: 'Real Estate' },
                    { label: '🛒 E-commerce / Retail', value: 'E-commerce' },
                    { label: '⚙️ Other Business', value: 'Other Business' },
                ],
            },
            {
                botMsg: 'Got it! How many customer enquiries do you get per day?',
                options: [
                    { label: 'Under 10 / day', value: 'Under 10/day' },
                    { label: '10–30 / day', value: '10–30/day' },
                    { label: '30–100 / day', value: '30–100/day' },
                    { label: '100+ / day', value: '100+/day' },
                ],
            },
            {
                botMsg: 'Where do most enquiries come from?',
                options: [
                    { label: '💬 WhatsApp', value: 'WhatsApp' },
                    { label: '📞 Phone calls', value: 'Phone calls' },
                    { label: '🔍 Google / Ads', value: 'Google Ads' },
                    { label: '🚪 Walk-ins', value: 'Walk-ins' },
                ],
            },
            {
                botMsg: 'Do you miss enquiries after business hours?',
                options: [
                    { label: '✅ Yes, definitely', value: 'yes' },
                    { label: '🤔 Sometimes', value: 'sometimes' },
                    { label: '❓ Not sure', value: 'not sure' },
                ],
            },
        ],

        _scroll() {
            this.$nextTick(() => {
                const el = document.getElementById('dq-chat-area');
                if (el) el.scrollTop = el.scrollHeight;
            });
        },

        _delay(ms) { return new Promise(r => setTimeout(r, ms)); },

        async _addBot(text) {
            this.isLoading = true;
            this._scroll();
            const ms = Math.min(700 + text.length * 1.8, 2200);
            await this._delay(ms);
            this.isLoading = false;
            this.messages = [...this.messages, { role: 'bot', text }];
            this._scroll();
        },

        _addUser(text) {
            this.messages = [...this.messages, { role: 'user', text }];
            this._scroll();
        },

        _calcRoi() {
            const vol  = this.context.dailyEnquiries;
            const type = this.context.businessType;
            const geo  = this.$store.geo;
            if (geo && geo.getRoiMessage) {
                return geo.getRoiMessage(vol, type);
            }
            // Fallback
            if (vol === 'Under 10/day') return `A ${type} missing ~30% of ~5 daily enquiries could lose significant revenue monthly. Our AI recovers most of that — automatically.`;
            if (vol === '10–30/day')    return `A ${type} getting ~20 enquiries/day and missing 30% could lose substantial revenue monthly. Our AI handles all of them, 24/7.`;
            if (vol === '30–100/day')   return `At ~60 enquiries/day, missing 30% in a ${type} business could cost major revenue monthly. Our AI literally pays for itself in the first week.`;
            return `At 100+ enquiries/day, even a 10% miss rate in ${type} costs heavily each month. Our AI closes that gap immediately.`;
        },

        async _saveGuidedTranscript() {
            try {
                const transcript = this.messages.map(m => ({
                    role: m.role === 'bot' ? 'assistant' : 'user',
                    content: m.text,
                }));

                const res = await fetch('/chatbot-sales-guided', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        session_id: this.sessionId,
                        messages:   transcript,
                        context:    { ...this.context, painPoints: this.$store.painPoints.selected },
                        page_url:   window.location.href,
                        referrer:   document.referrer || '',
                    }),
                });
                const data = await res.json();
                if (data.success && data.chat_id) {
                    this.chatId = data.chat_id;
                }
            } catch (e) {
                // Silent — don't disrupt user experience
            }
        },

        async start() {
            if (this.started) return;
            this.started = true;
            this.phase = 'guided';
            await this._addBot(this.guidedSteps[0].botMsg);
        },

        async selectOption(stepIdx, option) {
            if (stepIdx === 0) this.context.businessType   = option.value;
            else if (stepIdx === 1) this.context.dailyEnquiries = option.value;
            else if (stepIdx === 2) this.context.channel       = option.value;
            else if (stepIdx === 3) this.context.afterHours    = option.value;

            // Strip leading emoji for the user bubble
            const label = option.label.replace(/^[\u{1F000}-\u{1FFFF}\u{2600}-\u{27FF}]\s*/u, '').trim();
            this._addUser(label || option.label);
            this.guidedStep = stepIdx + 1;

            if (this.guidedStep < this.guidedSteps.length) {
                await this._addBot(this.guidedSteps[this.guidedStep].botMsg);
            } else if (this.isAfterHours) {
                // After business hours: collect phone + email before allowing chat
                await this._addBot("Thanks for your answers! 🌙 Our team is currently offline, but I'm here 24/7!\n\nTo make sure we follow up with you, please share your phone number and email — then we'll continue chatting!");
                this.phase = 'contact';
                this._saveGuidedTranscript();
            } else {
                const roi    = this._calcRoi();
                const roiMsg = `Thanks for that! 📊 Here's what I can tell you:\n\n${roi}\n\nNow — ask me anything about how the AI would work for your ${this.context.businessType}, or just tell me what's frustrating you most right now! 💬`;
                await this._addBot(roiMsg);
                this.aiHistory = [{ role: 'assistant', content: roiMsg }];
                this.phase = 'chat';

                // Persist the entire guided transcript to the backend
                this._saveGuidedTranscript();
            }
        },

        async sendMessage() {
            const text = this.inputText.trim();
            if (!text || this.isLoading) return;
            this.inputText = '';
            this._addUser(text);

            if (this.aiTurnCount >= 5) {
                this.showBookingCta = true;
                await this._addBot("I've loved chatting! 😊 The best next step is your free live demo — our team will build the exact AI flow for your business. Ready to go? 👇");
                return;
            }

            this.isLoading = true;
            this._scroll();

            try {
                this.aiHistory = this.aiHistory || [];
                this.aiHistory.push({ role: 'user', content: text });
                const historySlice = this.aiHistory.slice(-10);
                const currentTurn = this.aiTurnCount;
                this.aiTurnCount++;

                const res  = await fetch('/chatbot-sales-chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        session_id: this.sessionId,
                        chat_id:    this.chatId || undefined,
                        messages:   historySlice,
                        context:    { ...this.context, painPoints: this.$store.painPoints.selected },
                        turnCount:  currentTurn,
                        page_url:   window.location.href,
                        referrer:   document.referrer || '',
                    }),
                });
                const data = await res.json();
                this.isLoading = false;

                if (data.success && data.reply) {
                    if (data.chat_id) this.chatId = data.chat_id;
                    this.aiHistory.push({ role: 'assistant', content: data.reply });
                    this.messages = [...this.messages, { role: 'bot', text: data.reply }];
                    this._scroll();
                    if (data.showBookingCta) this.showBookingCta = true;
                }
            } catch (e) {
                this.isLoading = false;
                this.messages = [...this.messages, { role: 'bot', text: "Oops — something went sideways on my end! Let's just book your demo directly 😊" }];
                this.showBookingCta = true;
                this._scroll();
            }
        },

        async bookDemo() {
            if (!this.contactInfo.whatsapp) return;
            try {
                await fetch('/chatbot-sales-lead', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        session_id:     this.sessionId,
                        chat_id:        this.chatId || undefined,
                        businessType:   this.context.businessType,
                        dailyEnquiries: this.context.dailyEnquiries,
                        channel:        this.context.channel,
                        afterHours:     this.context.afterHours,
                        painPoints:     this.$store.painPoints.selected,
                        whatsapp:       this.contactInfo.whatsapp,
                        email:          this.contactInfo.email,
                        name:           this.contactInfo.name,
                        source:         'inline_chat',
                        page_url:       window.location.href,
                        referrer:       document.referrer || '',
                    }),
                });
            } catch (e) { /* silent */ }
            this.phase = 'done';
        },

        bookOnWhatsApp() {
            const msg = encodeURIComponent(
                `Hi! I'd like to book a 15-min AI demo.\n\nBusiness type: ${this.context.businessType}\nDaily enquiries: ${this.context.dailyEnquiries}\nChannel: ${this.context.channel}`
            );
            const waNum = (this.$store.geo && this.$store.geo.whatsappNumber) || '919243077840';
            window.open(`https://wa.me/${waNum}?text=${msg}`, '_blank');
            this.phase = 'done';
        },

        _checkBusinessHours() {
            // Business hours: Mon-Sat 9am-6pm IST (UTC+5:30)
            const now = new Date();
            const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
            const ist = new Date(utc + (5.5 * 3600000));
            const day = ist.getDay(); // 0=Sun
            const hour = ist.getHours();
            // After hours = Sunday, or before 9am, or after 6pm
            return (day === 0 || hour < 9 || hour >= 18);
        },

        _validateContact() {
            let valid = true;
            this.contactErrors = { whatsapp: '', email: '' };
            const phone = this.contactInfo.whatsapp.replace(/[\s\-()]/g, '');
            if (!phone || phone.replace(/^\+/, '').length < 8) {
                this.contactErrors.whatsapp = 'Please enter a valid phone number';
                valid = false;
            }
            if (!this.contactInfo.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.contactInfo.email)) {
                this.contactErrors.email = 'Please enter a valid email';
                valid = false;
            }
            return valid;
        },

        async submitContact() {
            if (!this._validateContact()) return;
            // Save contact info to backend
            try {
                await fetch('/chatbot-sales-lead', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    },
                    body: JSON.stringify({
                        session_id:     this.sessionId,
                        chat_id:        this.chatId || undefined,
                        businessType:   this.context.businessType,
                        dailyEnquiries: this.context.dailyEnquiries,
                        channel:        this.context.channel,
                        afterHours:     this.context.afterHours,
                        whatsapp:       this.contactInfo.whatsapp,
                        email:          this.contactInfo.email,
                        name:           this.contactInfo.name,
                        source:         'inline_chat',
                        page_url:       window.location.href,
                        referrer:       document.referrer || '',
                    }),
                });
            } catch (e) { /* silent */ }

            // Transition to chat phase
            const roi    = this._calcRoi();
            const roiMsg = `Thanks! 📊 Here's what I can tell you:\n\n${roi}\n\nNow — ask me anything about how the AI would work for your ${this.context.businessType}, or just tell me what's frustrating you most right now! 💬`;
            await this._addBot(roiMsg);
            this.aiHistory = [{ role: 'assistant', content: roiMsg }];
            this.phase = 'chat';
            this._saveGuidedTranscript();
        },

        init() {
            this.aiHistory = [];
            this.sessionId = crypto.randomUUID();
            this.isAfterHours = this._checkBusinessHours();
        },
    }));

});
</script>

{{-- ============================================= --}}
{{-- STAGE 2 — HOOK: PAIN-DRIVEN HERO              --}}
{{-- ============================================= --}}
<section class="relative pt-20 pb-14 md:pt-20 md:pb-16 lg:pt-24 lg:pb-20 overflow-hidden" id="hero" style="background: linear-gradient(135deg, #070F1A 0%, #0A2540 50%, #0D2E4E 100%);">
    {{-- Background effects --}}
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-10 left-10 w-72 h-72 rounded-full filter blur-[100px] animate-pulse" style="background: rgba(0,212,255,0.15);"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full filter blur-[120px] animate-pulse" style="background: rgba(0,130,168,0.2); animation-delay: 2s;"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-40"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-start">
            {{-- Left: Pain-driven copy --}}
            <div class="pb-4 lg:pb-10">
                <div class="inline-flex items-center backdrop-blur-sm px-4 py-2 rounded-full mb-6" style="background: rgba(0,212,255,0.08); border: 1px solid rgba(0,212,255,0.2);">
                    <span class="relative flex h-2 w-2 mr-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" style="background: #00D4FF;"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2" style="background: #00D4FF;"></span>
                    </span>
                    <span class="font-medium text-sm" style="color: #00D4FF;">You're losing revenue right now</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-[3.25rem] font-bold text-white mb-4 leading-[1.15]">
                    Are You Losing Customers Because Your Business
                    <span class="bg-clip-text text-transparent" style="background-image: linear-gradient(to right, #00D4FF, #0082A8);"> Misses Calls & WhatsApp Messages?</span>
                </h1>

                <p class="text-lg text-slate-300 mb-5 leading-relaxed max-w-xl">
                    Right now, potential customers are messaging you on WhatsApp and calling your number. Nobody's answering. They're going to your competitor instead.
                </p>

                {{-- Single clear CTA --}}
                <div class="flex flex-col sm:flex-row gap-4 mb-5">
                    <a href="#book-demo" class="group inline-flex items-center justify-center px-8 py-4 font-bold rounded-xl transition-all duration-300 text-lg" style="background: linear-gradient(135deg, #00D4FF 0%, #0082A8 100%); color: #0A2540; box-shadow: 0 8px 24px rgba(0,212,255,0.35);">
                        Book a 15-Minute AI Demo
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                {{-- Social proof --}}
                <div class="flex flex-wrap items-center gap-4 text-slate-300 text-sm mb-3">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-semibold text-white">200+</span> businesses automated
                    </span>
                    <span class="text-slate-500">·</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <span class="font-semibold text-white">4.9</span> avg. rating
                    </span>
                    <span class="text-slate-500">·</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-cyan-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                        Avg. <span class="font-semibold text-white">3&times;</span> more bookings in 30 days
                    </span>
                </div>

                {{-- Urgency --}}
                <div class="flex items-center gap-2 text-sm" style="color: rgba(0,212,255,0.6);">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    Only 5 onboarding slots available this month
                </div>

                {{-- Subtle security trust line --}}
                <div class="flex flex-wrap items-center gap-2 mt-5 mb-8">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-white/10 border border-white/15 text-slate-300 text-xs font-medium">
                        <svg class="w-3 h-3 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        256-bit SSL
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-white/10 border border-white/15 text-slate-300 text-xs font-medium">
                        <svg class="w-3 h-3 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        GDPR &amp; DPDPA Compliant
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-white/10 border border-white/15 text-slate-300 text-xs font-medium">
                        <svg class="w-3 h-3 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Data Never Sold
                    </span>
                </div>
            </div>

            {{-- Right: Animated WhatsApp Chat — Appointment Booking Demo --}}
            <div class="relative flex justify-center lg:block pt-2 pb-2 lg:pt-0 lg:pb-0" x-data="heroChatSimulator">
                {{-- Phone frame: fixed size, solid bg, realistic WhatsApp look --}}
                <div class="wa-phone-frame mx-auto rounded-[16px] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.45)]">

                    {{-- WhatsApp header — exact WA green #075E54 --}}
                    <div class="wa-header">
                        {{-- Back arrow --}}
                        <svg class="wa-header-icon" fill="#aebac1" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                        {{-- Avatar: colored initials circle --}}
                        <div class="wa-avatar">
                            {{-- Person silhouette SVG avatar --}}
                            <svg viewBox="0 0 40 40" width="34" height="34" style="border-radius:50%;display:block;">
                                <circle cx="20" cy="20" r="20" fill="#128C7E"/>
                                <circle cx="20" cy="15" r="7" fill="#ffffff" opacity="0.9"/>
                                <ellipse cx="20" cy="35" rx="12" ry="9" fill="#ffffff" opacity="0.9"/>
                            </svg>
                            {{-- Online indicator dot --}}
                            <span class="wa-avatar-dot"></span>
                        </div>
                        {{-- Name & status --}}
                        <div class="wa-header-info">
                            <div class="wa-header-name">SmileCare Dental AI</div>
                            <div class="wa-header-status" :class="isTyping ? 'wa-status-typing' : 'wa-status-online'" x-text="isTyping ? 'typing...' : 'online'"></div>
                        </div>
                        {{-- Header action icons --}}
                        <div class="wa-header-actions">
                            <svg class="wa-header-icon" fill="#aebac1" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                            <svg class="wa-header-icon" fill="#aebac1" viewBox="0 0 24 24"><path d="M12 7a2 2 0 10-.001-4.001A2 2 0 0012 7zm0 2a2 2 0 10-.001 3.999A2 2 0 0012 9zm0 6a2 2 0 10-.001 3.999A2 2 0 0012 15z"/></svg>
                        </div>
                    </div>

                    {{-- Chat Messages — fixed height, no dynamic growth --}}
                    <div class="wa-chat-body wa-chat-bg overflow-y-auto" id="hero-chat-area">

                        {{-- Date badge --}}
                        <div class="flex justify-center mb-[4px] mt-[4px]">
                            <span class="bg-[#e2ddd5] text-[9px] text-[#54656f] font-medium px-[10px] py-[4px] rounded-[7px] shadow-[0_1px_0.5px_rgba(0,0,0,0.06)] wa-font-base">Today</span>
                        </div>

                        {{-- Encryption notice badge (like WhatsApp) --}}
                        <div class="flex justify-center mb-[6px]">
                            <span class="bg-[#fdf4c5] text-[8.5px] text-[#54656f] px-[8px] py-[4px] rounded-[6px] text-center leading-[12px] max-w-[240px] wa-font-base">
                                🔒 Messages are end-to-end encrypted.
                            </span>
                        </div>

                        {{-- Alpine v3: x-for MUST have a single root element. --}}
                        <template x-for="(msg, idx) in visibleMessages" :key="idx">
                            <div :class="msg.sender === 'bot' ? 'wa-msg-row wa-msg-in' : 'wa-msg-row wa-msg-out'">
                                <div :class="msg.sender === 'bot' ? 'wa-bubble wa-bubble-in' : 'wa-bubble wa-bubble-out'">
                                    <p class="wa-msg-text" x-html="msg.text"></p>
                                    <div class="flex items-center justify-end gap-[3px] mt-[2px]">
                                        <span class="wa-msg-time" x-text="msg.time"></span>
                                        {{-- Double-tick only for user (outgoing) messages --}}
                                        <svg x-show="msg.sender === 'user'" class="flex-shrink-0" width="14" height="10" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5.5L4.5 9L11.5 1" stroke="#53BDEB" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4.5 5.5L8 9L15 1" stroke="#53BDEB" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- Bot typing indicator --}}
                        <div x-show="isTyping" class="wa-msg-row wa-msg-in">
                            <div class="wa-bubble wa-bubble-in wa-typing">
                                <div class="flex gap-[4px] items-center" style="height:12px;">
                                    <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-1"></span>
                                    <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-2"></span>
                                    <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-3"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Input bar — WA Web exact: #f0f2f5 bg, white pill input --}}
                    <div class="wa-input-bar">
                        {{-- Emoji icon --}}
                        <button class="flex-shrink-0 p-[4px]" tabindex="-1">
                            <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#54656f"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
                        </button>
                        {{-- Attach icon --}}
                        <button class="flex-shrink-0 p-[4px]" tabindex="-1">
                            <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#54656f"><path d="M1.816 15.556v.002c0 1.502.584 2.912 1.646 3.972s2.472 1.647 3.974 1.647c1.501 0 2.91-.584 3.972-1.645l9.547-9.548c.769-.768 1.147-1.767 1.058-2.817-.079-.968-.548-1.927-1.319-2.698-1.594-1.592-4.068-1.711-5.517-.262l-7.916 7.915c-.881.881-.792 2.25.214 3.261.501.501 1.137.792 1.69.792.394 0 .752-.146 1.033-.429l6.006-6.007-.707-.707-6.006 6.007c-.553.553-1.463.294-2.016-.259-.553-.551-.812-1.463-.259-2.016l7.916-7.915c1.087-1.087 3.103-.973 4.37.263.651.652 1.062 1.413 1.126 2.15.063.74-.223 1.448-.804 2.03l-9.547 9.547A4.38 4.38 0 017.436 20.8a4.381 4.381 0 01-3.12-1.291 4.381 4.381 0 01-1.29-3.121v-.001l.002-.002z"/></svg>
                        </button>
                        {{-- Input pill --}}
                        <div class="flex-1 bg-white rounded-[21px] px-[10px] py-[5px] flex items-center min-h-[36px]" style="min-width:0;">
                            <span x-show="currentTypingText !== '' || isUserTyping"
                                class="flex-1"
                                style="font-size:13px;line-height:20px;color:#111b21;font-family:'Segoe UI',Helvetica,Arial,sans-serif;min-width:0;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"
                                x-text="currentTypingText"></span>
                            <span x-show="isUserTyping" class="inline-block w-[2px] h-[14px] bg-[#008069] ml-[1px] animate-pulse flex-shrink-0"></span>
                            <span x-show="!isUserTyping && currentTypingText === ''"
                                class="flex-1"
                                style="font-size:13px;line-height:20px;color:#8696a0;font-family:'Segoe UI',Helvetica,Arial,sans-serif;">Type a message</span>
                        </div>
                        {{-- Mic / Send button --}}
                        <button class="flex-shrink-0 p-[4px]" tabindex="-1">
                            <template x-if="currentTypingText !== '' || isUserTyping">
                                <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#54656f"><path d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.239 1.816-13.239 1.817-.011 7.912z"/></svg>
                            </template>
                            <template x-if="currentTypingText === '' && !isUserTyping">
                                <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#54656f"><path d="M11.999 14.942c2.001 0 3.531-1.53 3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531S8.469 2.35 8.469 4.35v7.061c0 2.001 1.53 3.531 3.53 3.531zm6.238-3.53c0 3.531-2.942 6.002-6.238 6.002s-6.238-2.471-6.238-6.002H4.233c0 4.001 3.178 7.297 7.061 7.885v3.884h1.412v-3.884c3.883-.588 7.061-3.884 7.061-7.885h-1.53z"/></svg>
                            </template>
                        </button>
                    </div>
                </div>

                {{-- Live badge --}}
                <div class="absolute -top-2 -right-2 bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-lg flex items-center gap-1">
                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span>
                    ⚡ AI Replies in 2s
                </div>

                {{-- Unread count badge --}}
                <div x-show="visibleMessages.length > 0"
                     x-transition
                     class="absolute -top-1.5 -left-1.5 w-[22px] h-[22px] bg-[#25D366] text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-lg"
                     x-text="visibleMessages.length">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- 🔥 PAIN POINTS — Make them feel the problem   --}}
{{-- ============================================= --}}
<section class="py-16 bg-white" id="pain-points">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-semibold mb-4">
                🔥 Does This Sound Familiar?
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                How many of these are costing <span class="text-red-600">your</span> business money?
            </h2>
        </div>

        <div class="space-y-4" x-data>
            @php
            $pains = [
                ['icon' => '📞', 'text' => 'Missed calls after working hours — customers go to competitors', 'stat' => '62% of callers never call back'],
                ['icon' => '😰', 'text' => 'Reception/front desk overloaded — can\'t handle peak volume', 'stat' => 'Average hold time = lost customer'],
                ['icon' => '💬', 'text' => 'WhatsApp messages not followed up within 5 minutes', 'stat' => 'Response after 5 min = 80% drop-off'],
                ['icon' => '🔁', 'text' => 'Staff answering the same questions every single day', 'stat' => '70% of queries are repetitive'],
                ['icon' => '📉', 'text' => 'Google Ads & marketing leads not converting because nobody responds fast enough', 'stat' => 'You\'re paying for leads you ignore'],
            ];
            @endphp

            @foreach($pains as $i => $pain)
            <div class="bg-slate-50 border-2 rounded-xl p-5 cursor-pointer transition-all duration-300 hover:border-red-300"
                 :class="$store.painPoints.checked[{{ $i }}] ? 'border-red-400 bg-red-50' : 'border-slate-200'"
                 @click="$store.painPoints.toggle({{ $i }})">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 mt-0.5">
                        <div class="w-6 h-6 rounded-md border-2 flex items-center justify-center transition-all"
                             :class="$store.painPoints.checked[{{ $i }}] ? 'bg-red-500 border-red-500' : 'border-slate-300 bg-white'">
                            <svg x-show="$store.painPoints.checked[{{ $i }}]" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between gap-4">
                            <p class="font-semibold text-slate-900">
                                <span class="mr-2">{{ $pain['icon'] }}</span>{{ $pain['text'] }}
                            </p>
                        </div>
                        <p class="text-red-600 text-sm font-medium mt-1">↳ {{ $pain['stat'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Dynamic response based on checks --}}
            <div x-show="$store.painPoints.totalChecked >= 3" x-transition class="mt-8 bg-red-600 text-white rounded-xl p-6 text-center">
                <p class="text-lg font-bold mb-2">You checked <span x-text="$store.painPoints.totalChecked"></span> out of 5.</p>
                <p class="text-red-100">That means you're actively losing revenue every single day. Let's fix it in 14 days.</p>
                <a href="#book-demo" class="inline-flex items-center mt-4 px-6 py-3 bg-white text-red-600 font-bold rounded-xl hover:bg-red-50 transition-all">
                    Book a 15-Minute AI Demo →
                </a>
            </div>
            <div x-show="$store.painPoints.totalChecked >= 1 && $store.painPoints.totalChecked < 3" x-transition class="mt-8 bg-orange-50 border border-orange-200 rounded-xl p-6 text-center">
                <p class="text-lg font-bold text-orange-800">Even <span x-text="$store.painPoints.totalChecked"></span> of these is costing you thousands monthly.</p>
                <p class="text-orange-600 text-sm mt-1">Keep reading to see the exact math below ↓</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- 💡 AGITATION — Show the revenue bleeding       --}}
{{-- ============================================= --}}
<section class="py-16 bg-gradient-to-br from-slate-900 via-red-950 to-slate-900 relative overflow-hidden" id="agitation">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500 rounded-full filter blur-[120px]"></div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Let's Do The Math On Your <span class="text-red-400">Lost Revenue</span>
            </h2>
            <p class="text-lg text-slate-300">Every missed appointment / enquiry is money walking out the door.</p>
        </div>

        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-8 md:p-10" x-data="lossCalculator">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Inputs --}}
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Missed customers per week</label>
                        <input type="range" min="1" max="30" step="1" x-model="missedPerWeek" class="w-full h-2 bg-red-900 rounded-full appearance-none cursor-pointer accent-red-500">
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-slate-400">1</span>
                            <span class="text-red-400 font-bold text-lg" x-text="missedPerWeek"></span>
                            <span class="text-slate-400">30</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Average value per customer (<span x-text="currency">₹</span>)</label>
                        <input type="range" min="500" max="50000" step="500" x-model="valuePerCustomer" class="w-full h-2 bg-red-900 rounded-full appearance-none cursor-pointer accent-red-500">
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-slate-400"><span x-text="currency">₹</span>500</span>
                            <span class="text-red-400 font-bold text-lg"><span x-text="currency">₹</span><span x-text="Number(valuePerCustomer).toLocaleString()"></span></span>
                            <span class="text-slate-400"><span x-text="currency">₹</span>50K</span>
                        </div>
                    </div>
                </div>

                {{-- The painful results --}}
                <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-6">
                    <h4 class="text-red-400 font-semibold text-sm uppercase tracking-wider mb-4">What You're Losing</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-red-500/20 pb-3">
                            <span class="text-slate-300 text-sm">Weekly loss</span>
                            <span class="text-xl font-bold text-red-400"><span x-text="currency">₹</span><span x-text="weeklyLoss.toLocaleString()"></span></span>
                        </div>
                        <div class="flex justify-between items-center border-b border-red-500/20 pb-3">
                            <span class="text-slate-300 text-sm">Monthly loss</span>
                            <span class="text-2xl font-bold text-red-400"><span x-text="currency">₹</span><span x-text="monthlyLoss.toLocaleString()"></span></span>
                        </div>
                        <div class="flex justify-between items-center pt-1">
                            <span class="text-white font-semibold">Yearly loss</span>
                            <span class="text-3xl font-bold text-red-400"><span x-text="currency">₹</span><span x-text="yearlyLoss.toLocaleString()"></span></span>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-slate-900/50 rounded-lg p-4 border border-slate-700">
                        <p class="text-white text-sm font-medium">
                            💡 Our AI automation costs a <strong>fraction</strong> of what you're losing.
                            <br>
                            <span class="text-green-400">Now <span x-text="currency">₹</span><span x-text="monthlyLoss.toLocaleString()"></span>/month in losses looks expensive, doesn't it?</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- CTA --}}
            <div class="text-center mt-8">
                <a href="#book-demo" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover:from-orange-400 hover:to-red-500 transition-all shadow-lg text-lg">
                    Stop Losing Money — Book Your 15-Min Demo
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- 🏆 SOLUTION — The AI Automation System         --}}
{{-- ============================================= --}}
<section class="py-20 bg-white" id="solution">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                🏆 The Fix
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                Our AI Customer Automation System
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                One system that handles everything your overloaded team can't — instantly, 24/7, on every channel.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $features = [
                ['icon' => '💬', 'color' => 'green', 'title' => 'Never Lose a 2AM WhatsApp Lead Again', 'desc' => 'AI answers every WhatsApp message instantly — enquiries, pricing, directions — even at 2 AM. Your competitors get nothing.'],
                ['icon' => '📅', 'color' => 'blue', 'title' => 'Customers Book While You Sleep', 'desc' => 'Appointments booked directly in the chat, synced to your calendar. Zero manual entry. Zero missed bookings.'],
                ['icon' => '🎯', 'color' => 'purple', 'title' => 'Stop Wasting Time on Tyre-Kickers', 'desc' => 'AI asks the right questions, scores every lead. Your team only speaks to ready buyers — no more dead-end calls.'],
                ['icon' => '🔔', 'color' => 'orange', 'title' => 'Zero No-Shows, Zero Manual Follow-Ups', 'desc' => 'Automatic reminders, follow-ups, and re-engagement via WhatsApp. Patients and customers actually show up.'],
                ['icon' => '📊', 'color' => 'indigo', 'title' => 'See Exactly Which Ads Make You Money', 'desc' => 'Real-time dashboard shows which campaigns bring leads, which convert, and where you\'re burning budget.'],
                ['icon' => '🤝', 'color' => 'teal', 'title' => 'Complex Queries? Your Team Gets Full Context', 'desc' => 'AI handles 70%+ automatically. Tricky cases get escalated with complete conversation history — no customer repeats themselves.'],
            ];
            @endphp

            @foreach($features as $feature)
            <div class="bg-{{ $feature['color'] }}-50 border border-{{ $feature['color'] }}-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 group">
                <div class="text-4xl mb-4">{{ $feature['icon'] }}</div>
                <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-{{ $feature['color'] }}-600 transition-colors">{{ $feature['title'] }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Security & Privacy Trust Strip --}}
        <div class="mt-10 bg-slate-50 border border-slate-200 rounded-2xl px-6 py-5 flex flex-wrap items-center justify-center gap-6 md:gap-10">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">256-bit SSL Encryption</p>
                    <p class="text-xs text-slate-500">All data in transit is encrypted</p>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">GDPR &amp; DPDPA Compliant</p>
                    <p class="text-xs text-slate-500">Your customers' data is protected by law</p>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">Zero Data Sharing</p>
                    <p class="text-xs text-slate-500">Customer data never sold or shared</p>
                </div>
            </div>
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">Right to Deletion</p>
                    <p class="text-xs text-slate-500">Any data erased on request, instantly</p>
                </div>
            </div>
        </div>

        {{-- Mid-page CTA --}}
        <div class="text-center mt-12">
            <p class="text-slate-500 text-sm mb-4">All this, live on your business in 14 days.</p>
            <a href="#book-demo" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl hover:from-green-500 hover:to-emerald-500 transition-all shadow-lg shadow-green-200 text-lg">
                Book a 15-Minute AI Demo
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- 📊 CRM BOOKINGS DASHBOARD — Live Preview       --}}
{{-- ============================================= --}}
<section class="py-16 bg-gradient-to-b from-slate-900 to-slate-800 relative overflow-hidden" id="crm-preview" x-data="crmDashboard">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/3 w-80 h-80 bg-cyan-500 rounded-full filter blur-[120px]"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-blue-500 rounded-full filter blur-[100px]"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-flex items-center px-4 py-2 bg-cyan-500/10 text-cyan-400 rounded-full text-sm font-semibold mb-4 border border-cyan-400/20">
                📊 Live CRM Dashboard Preview
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">
                Every Booking Lands <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">Straight In Your CRM</span>
            </h2>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto">WhatsApp conversations auto-convert into bookings. No manual entry. No missed leads.</p>
        </div>

        {{-- CRM Dashboard Mock --}}
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
            {{-- Dashboard Top Bar --}}
            <div class="bg-white/5 border-b border-white/10 px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <span class="text-slate-400 text-sm ml-3 font-mono">EINOVATECH CRM — Bookings Dashboard</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-green-400 text-xs font-medium">Live</span>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 border-b border-white/10">
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">Today's Bookings</p>
                    <p class="text-2xl font-bold text-white mt-1" x-text="stats.todayBookings">0</p>
                    <p class="text-green-400 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                        +3 from yesterday
                    </p>
                </div>
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">Confirmed</p>
                    <p class="text-2xl font-bold text-green-400 mt-1" x-text="stats.confirmed">0</p>
                    <p class="text-slate-400 text-xs mt-1">Auto-confirmed via AI</p>
                </div>
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">Revenue Today</p>
                    <p class="text-2xl font-bold text-cyan-400 mt-1"><span x-text="($store.geo ? $store.geo.currency : '₹') + stats.revenue.toLocaleString()">0</span></p>
                    <p class="text-cyan-300/90 text-xs mt-1">From WhatsApp bookings</p>
                </div>
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">Avg Response</p>
                    <p class="text-2xl font-bold text-orange-400 mt-1">2.1s</p>
                    <p class="text-slate-400 text-xs mt-1">AI reply speed</p>
                </div>
            </div>

            {{-- Bookings Table --}}
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-white font-semibold text-sm">Recent Bookings</h3>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-slate-400">Auto-synced from WhatsApp</span>
                        <svg class="w-4 h-4 text-green-400 animate-spin" style="animation-duration: 3s;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </div>
                </div>

                {{-- Table Header --}}
                <div class="hidden md:grid grid-cols-12 gap-4 px-4 py-2.5 text-xs font-semibold text-slate-400 uppercase tracking-wider border-b border-white/10">
                    <div class="col-span-3">Customer</div>
                    <div class="col-span-2">Service</div>
                    <div class="col-span-2">Date & Time</div>
                    <div class="col-span-2">Source</div>
                    <div class="col-span-1">Amount</div>
                    <div class="col-span-2">Status</div>
                </div>

                {{-- Table Rows (animated) --}}
                <div class="space-y-1">
                    <template x-for="(booking, idx) in visibleBookings" :key="booking.id">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-4 px-4 py-3 rounded-lg transition-all duration-500 border border-transparent hover:border-white/10"
                             :class="booking.isNew ? 'bg-cyan-500/10 border-cyan-400/20' : 'bg-white/[0.02] hover:bg-white/5'"
                             :style="'animation: slideInRow 0.5s ease-out'">
                            {{-- Customer --}}
                            <div class="col-span-3 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0"
                                     :class="booking.avatarBg">
                                    <span x-text="booking.initials" class="text-white"></span>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-medium" x-text="booking.name"></p>
                                    <p class="text-slate-400 text-xs" x-text="booking.phone"></p>
                                </div>
                            </div>
                            {{-- Service --}}
                            <div class="col-span-2 flex items-center">
                                <span class="text-slate-300 text-sm" x-text="booking.service"></span>
                            </div>
                            {{-- Date & Time --}}
                            <div class="col-span-2 flex items-center">
                                <div>
                                    <p class="text-slate-300 text-sm" x-text="booking.date"></p>
                                    <p class="text-slate-400 text-xs" x-text="booking.time"></p>
                                </div>
                            </div>
                            {{-- Source --}}
                            <div class="col-span-2 flex items-center">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium"
                                      :class="booking.sourceClass">
                                    <span x-text="booking.sourceIcon"></span>
                                    <span x-text="booking.source"></span>
                                </span>
                            </div>
                            {{-- Amount --}}
                            <div class="col-span-1 flex items-center">
                                <span class="text-white text-sm font-semibold" x-text="($store.geo ? $store.geo.currency : '₹') + booking.amount.toLocaleString()"></span>
                            </div>
                            {{-- Status --}}
                            <div class="col-span-2 flex items-center gap-2">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold"
                                      :class="booking.statusClass">
                                    <span class="w-1.5 h-1.5 rounded-full" :class="booking.statusDot"></span>
                                    <span x-text="booking.status"></span>
                                </span>
                                <span x-show="booking.isNew" class="text-cyan-400 text-[10px] font-bold uppercase tracking-wider animate-pulse">NEW</span>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- New booking notification --}}
                <div x-show="showNewBookingAlert" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-4 bg-gradient-to-r from-green-500/10 to-cyan-500/10 border border-green-400/20 rounded-xl p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>
                    </div>
                    <div>
                        <p class="text-green-300 text-sm font-semibold">🎉 New booking just came in via WhatsApp!</p>
                        <p class="text-slate-400 text-xs">AI auto-confirmed and added to your calendar</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="text-center mt-10">
            <p class="text-slate-400 text-sm mb-4">This is what your dashboard looks like with AI handling your bookings 24/7</p>
            <a href="#book-demo" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold rounded-xl hover:from-cyan-400 hover:to-blue-500 transition-all shadow-lg shadow-cyan-500/20 text-lg">
                Get This For Your Business
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>


{{-- ============================================= --}}
{{-- TESTIMONIALS — Social proof                    --}}
{{-- ============================================= --}}
<section class="py-16 bg-white" id="testimonials">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold mb-4">
                Real Results From Real Businesses
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                Businesses Like Yours Are Already <span class="text-green-600">Recovering Lost Revenue</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $testimonials = [
                [
                    'quote' => 'We were missing 40% of WhatsApp leads after hours. In the first month with AI automation, we booked 18 extra appointments — that\'s over 1.5L in recovered revenue.',
                    'name' => 'Dr. Meera Patel',
                    'role' => 'Owner, SmileCare Dental Clinic',
                    'metric' => '18 extra bookings/month',
                    'color' => 'blue',
                ],
                [
                    'quote' => 'Our front desk was overwhelmed during peak hours. Now AI handles 70%+ of WhatsApp queries instantly. Staff focuses on in-person patients while leads keep converting 24/7.',
                    'name' => 'Rajesh Krishnan',
                    'role' => 'Director, Pristine Skin & Hair',
                    'metric' => '70% queries automated',
                    'color' => 'green',
                ],
                [
                    'quote' => 'We were spending 80K/month on Google Ads but losing leads because nobody responded fast enough. AI now replies in 2 seconds. Our cost-per-booking dropped by 45%.',
                    'name' => 'Ananya Sharma',
                    'role' => 'Marketing Head, UrbanNest Realty',
                    'metric' => '45% lower cost-per-booking',
                    'color' => 'purple',
                ],
            ];
            @endphp

            @foreach($testimonials as $testimonial)
            <div class="bg-{{ $testimonial['color'] }}-50 border border-{{ $testimonial['color'] }}-200 rounded-2xl p-6 flex flex-col">
                {{-- Stars --}}
                <div class="flex gap-0.5 mb-3">
                    @for($s = 0; $s < 5; $s++)
                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                {{-- Quote --}}
                <p class="text-slate-700 text-sm leading-relaxed flex-1 mb-4">"{{ $testimonial['quote'] }}"</p>
                {{-- Metric badge --}}
                <div class="bg-{{ $testimonial['color'] }}-100 text-{{ $testimonial['color'] }}-700 text-xs font-bold px-3 py-1.5 rounded-full inline-flex items-center gap-1 w-fit mb-3">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/></svg>
                    {{ $testimonial['metric'] }}
                </div>
                {{-- Author --}}
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-{{ $testimonial['color'] }}-200 rounded-full flex items-center justify-center text-{{ $testimonial['color'] }}-600 font-bold text-sm">
                        {{ substr($testimonial['name'], 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">{{ $testimonial['name'] }}</p>
                        <p class="text-xs text-slate-500">{{ $testimonial['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Summary stat --}}
        <div class="mt-10 text-center">
            <div class="inline-flex flex-wrap items-center justify-center gap-6 bg-slate-50 border border-slate-200 rounded-full px-8 py-4">
                <div class="text-center">
                    <p class="text-2xl font-black text-slate-900">200+</p>
                    <p class="text-xs text-slate-500">Businesses Automated</p>
                </div>
                <div class="w-px h-10 bg-slate-200 hidden sm:block"></div>
                <div class="text-center">
                    <p class="text-2xl font-black text-green-600">5-12x</p>
                    <p class="text-xs text-slate-500">Average Monthly ROI</p>
                </div>
                <div class="w-px h-10 bg-slate-200 hidden sm:block"></div>
                <div class="text-center">
                    <p class="text-2xl font-black text-blue-600">2s</p>
                    <p class="text-xs text-slate-500">Avg. AI Response Time</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- 🎥 BEFORE vs AFTER + DEMO VIDEO               --}}
{{-- ============================================= --}}
<section class="py-20 bg-slate-50" id="before-after">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Before vs After AI Automation</h2>
            <p class="text-lg text-slate-600">See the difference in how your business operates.</p>
        </div>

        {{-- Before / After Comparison --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            {{-- BEFORE --}}
            <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-8 relative">
                <div class="absolute -top-4 left-6 bg-red-500 text-white text-sm font-bold px-4 py-1.5 rounded-full">❌ BEFORE</div>
                <div class="space-y-4 mt-4">
                    @php
                    $befores = [
                        'Customer calls at 8 PM → Nobody answers',
                        'WhatsApp message sits unread for hours',
                        'Receptionist juggles 5 things at once',
                        'Same FAQ answered 30 times a day',
                        'Google Ads lead → No follow-up → Lost',
                        'Appointment no-shows — no reminders sent',
                        'No idea which marketing channel works',
                    ];
                    @endphp
                    @foreach($befores as $b)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                        <span class="text-slate-700 text-sm">{{ $b }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="mt-6 bg-red-100 rounded-lg p-3 text-center">
                    <span class="text-red-700 font-bold text-sm">Result: Losing significant revenue every month</span>
                </div>
            </div>

            {{-- AFTER --}}
            <div class="bg-green-50 border-2 border-green-200 rounded-2xl p-8 relative">
                <div class="absolute -top-4 left-6 bg-green-500 text-white text-sm font-bold px-4 py-1.5 rounded-full">✅ AFTER</div>
                <div class="space-y-4 mt-4">
                    @php
                    $afters = [
                        'Customer messages at 8 PM → AI replies in 2 seconds',
                        'Every WhatsApp enquiry answered instantly — 24/7',
                        'Reception handles only complex tasks',
                        'AI answers FAQs with perfect consistency',
                        'Google Ads lead → Instant qualification → Booked',
                        'Auto reminders 24h + 1h before appointment',
                        'Dashboard shows ROI per channel in real-time',
                    ];
                    @endphp
                    @foreach($afters as $a)
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-slate-700 text-sm">{{ $a }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="mt-6 bg-green-100 rounded-lg p-3 text-center">
                    <span class="text-green-700 font-bold text-sm">Result: Recovering lost revenue and growing</span>
                </div>
            </div>
        </div>

        {{-- ─── Interactive AI Qualifier Chat (replaces static video) ─── --}}
        <div class="max-w-2xl mx-auto" x-data="demoQualifier" id="demo-qualifier">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-slate-900 mb-2">See It In Action — Chat With Lexi</h3>
                <p class="text-slate-600">Ask Lexi (our AI assistant) anything — she'll show you exactly how this works for YOUR business.</p>
            </div>

            {{-- WhatsApp-style phone frame — reuses all existing .wa-* CSS --}}
            <div class="wa-qualifier-frame mx-auto rounded-[16px] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.35)] relative">

                {{-- Header — reusing exact wa-header styles --}}
                <div class="wa-header">
                    <svg class="wa-header-icon" fill="#aebac1" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                    <div class="wa-avatar">
                        <svg viewBox="0 0 40 40" width="34" height="34" style="border-radius:50%;display:block;">
                            <circle cx="20" cy="20" r="20" fill="#075E54"/>
                            <circle cx="20" cy="15" r="7" fill="#ffffff" opacity="0.9"/>
                            <ellipse cx="20" cy="35" rx="12" ry="9" fill="#ffffff" opacity="0.9"/>
                        </svg>
                        <span class="wa-avatar-dot"></span>
                    </div>
                    <div class="wa-header-info">
                        <div class="wa-header-name">Lexi — EINOVATECH AI</div>
                        <div class="wa-header-status" :class="isLoading ? 'wa-status-typing' : 'wa-status-online'" x-text="isLoading ? 'typing...' : 'online'"></div>
                    </div>
                    <div class="wa-header-actions">
                        <svg class="wa-header-icon" fill="#aebac1" viewBox="0 0 24 24"><path d="M12 7a2 2 0 10-.001-4.001A2 2 0 0012 7zm0 2a2 2 0 10-.001 3.999A2 2 0 0012 9zm0 6a2 2 0 10-.001 3.999A2 2 0 0012 15z"/></svg>
                    </div>
                </div>

                {{-- Chat body --}}
                <div class="wa-chat-body wa-chat-bg overflow-y-auto" id="dq-chat-area" style="height:340px;">

                    {{-- Idle state: START prompt --}}
                    <div x-show="!started" class="flex flex-col items-center justify-center h-full gap-4 py-8">
                        <div class="bg-[#fdf4c5] text-[8.5px] text-[#54656f] px-[8px] py-[4px] rounded-[6px] text-center leading-[12px] max-w-[220px] wa-font-base">
                            🔒 Messages are end-to-end encrypted
                        </div>
                        <div class="text-center px-6">
                            <p class="mb-4" style="font-size:12px;line-height:17px;color:#54656f;font-family:'Segoe UI',Helvetica,Arial,sans-serif;margin-bottom:12px;">Click below to start a live AI conversation and see how automation works for your business.</p>
                            <button @click="start()"
                                class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#25D366] text-white rounded-full font-semibold shadow-sm hover:bg-[#1ebe5d] transition-all active:scale-95 whitespace-nowrap" style="font-size:13px;line-height:1.4;font-family:'Segoe UI',Helvetica,Arial,sans-serif;">
                                <svg style="width:13px;height:13px;flex-shrink:0;" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path><path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path></svg>
                                Talk to Lexi
                            </button>
                        </div>
                    </div>

                    {{-- Date badge --}}
                    <div x-show="started" class="flex justify-center mb-[4px] mt-[4px]">
                        <span class="bg-[#e2ddd5] text-[9px] text-[#54656f] font-medium px-[10px] py-[4px] rounded-[7px] shadow-[0_1px_0.5px_rgba(0,0,0,0.06)] wa-font-base">Today</span>
                    </div>

                    {{-- Message bubbles --}}
                    <template x-for="(msg, idx) in messages" :key="idx">
                        <div :class="msg.role === 'bot' ? 'wa-msg-row wa-msg-in' : 'wa-msg-row wa-msg-out'">
                            <div :class="msg.role === 'bot' ? 'wa-bubble wa-bubble-in' : 'wa-bubble wa-bubble-out'">
                                {{-- newline rendering --}}
                                <template x-for="(line, li) in msg.text.split('\n')" :key="li">
                                    <p class="wa-msg-text" :class="li > 0 ? 'mt-[2px]' : ''" x-text="line"></p>
                                </template>
                            </div>
                        </div>
                    </template>

                    {{-- Typing indicator --}}
                    <div x-show="isLoading" class="wa-msg-row wa-msg-in">
                        <div class="wa-bubble wa-bubble-in wa-typing">
                            <div class="flex gap-[4px] items-center" style="height:12px;">
                                <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-1"></span>
                                <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-2"></span>
                                <span class="w-[6px] h-[6px] bg-[#8696a0] rounded-full wa-dot-3"></span>
                            </div>
                        </div>
                    </div>

                    {{-- SUCCESS state --}}
                    <div x-show="phase === 'done'" class="flex flex-col items-center justify-center py-6 gap-3">
                        <div class="wa-bubble wa-bubble-in" style="max-width:82%;">
                            <p class="wa-msg-text">🎉 You're all set! We'll confirm your demo slot on WhatsApp within 2 hours. See you soon!</p>
                        </div>
                    </div>

                </div>

                {{-- GUIDED: Quick-reply chips (shown below chat area, above input bar) --}}
                <div x-show="phase === 'guided' && !isLoading" class="bg-[#f0f2f5] border-t border-[#e9edef] px-3 py-2">
                    <div class="flex flex-wrap gap-1.5">
                        <template x-for="opt in (guidedSteps[guidedStep] || {options:[]}).options" :key="opt.value">
                            <button @click="selectOption(guidedStep, opt)"
                                class="inline-flex items-center px-[10px] py-[5px] bg-white border border-[#25D366] text-[#075E54] rounded-full font-medium hover:bg-[#f0fdf4] transition-all active:scale-95 shadow-sm wa-font-base" style="font-size:11px;line-height:15px;">
                                <span x-text="opt.label"></span>
                            </button>
                        </template>
                    </div>
                </div>

                {{-- CHAT: Free-text input bar --}}
                <div x-show="phase === 'chat' && !showBookingCta" class="wa-input-bar">
                    <button class="flex-shrink-0 p-[4px]" tabindex="-1">
                        <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#54656f"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
                    </button>
                    <div class="flex-1 bg-white rounded-[21px] px-[10px] py-[5px] flex items-center min-h-[32px]">
                        <input type="text" x-model="inputText"
                            @keydown.enter.prevent="sendMessage()"
                            :disabled="isLoading"
                            placeholder="Ask Lexi anything..."
                            class="w-full wa-msg-text bg-transparent outline-none placeholder-[#8696a0] text-[#111b21] disabled:opacity-50"
                            style="font-size:12px!important;line-height:18px!important;color:#111b21!important;" />
                    </div>
                    <button @click="sendMessage()" :disabled="isLoading || !inputText.trim()" class="flex-shrink-0 p-[4px] disabled:opacity-40">
                        <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="#008069"><path d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.239 1.816-13.239 1.817-.011 7.912z"/></svg>
                    </button>
                </div>

                {{-- CONTACT COLLECTION: after business hours (between guided and chat) --}}
                <div x-show="phase === 'contact'" class="bg-[#f0f2f5] border-t border-[#e9edef] p-3">
                    <p class="wa-font-base text-[11px] font-semibold text-[#075E54] mb-2">📞 Share your contact to continue chatting:</p>
                    <div class="space-y-1.5 mb-2">
                        <div>
                            <input type="text" x-model="contactInfo.name" placeholder="Your name (optional)"
                                class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border border-[#d1d5db] bg-white outline-none focus:border-[#25D366] text-[#111b21]"
                                style="font-size:11px;" />
                        </div>
                        <div>
                            <input type="tel" x-model="contactInfo.whatsapp" placeholder="Phone / WhatsApp number *"
                                class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border bg-white outline-none text-[#111b21]"
                                :class="contactErrors.whatsapp ? 'border-red-400 focus:border-red-500' : 'border-[#d1d5db] focus:border-[#25D366]'"
                                style="font-size:11px;" />
                            <p x-show="contactErrors.whatsapp" x-text="contactErrors.whatsapp" class="text-red-500 text-[9px] mt-0.5 ml-2 wa-font-base"></p>
                        </div>
                        <div>
                            <input type="email" x-model="contactInfo.email" placeholder="Email address *"
                                class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border bg-white outline-none text-[#111b21]"
                                :class="contactErrors.email ? 'border-red-400 focus:border-red-500' : 'border-[#d1d5db] focus:border-[#25D366]'"
                                style="font-size:11px;" />
                            <p x-show="contactErrors.email" x-text="contactErrors.email" class="text-red-500 text-[9px] mt-0.5 ml-2 wa-font-base"></p>
                        </div>
                    </div>
                    <button @click="submitContact()"
                        class="w-full bg-[#25D366] text-white wa-font-base text-[11px] font-semibold py-2 rounded-full hover:bg-[#1ebe5d] transition-all active:scale-95">
                        ✅ Continue Chat
                    </button>
                </div>

                {{-- BOOKING CTA: mini inline form --}}
                <div x-show="showBookingCta && phase !== 'done'" class="bg-[#f0f2f5] border-t border-[#e9edef] p-3">
                    <p class="wa-font-base text-[11px] font-semibold text-[#075E54] mb-2">📅 Book your free 15-min demo:</p>
                    <div class="space-y-1.5 mb-2">
                        <input type="text" x-model="contactInfo.name" placeholder="Your name"
                            class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border border-[#d1d5db] bg-white outline-none focus:border-[#25D366] text-[#111b21]"
                            style="font-size:11px;" />
                        <input type="tel" x-model="contactInfo.whatsapp" placeholder="WhatsApp number"
                            class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border border-[#d1d5db] bg-white outline-none focus:border-[#25D366] text-[#111b21]"
                            style="font-size:11px;" />
                        <input type="email" x-model="contactInfo.email" placeholder="Email address"
                            class="w-full wa-font-base text-[11px] px-2.5 py-1.5 rounded-full border border-[#d1d5db] bg-white outline-none focus:border-[#25D366] text-[#111b21]"
                            style="font-size:11px;" />
                    </div>
                    <div class="flex gap-2">
                        <button @click="bookDemo()" :disabled="!contactInfo.whatsapp"
                            class="flex-1 bg-[#25D366] text-white wa-font-base text-[11px] font-semibold py-2 rounded-full hover:bg-[#1ebe5d] transition-all disabled:opacity-40 active:scale-95">
                            ✅ Confirm My Demo Slot
                        </button>
                        <button @click="bookOnWhatsApp()"
                            class="px-3 py-2 bg-white border border-[#25D366] text-[#075E54] wa-font-base text-[11px] font-semibold rounded-full hover:bg-[#f0fdf4] transition-all active:scale-95">
                            💬 WhatsApp
                        </button>
                    </div>
                </div>

                {{-- Idle footer: just a subtle label --}}
                <div x-show="phase === 'idle'" class="wa-input-bar opacity-50 pointer-events-none">
                    <div class="flex-1 bg-white rounded-[21px] px-[10px] py-[5px] flex items-center min-h-[32px]">
                        <span style="font-size:13px;line-height:20px;color:#8696a0;font-family:'Segoe UI',Helvetica,Arial,sans-serif;">Click 'Talk to Lexi' to start</span>
                    </div>
                </div>

            </div>{{-- /wa-qualifier-frame --}}

            <p class="text-center text-slate-400 text-xs mt-3">Powered by EINOVATECH AI • Responses in &lt;2 seconds</p>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- STAGE 3 — FILTERED LEAD CAPTURE FORM          --}}
{{-- ============================================= --}}
<section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 relative overflow-hidden" id="book-demo">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-64 h-64 bg-cyan-400 rounded-full filter blur-[100px]"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-blue-500 rounded-full filter blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Demo Steps Preview --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 text-center">
                <div class="text-2xl mb-2">🔍</div>
                <p class="text-cyan-400 text-xs font-bold">0–3 min</p>
                <p class="text-white text-sm font-semibold mt-1">Discovery</p>
                <p class="text-blue-200/60 text-xs mt-1">We learn your business</p>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 text-center">
                <div class="text-2xl mb-2">🤖</div>
                <p class="text-cyan-400 text-xs font-bold">3–10 min</p>
                <p class="text-white text-sm font-semibold mt-1">Live AI Demo</p>
                <p class="text-blue-200/60 text-xs mt-1">AI handles your use case</p>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 text-center">
                <div class="text-2xl mb-2">📊</div>
                <p class="text-cyan-400 text-xs font-bold">10–12 min</p>
                <p class="text-white text-sm font-semibold mt-1">ROI Calculation</p>
                <p class="text-blue-200/60 text-xs mt-1">Your real numbers</p>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 text-center">
                <div class="text-2xl mb-2">🚀</div>
                <p class="text-cyan-400 text-xs font-bold">12–15 min</p>
                <p class="text-white text-sm font-semibold mt-1">Go-Live Plan</p>
                <p class="text-blue-200/60 text-xs mt-1">14-day roadmap</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Left: Why Book --}}
            <div>
                <span class="inline-flex items-center px-4 py-2 bg-white/10 text-cyan-300 rounded-full text-sm font-semibold mb-6 border border-cyan-400/30">
                    🎯 15-Minute AI Demo — Free
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    See Exactly How AI Will Work For <span class="text-cyan-400">Your</span> Business
                </h2>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    In 15 minutes, we'll show you a live AI conversation handling your exact business scenario — not a generic pitch.
                </p>

                <div class="space-y-4 mb-8">
                    @php
                    $demoPoints = [
                        'Live WhatsApp conversation flow customised for you',
                        'Automated appointment booking demo',
                        'Lead qualification in real-time',
                        'ROI calculation with your actual numbers',
                        'Go-live timeline — typically 14 days',
                    ];
                    @endphp
                    @foreach($demoPoints as $point)
                    <div class="flex items-center gap-3 text-blue-100">
                        <svg class="w-5 h-5 text-cyan-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ $point }}</span>
                    </div>
                    @endforeach
                </div>

                {{-- WhatsApp alternative --}}
                <div class="bg-green-500/10 border border-green-400/30 rounded-xl p-4 flex items-center gap-4">
                    <svg class="w-8 h-8 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <div>
                        <p class="text-green-300 font-semibold text-sm">Prefer WhatsApp?</p>
                        <a :href="'https://wa.me/' + ($store.geo ? $store.geo.whatsappNumber : '919243077840') + '?text=Hi%2C%20I%20want%20to%20book%20a%2015-minute%20AI%20demo%20for%20my%20business.'" target="_blank" rel="noopener" class="text-green-400 hover:text-green-300 text-sm underline">Message us directly →</a>
                    </div>
                </div>
            </div>

            {{-- Right: Filtered Lead Form --}}
            <div class="bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 p-8 shadow-2xl" x-data="leadForm">
                <div x-show="!submitted">
                    <h3 class="text-xl font-bold text-white mb-2">Book Your 15-Minute AI Demo</h3>
                    <p class="text-blue-100/90 text-sm mb-6">Fill in a few details so we can prepare a demo tailored to your business.</p>

                    <form @submit.prevent="submitForm()" class="space-y-4">
                        {{-- Contact Name --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Your Name *</label>
                            <input type="text" x-model="form.name" required placeholder="e.g. Dr. Sharma" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                        </div>

                        {{-- Business Name --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Business / Clinic Name *</label>
                            <input type="text" x-model="form.businessName" required placeholder="e.g. Dr. Sharma's Dental Clinic" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                        </div>

                        {{-- Number of staff / team size --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Team size (doctors / agents / staff) *</label>
                            <select x-model="form.teamSize" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white/70 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                                <option value="" disabled selected class="text-slate-900">Select</option>
                                <option value="1-3" class="text-slate-900">1–3</option>
                                <option value="4-10" class="text-slate-900">4–10</option>
                                <option value="11-25" class="text-slate-900">11–25</option>
                                <option value="25+" class="text-slate-900">25+</option>
                            </select>
                        </div>

                        {{-- Monthly customer/patient volume --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Monthly customer / patient volume *</label>
                            <select x-model="form.monthlyVolume" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white/70 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                                <option value="" disabled selected class="text-slate-900">Select</option>
                                <option value="under-100" class="text-slate-900">Under 100</option>
                                <option value="100-500" class="text-slate-900">100–500</option>
                                <option value="500-2000" class="text-slate-900">500–2,000</option>
                                <option value="2000+" class="text-slate-900">2,000+</option>
                            </select>
                        </div>

                        {{-- Google Ads --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Do you run Google Ads? *</label>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" x-model="form.runsAds" value="yes" required class="w-4 h-4 text-cyan-500 bg-white/10 border-white/30">
                                    <span class="text-white text-sm">Yes</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" x-model="form.runsAds" value="no" class="w-4 h-4 text-cyan-500 bg-white/10 border-white/30">
                                    <span class="text-white text-sm">No</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" x-model="form.runsAds" value="planning" class="w-4 h-4 text-cyan-500 bg-white/10 border-white/30">
                                    <span class="text-white text-sm">Planning to</span>
                                </label>
                            </div>
                        </div>

                        {{-- WhatsApp Number --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">WhatsApp Number *</label>
                            <input type="tel" x-model="form.whatsapp" required :placeholder="$store.geo ? $store.geo.phone : '+91 98765 43210'" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Email *</label>
                            <input type="email" x-model="form.email" required placeholder="you@business.com" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                        </div>

                        <button type="submit" :disabled="loading" class="w-full px-6 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover:from-orange-400 hover:to-red-500 transition-all shadow-lg text-lg disabled:opacity-60 mt-2">
                            <span x-show="!loading">Book a 15-Minute AI Demo</span>
                            <span x-show="loading" class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                                Booking...
                            </span>
                        </button>
                    </form>
                    <div class="mt-4 text-center space-y-1.5">
                        <p class="text-white/60 text-xs">We respond within 2 hours • Mon–Sat 9AM–7PM IST</p>
                        <p class="text-white/60 text-xs flex items-center justify-center gap-1.5">
                            <svg class="w-3 h-3 flex-shrink-0 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                            Your data is encrypted &amp; never sold.  <a href="{{ route('privacy-policy') }}" class="underline hover:text-white/60 transition-colors">Privacy Policy</a>
                        </p>
                    </div>
                </div>

                {{-- Success State --}}
                <div x-show="submitted" x-transition class="text-center py-8">
                    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Demo Booked!</h3>
                    <p class="text-blue-200 mb-4">We'll send you a confirmation on WhatsApp within 2 hours with your demo time slot.</p>
                    <a :href="'https://wa.me/' + ($store.geo ? $store.geo.whatsappNumber : '919243077840') + '?text=Hi%2C%20I%20just%20booked%20a%2015-minute%20AI%20demo%20on%20your%20website.%20Looking%20forward%20to%20it!'" target="_blank" rel="noopener" class="inline-flex items-center px-6 py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-all">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Continue on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================================= --}}
{{-- STAGE 4B — YOUR CUSTOM AI AGENT + FAQ          --}}
{{-- ============================================= --}}
<section class="py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-sm font-semibold mb-4">
                🤖 Built For Your Business
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900">
                Your Own Custom AI Agent — <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Trained on Your Business.</span>
            </h2>
            <p class="text-lg text-slate-600 mt-3">Every business is different. We build a tailored AI agent that knows your services, speaks your brand voice, and handles your customers 24/7.</p>
        </div>

        {{-- Custom Agent Card --}}
        <div class="max-w-lg mx-auto">
            <div class="bg-white rounded-3xl border-2 border-blue-500 shadow-2xl overflow-hidden relative">
                {{-- Badge --}}
                <div class="absolute -top-1 left-1/2 -translate-x-1/2">
                    <span class="inline-block px-6 py-1.5 bg-gradient-to-r from-blue-600 to-cyan-500 text-white text-xs font-bold rounded-b-xl uppercase tracking-wider">Custom AI Agent</span>
                </div>

                <div class="p-8 pt-12">
                    <h3 class="text-xl font-bold text-slate-900 mb-1">AI Customer Automation System</h3>
                    <p class="text-sm text-slate-500 mb-6">A dedicated AI agent customised for your business — WhatsApp, calls, bookings & more</p>

                    {{-- Value proposition --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-8 flex items-center gap-3">
                        <span class="text-2xl">🎯</span>
                        <div>
                            <p class="text-blue-700 font-bold text-sm">Tailored to Your Exact Needs</p>
                            <p class="text-blue-600 text-xs">We scope, build & train your AI agent in the 15-min demo — see it live before you commit.</p>
                        </div>
                    </div>

                    {{-- Features list --}}
                    <div class="space-y-3 mb-8">
                        @php
                        $agentFeatures = [
                            'WhatsApp AI assistant — 24/7, unlimited messages',
                            'Automated appointment booking & reminders',
                            'Lead qualification & scoring',
                            'Multi-language support (English, Hindi, + more)',
                            'Human handoff for complex queries',
                            'Real-time analytics dashboard',
                            'CRM integration (optional)',
                            'Dedicated account manager',
                            '14-day go-live guarantee',
                        ];
                        @endphp
                        @foreach($agentFeatures as $feat)
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-slate-700 text-sm">{{ $feat }}</span>
                        </div>
                        @endforeach
                    </div>

                    <a href="#book-demo" class="block w-full px-6 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl text-center hover:from-orange-400 hover:to-red-500 transition-all shadow-lg text-lg">
                        Book Your Free 15-Min Demo →
                    </a>
                    <p class="text-xs text-slate-400 text-center mt-3">We'll build your custom AI agent live in the demo — zero commitment.</p>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="max-w-3xl mx-auto mt-20" x-data="{ openFaq: null }">
            <h3 class="text-2xl font-bold text-slate-900 text-center mb-8">
                Common Questions <span class="text-slate-400 font-normal">(We Get It — You Want to Be Sure)</span>
            </h3>

            @php
            $objections = [
                [
                    'q' => '"Will AI sound robotic to my customers?"',
                    'a' => 'No. Our AI is trained on natural conversation patterns and customised with your brand voice, terminology, and FAQs. Most customers can\'t tell they\'re chatting with AI. Plus, complex queries are seamlessly handed off to your team.',
                ],
                [
                    'q' => '"What if it doesn\'t work for my industry?"',
                    'a' => 'We\'ve deployed AI assistants for clinics, salons, real estate, e-commerce, education, and service businesses. If your business takes bookings, answers questions, or qualifies leads — our system works. And we\'ll prove it in your 15-minute demo with YOUR exact use case.',
                ],
                [
                    'q' => '"How long to set up?"',
                    'a' => '14 days from sign-off. That includes: AI training on your business data (Day 1–5), WhatsApp Business API setup (Day 3–7), Testing & refinement (Day 8–12), Go-live with monitoring (Day 13–14). You get a dedicated account manager throughout.',
                ],
                [
                    'q' => '"Is my customer data secure?"',
                    'a' => 'Yes — security is non-negotiable for us. All conversations and customer data are transmitted over 256-bit SSL encryption. We are fully compliant with GDPR and India\'s Digital Personal Data Protection Act (DPDPA). Your data is never sold, shared with third parties, or used outside your own business operations. Customers can request complete data deletion at any time. We run on enterprise-grade cloud infrastructure with strict access controls, audit logs, and regular security reviews.',
                ],
                [
                    'q' => '"Can I still control conversations?"',
                    'a' => 'Absolutely. You set the rules, tone, and escalation triggers. The analytics dashboard gives you full visibility. Human handoff happens automatically for sensitive or complex queries. You\'re always in control.',
                ],
                [
                    'q' => '"What happens in the demo?"',
                    'a' => 'In 15 minutes, our team will build a live AI agent tailored to your exact business — your services, your FAQs, your tone. You\'ll see how it handles real customer scenarios on WhatsApp. Then we\'ll discuss a custom plan that fits your needs and budget. Zero pressure, zero commitment.',
                ],
            ];
            @endphp

            <div class="space-y-3">
                @foreach($objections as $i => $faq)
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden transition-all" :class="openFaq === {{ $i }} ? 'shadow-md border-blue-200' : ''">
                    <button @click="openFaq = openFaq === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between px-6 py-4 text-left hover:bg-slate-50 transition-colors">
                        <span class="font-semibold text-slate-800">{{ $faq['q'] }}</span>
                        <svg class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform duration-200" :class="openFaq === {{ $i }} ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="openFaq === {{ $i }}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="px-6 pb-4">
                        <p class="text-slate-600 leading-relaxed text-sm">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- STAGE 5 — FOLLOW-UP TIMELINE + URGENCY         --}}
{{-- ============================================= --}}
<section class="py-16 bg-gradient-to-r from-slate-900 to-blue-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">
                What Happens After You Book Your Demo
            </h2>
            <p class="text-blue-200">Our follow-up sequence so you know exactly what to expect.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @php
            $followUp = [
                ['day' => 'Instantly', 'action' => 'WhatsApp confirmation with demo time & calendar invite', 'icon' => '📱'],
                ['day' => 'Day 1', 'action' => 'Pre-demo questionnaire so we prepare your personalised demo', 'icon' => '📋'],
                ['day' => 'Demo Day', 'action' => '15-min live demo tailored to your business', 'icon' => '🎥'],
                ['day' => 'Day 2', 'action' => 'Proposal + ROI document sent on WhatsApp', 'icon' => '📄'],
                ['day' => 'Day 4', 'action' => 'Follow-up call to answer any questions', 'icon' => '📞'],
                ['day' => 'Day 6', 'action' => 'Custom proposal — your AI agent plan tailored to your business', 'icon' => '🎯'],
            ];
            @endphp
            @foreach($followUp as $step)
            <div class="bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-colors">
                <span class="text-2xl">{{ $step['icon'] }}</span>
                <p class="text-cyan-400 text-xs font-bold mt-2 uppercase tracking-wider">{{ $step['day'] }}</p>
                <p class="text-white/80 text-sm mt-1 leading-snug">{{ $step['action'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Final CTA --}}
        <div class="text-center mt-12">
            <a href="#book-demo" class="inline-block px-10 py-5 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover:from-orange-400 hover:to-red-500 transition-all shadow-2xl text-xl animate-pulse">
                Book Your Free 15-Minute Demo →
            </a>
            <p class="text-blue-200/80 text-sm mt-3">Limited slots per week • Respond within 2 hours</p>
        </div>
    </div>
</section>

{{-- ============================================= --}}
{{-- FLOATING WHATSAPP BUTTON                       --}}
{{-- ============================================= --}}
<div class="fixed bottom-6 right-6 z-50" x-data="{ tooltip: false }">
    <a :href="'https://wa.me/' + ($store.geo ? $store.geo.whatsappNumber : '919243077840') + '?text=Hi%2C%20I%20want%20to%20know%20more%20about%20AI%20automation%20for%20my%20business.'" target="_blank" rel="noopener"
       @mouseenter="tooltip = true" @mouseleave="tooltip = false"
       class="flex items-center justify-center w-16 h-16 bg-green-500 rounded-full shadow-2xl hover:bg-green-600 hover:scale-110 transition-all duration-300 ring-4 ring-green-400/30">
        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>
    {{-- Tooltip --}}
    <div x-show="tooltip" x-transition class="absolute bottom-20 right-0 bg-slate-800 text-white text-sm px-4 py-2 rounded-lg whitespace-nowrap shadow-lg">
        Chat with us on WhatsApp
        <div class="absolute -bottom-1 right-6 w-2 h-2 bg-slate-800 rotate-45"></div>
    </div>
    {{-- Pulse ring --}}
    <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full animate-ping opacity-75"></span>
    <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full"></span>
</div>

@endsection

@push('styles')
<style>
    html { scroll-behavior: smooth; }
    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none; appearance: none;
        width: 20px; height: 20px; border-radius: 50%;
        background: #2563eb; cursor: pointer;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3);
    }
    input[type="range"]::-moz-range-thumb {
        width: 20px; height: 20px; border-radius: 50%;
        background: #2563eb; cursor: pointer; border: none;
        box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3);
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-4px); }
        75% { transform: translateX(4px); }
    }
    .animate-shake { animation: shake 0.5s ease-in-out; }

    /* ─────────────────────────────────────────────────────── */
    /* WhatsApp Chat – pixel-accurate colours & typography     */
    /* Reference: WhatsApp Web 2.24 design tokens              */
    /* ─────────────────────────────────────────────────────── */

    /* ─── WhatsApp Phone Frame ─── */
    .wa-phone-frame {
        width: 320px;
        height: 520px;
        display: flex;
        flex-direction: column;
        background: #efeae2;
    }
    @media (max-width: 380px) {
        .wa-phone-frame {
            width: calc(100vw - 40px);
            height: 490px;
        }
    }

    /* ─── Demo Qualifier Frame (wider, interactive) ─── */
    .wa-qualifier-frame {
        width: 100%;
        max-width: 580px;
        display: flex;
        flex-direction: column;
        background: #efeae2;
    }

    /* ─── Header ─── */
    .wa-header {
        background-color: #075E54;
        height: 52px;
        min-height: 52px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 0 10px;
    }
    .wa-header-icon {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }
    .wa-avatar {
        position: relative;
        flex-shrink: 0;
    }
    .wa-avatar-dot {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 9px;
        height: 9px;
        background: #25D366;
        border-radius: 50%;
        border: 2px solid #075E54;
    }
    .wa-header-info {
        flex: 1;
        min-width: 0;
    }
    .wa-header-name {
        font-family: "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 12.5px;
        font-weight: 600;
        color: #e9edef;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .wa-header-status {
        font-family: "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 10px;
        line-height: 1.2;
    }
    .wa-status-online { color: #8696a0; }
    .wa-status-typing { color: #25D366; }
    .wa-header-actions {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
    }

    /* ─── Chat body ─── */
    .wa-chat-body {
        flex: 1 1 0%;
        min-height: 0;
        padding: 6px 10px;
    }

    /* ─── Input bar ─── */
    .wa-input-bar {
        background-color: #f0f2f5;
        min-height: 52px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 8px;
    }

    /* ── Base font for all WA elements (forced small) ── */
    .wa-phone-frame,
    .wa-phone-frame *,
    .wa-qualifier-frame,
    .wa-qualifier-frame *,
    .wa-font-base {
        font-family: "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }

    /* Message text – reduced & forced */
    .wa-msg-text {
        font-family: "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
        font-size: 11.5px !important;
        line-height: 16px !important;
        color: #111b21 !important;
        font-weight: 400 !important;
        margin: 0 !important;
        padding: 0 !important;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    .wa-msg-text strong { font-weight: 600 !important; }
    .wa-msg-text br { display: block; margin: 0 !important; }

    /* Timestamp text */
    .wa-msg-time {
        font-family: "Segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
        font-size: 9.5px !important;
        line-height: 1 !important;
        color: #667781 !important;
        display: inline-block;
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* Chat area background – WhatsApp doodle wallpaper */
    .wa-chat-bg {
        background-color: #e5ddd5;
        background-image:
            url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'%3E%3Cdefs%3E%3Cstyle%3E.d%7Bfill:none;stroke:%23c7bca8;stroke-width:0.8;stroke-linecap:round;opacity:0.22%7D .f%7Bfill:%23c7bca8;opacity:0.18%7D%3C/style%3E%3C/defs%3E%3Ccircle class='f' cx='15' cy='12' r='4'/%3E%3Cpath class='d' d='M13 8v8M11 12h8'/%3E%3Crect class='f' x='60' y='5' width='10' height='12' rx='2'/%3E%3Cpath class='d' d='M63 8h4M63 11h4M63 14h2'/%3E%3Cpath class='d' d='M120 8c0-3 5-3 5 0s-5 6-5 6 5-3 5-6'/%3E%3Ccircle class='f' cx='170' cy='12' r='5'/%3E%3Cpath class='d' d='M170 9v4l2 1'/%3E%3Cpath class='d' d='M18 55l3-5 3 5'/%3E%3Ccircle class='f' cx='18' cy='48' r='1'/%3E%3Crect class='f' x='55' y='45' width='14' height='10' rx='3'/%3E%3Cpath class='d' d='M58 48h8M58 51h5'/%3E%3Cpath class='d' d='M115 52c4 0 6-3 6-3M115 48c4 0 6 3 6 3'/%3E%3Ccircle class='f' cx='170' cy='50' r='6'/%3E%3Cpath class='d' d='M167 50h6M170 47v6'/%3E%3Cpath class='d' d='M12 95l6 3-6 3z'/%3E%3Crect class='f' x='56' y='90' width='12' height='8' rx='2'/%3E%3Cpath class='d' d='M122 88c-2 6 4 6 2 12'/%3E%3Ccircle class='f' cx='172' cy='95' r='3'/%3E%3Cpath class='d' d='M172 90v3M170 95h4'/%3E%3Cpath class='d' d='M20 135a5 5 0 1 0 0 10 5 5 0 0 0 0-10'/%3E%3Cpath class='d' d='M18 140h4'/%3E%3Crect class='f' x='60' y='132' width='10' height='14' rx='5'/%3E%3Cpath class='d' d='M65 136v6'/%3E%3Cpath class='d' d='M116 135l4 8h-8z'/%3E%3Ccircle class='f' cx='172' cy='138' r='4'/%3E%3Cpath class='d' d='M170 136l2 3 2-3'/%3E%3Cpath class='d' d='M15 180l3-8 3 8M16 176h4'/%3E%3Ccircle class='f' cx='65' cy='182' r='3.5'/%3E%3Cpath class='d' d='M63 182h4M65 180v4'/%3E%3Cpath class='d' d='M118 178c0 0 4 2 4 5s-4 5-4 5'/%3E%3Crect class='f' x='165' y='176' width='12' height='9' rx='2'/%3E%3Cpath class='d' d='M168 179h6M168 182h4'/%3E%3C/svg%3E");
    }

    /* ── Message rows ── */
    .wa-msg-row {
        display: flex;
        margin-bottom: 4px;
    }
    .wa-msg-in  { justify-content: flex-start; }
    .wa-msg-out { justify-content: flex-end; }

    /* ── Bubble base ── */
    .wa-bubble {
        position: relative;
        max-width: 82%;
        padding: 6px 8px 4px 8px;
        border-radius: 10px;
        box-shadow: 0 1px 0.5px rgba(11,20,26,.13);
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Incoming bubble (bot) – white with tail left */
    .wa-bubble-in {
        background-color: #ffffff;
        border-top-left-radius: 3px;
    }

    /* Outgoing bubble (user) – green with tail right */
    .wa-bubble-out {
        background-color: #d9fdd3;
        border-top-right-radius: 3px;
    }

    /* Typing bubble – slightly smaller padding */
    .wa-typing {
        padding: 8px 12px !important;
    }

    /* ── Bubble tail: CSS border triangle ── */
    .wa-bubble-in::before {
        content: '';
        position: absolute;
        top: 0; left: -6px;
        width: 0; height: 0;
        border-right: 6px solid #ffffff;
        border-bottom: 8px solid transparent;
    }
    .wa-bubble-out::before {
        content: '';
        position: absolute;
        top: 0; right: -6px;
        width: 0; height: 0;
        border-left: 6px solid #d9fdd3;
        border-bottom: 8px solid transparent;
    }

    /* ── Bubble entrance animations ── */
    @keyframes waBubbleIn {
        from { opacity: 0; transform: translateY(6px) scale(0.96); }
        to   { opacity: 1; transform: translateY(0)   scale(1); }
    }
    @keyframes waBubbleOut {
        from { opacity: 0; transform: translateY(6px) scale(0.96); }
        to   { opacity: 1; transform: translateY(0)   scale(1); }
    }
    .wa-msg-in { animation: waBubbleIn  0.15s ease-out both; }
    .wa-msg-out { animation: waBubbleOut 0.15s ease-out both; }

    /* ── WhatsApp scrollbar ── */
    #hero-chat-area::-webkit-scrollbar { width: 4px; }
    #hero-chat-area::-webkit-scrollbar-track { background: transparent; }
    #hero-chat-area::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 10px; }

    /* ── Typing dots (3-ball translateY pulse) ── */
    @keyframes waDot {
        0%, 60%, 100% { transform: translateY(0);    opacity: 0.4; }
        30%            { transform: translateY(-3px); opacity: 1;   }
    }
    .wa-dot-1 { animation: waDot 1.2s ease-in-out 0s    infinite; }
    .wa-dot-2 { animation: waDot 1.2s ease-in-out 0.4s  infinite; }
    .wa-dot-3 { animation: waDot 1.2s ease-in-out 0.8s  infinite; }

    /* ── CRM Dashboard ── */
    @keyframes slideInRow {
        from { opacity: 0; transform: translateX(-20px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes newRowGlow {
        0%   { background-color: rgba(6, 182, 212, 0.15); }
        100% { background-color: rgba(6, 182, 212, 0.03); }
    }
</style>
@endpush

{{-- Alpine component definitions moved to inline <script> at top of @section('content') --}}
{{-- This is required because Alpine.start() is called synchronously in app.js    --}}
{{-- before @push('scripts') runs — so components must be pre-registered via alpine:init --}}
