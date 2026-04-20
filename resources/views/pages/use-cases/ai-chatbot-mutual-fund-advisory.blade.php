@extends('layouts.app')

@section('title', 'AI Chatbot for Mutual Fund Advisory | SEBI-Compliant Fund Advisor | EINOVATECH')
@section('meta_description', 'AI-powered mutual fund chatbot covering 1,500+ schemes: chat-first fund advisory, SIP planning, goal-based investing, portfolio tracking with XIRR, and IFA/RIA dashboard. 100% SEBI-compliant.')
@section('meta_keywords', 'AI chatbot mutual fund, mutual fund advisory chatbot, SEBI compliant chatbot, SIP planner AI, portfolio tracking chatbot, mutual fund comparison AI, IFA chatbot, RIA chatbot, wealth management AI, goal based investing chatbot')
@section('og_title', 'AI Chatbot for Mutual Fund Advisory | SEBI-Compliant | EINOVATECH')
@section('og_description', 'SEBI-compliant AI chatbot for mutual fund advisory: 1,500+ schemes, SIP planning, portfolio tracking with XIRR, and IFA/RIA management dashboard.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "AI Chatbot for Mutual Fund Advisory: SEBI-Compliant Wealth Management Automation",
    "description": "How AI chatbots transform mutual fund advisory with chat-first fund discovery, SIP planning, portfolio tracking, and SEBI compliance automation.",
    "author": { "@type": "Organization", "name": "EINOVATECH", "url": "https://einovatech.com" },
    "publisher": { "@type": "Organization", "name": "EINOVATECH", "logo": { "@type": "ImageObject", "url": "https://einovatech.com/images/logo.png" } },
    "datePublished": "2026-02-26",
    "dateModified": "2026-02-26",
    "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ url()->current() }}" },
    "keywords": ["mutual fund chatbot", "SEBI compliance AI", "SIP planner chatbot", "wealth management automation", "IFA RIA chatbot"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How does an AI chatbot provide mutual fund advisory?",
            "acceptedAnswer": { "@type": "Answer", "text": "The AI chatbot uses natural language to understand investor goals (retirement, child education, wealth building), risk appetite, and investment horizon. It then recommends suitable funds from 1,500+ schemes, creates SIP plans, compares funds side-by-side, and tracks portfolio performance with XIRR calculations — all SEBI-compliant." }
        },
        {
            "@type": "Question",
            "name": "Is an AI mutual fund chatbot SEBI compliant?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. The compliance engine auto-appends risk disclaimers to every recommendation, enforces suitability checks against investor risk profiles, blocks guaranteed return promises, adds past performance disclaimers, manages KYC via Digilocker/CKYC, maintains full audit trails, and integrates SEBI SCORES for grievance redressal." }
        },
        {
            "@type": "Question",
            "name": "Can IFAs and RIAs use the chatbot to manage clients?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. The advisor dashboard enables IFAs/RIAs to add clients via chat, view any client's portfolio, receive AI-generated rebalancing suggestions, generate PDF reports, set SIP reminders, and maintain SEBI IA compliance logs automatically. Advisors handle 10x more clients compared to traditional methods." }
        },
        {
            "@type": "Question",
            "name": "What calculators are available in the mutual fund chatbot?",
            "acceptedAnswer": { "@type": "Answer", "text": "Five specialized calculators triggered by natural language: SIP Planner (monthly investment projections), Lumpsum Projector (one-time investment growth), Goal Planner (reverse-calculate SIP for target corpus), SWP Calculator (systematic withdrawal planning), and Returns Calculator (XIRR computation on actual portfolio)." }
        }
    ]
}
</script>
@endsection

@section('content')

<!-- Breadcrumb -->
<section class="bg-slate-50 py-4 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center text-sm text-slate-600" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Home</a>
            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <a href="{{ url('/use-cases') }}" class="hover:text-blue-600 transition-colors">Chatbot Use Cases</a>
            <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="text-slate-900 font-medium">Mutual Fund Advisory</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-700 via-emerald-800 to-teal-900 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-green-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-white font-medium text-sm">BFSI &bull; SEBI Compliant &bull; Wealth Management</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    AI Chatbot for Mutual Fund Advisory
                </h1>
                <p class="text-xl text-green-100 mb-8 leading-relaxed">
                    Chat-first fund advisory covering 1,500+ schemes. SIP planning, goal-based investing, portfolio tracking with XIRR, and IFA/RIA dashboard — all SEBI-compliant.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-green-700 font-semibold rounded-xl hover:bg-green-50 transition-colors text-center">Request a Demo</a>
                    <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-green-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-green-500/30 transition-colors text-center">All Use Cases</a>
                </div>
            </div>
            <!-- Mock Chat -->
            <div class="lg:pl-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold">MF Advisory AI</div>
                            <div class="text-green-200 text-xs">Online • SEBI Compliant</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">I want to start SIP of ₹10,000/month for my child's education in 15 years</div></div>
                        <div class="flex justify-end"><div class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Great goal! For 15-year education corpus, I recommend large-cap + mid-cap mix. SBI Bluechip (₹5K) + HDFC Mid-Cap (₹5K) projects ₹50.4L at 12% CAGR.</div></div>
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Compare these with Axis funds</div></div>
                        <div class="flex justify-end"><div class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">📊 3Y Returns: SBI Bluechip 14.2% vs Axis Bluechip 13.8%. Expense ratio: SBI 1.42% vs Axis 1.58%. SBI has lower cost with better returns. *Past performance ≠ future results.</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Metrics -->
<section class="bg-white border-b border-slate-200 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-green-600">1,500+</div>
                <div class="text-sm text-slate-600 mt-1">Schemes Covered</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600">80%</div>
                <div class="text-sm text-slate-600 mt-1">Less Time vs Manual</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600">10x</div>
                <div class="text-sm text-slate-600 mt-1">Clients per Advisor</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-orange-600">100%</div>
                <div class="text-sm text-slate-600 mt-1">SEBI Compliant</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<article class="py-16 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="prose prose-lg prose-slate max-w-none mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">How AI Chatbots Transform Mutual Fund Advisory</h2>
            <p class="text-slate-700 leading-relaxed text-lg">
                Traditional mutual fund advisory is labour-intensive: advisors spend hours per client on risk profiling, scheme selection, and portfolio reviews. An <strong>AI-powered mutual fund chatbot</strong> automates this entire workflow. Investors describe goals in natural language — "I want ₹1 crore for retirement in 20 years" — and the system instantly recommends suitable funds from <strong>1,500+ schemes</strong>, creates SIP plans, and tracks portfolio performance.
            </p>
            <p class="text-slate-700 leading-relaxed text-lg">
                For <strong>IFAs and RIAs</strong>, the advisor dashboard manages client portfolios at scale — adding clients via chat, generating AI rebalancing suggestions, and auto-maintaining SEBI compliance logs. Every recommendation includes mandatory risk disclaimers, suitability checks, and past performance disclaimers.
            </p>
        </div>

        <!-- Smart Calculators -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 mb-16 border border-green-200">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">5 Smart Calculators — Triggered by Natural Language</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                $calculators = [
                    ['name' => 'SIP Planner', 'desc' => 'Monthly investment projections with growth visualization', 'example' => '"How much will ₹10K/month grow in 15 years?"'],
                    ['name' => 'Lumpsum Projector', 'desc' => 'One-time investment growth at different return rates', 'example' => '"What will ₹5L grow to in 10 years?"'],
                    ['name' => 'Goal Planner', 'desc' => 'Reverse-calculate SIP needed for target corpus', 'example' => '"How much SIP for ₹1Cr in 20 years?"'],
                    ['name' => 'SWP Calculator', 'desc' => 'Systematic withdrawal planning for regular income', 'example' => '"₹50K/month from ₹1Cr corpus — how long?"'],
                    ['name' => 'Returns (XIRR)', 'desc' => 'Actual portfolio returns with cash flow timing', 'example' => '"What\'s my portfolio XIRR this year?"'],
                ];
                @endphp
                @foreach($calculators as $calc)
                <div class="bg-white rounded-xl p-4 border border-slate-200">
                    <h4 class="font-bold text-slate-900 mb-1">{{ $calc['name'] }}</h4>
                    <p class="text-slate-600 text-sm mb-2">{{ $calc['desc'] }}</p>
                    <p class="text-green-600 text-xs italic">{{ $calc['example'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Core Features -->
        <div class="space-y-8 mb-16">
            @php
            $features = [
                ['title' => 'Chat-First Fund Discovery', 'desc' => 'Investors describe investment goals in natural language. The AI recommends suitable funds based on risk profile, investment horizon, and goal type — covering equity, debt, hybrid, ELSS, and index funds across 1,500+ schemes.', 'color' => 'green'],
                ['title' => 'In-Chat KYC & Portfolio Entry', 'desc' => 'PAN + DOB verification via Digilocker/CKYC. Investors enter existing holdings by simply telling the AI — "200 units SBI Bluechip at 68.50" — and the portfolio auto-populates with current NAV values.', 'color' => 'blue'],
                ['title' => 'Fund Comparison Engine', 'desc' => 'Side-by-side comparison of up to 4 funds showing 3Y/5Y returns, expense ratio, fund size, risk level, and category rank — triggered by natural language like "Compare SBI Bluechip vs HDFC Large Cap."', 'color' => 'purple'],
                ['title' => 'Portfolio Tracking & Rebalancing', 'desc' => 'Real-time holdings table with invested amount, current value, gain %, and total portfolio XIRR. AI-generated rebalancing suggestions when allocation drifts beyond thresholds.', 'color' => 'orange'],
                ['title' => 'IFA/RIA Advisor Dashboard', 'desc' => 'Add clients via chat, view any client portfolio, AI rebalancing suggestions, PDF report generation, SIP reminders, and auto-maintained SEBI IA compliance logs — manage 10x more clients.', 'color' => 'teal'],
                ['title' => 'Smart Alerts & Notifications', 'desc' => 'SIP date reminders, NAV dip notifications, rebalancing opportunities, NFO windows, and goal milestone alerts — proactive engagement that keeps investors informed.', 'color' => 'indigo'],
            ];
            @endphp
            @foreach($features as $i => $feature)
            <div class="flex items-start bg-white rounded-xl border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-12 h-12 bg-{{ $feature['color'] }}-100 rounded-xl flex items-center justify-center mr-6">
                    <span class="text-{{ $feature['color'] }}-600 font-bold text-lg">{{ $i + 1 }}</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-slate-600 leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- SEBI Compliance -->
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl p-8 mb-16 text-white">
            <h3 class="text-2xl font-bold mb-6">Built-In SEBI Compliance Engine</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                $compliance = [
                    'Risk disclaimer auto-appended to every fund recommendation',
                    'Suitability check matching advice to investor risk profile',
                    'AI blocked from making guaranteed return promises',
                    'Past performance disclaimer on every return figure',
                    'KYC via Digilocker/CKYC with consent management',
                    'Full audit trail with timestamp & reasoning',
                    'Fee disclosure and explicit opt-in requirements',
                    'Grievance redressal + SEBI SCORES integration',
                ];
                @endphp
                @foreach($compliance as $item)
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-green-300 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-green-100 text-sm">{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Target Users -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Who Benefits?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">📈</div>
                    <h4 class="font-bold text-slate-900 mb-2">Retail Investors</h4>
                    <p class="text-slate-600 text-sm">Goal-based SIP planning, instant fund comparison, portfolio tracking, and smart alerts — accessible 24/7 via chat.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">👨‍💼</div>
                    <h4 class="font-bold text-slate-900 mb-2">IFAs & RIAs</h4>
                    <p class="text-slate-600 text-sm">10x client management capacity with AI rebalancing, PDF reports, and auto-maintained SEBI compliance logs.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">🏢</div>
                    <h4 class="font-bold text-slate-900 mb-2">AMCs & Distributors</h4>
                    <p class="text-slate-600 text-sm">White-label deployment, higher investor engagement, reduced servicing cost, and regulatory compliance automation.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4" x-data="{openFaq: null}">
                @php
                $faqs = [
                    ['q' => 'How does an AI chatbot provide mutual fund advisory?', 'a' => 'The AI understands investor goals, risk appetite, and investment horizon through natural conversation. It recommends suitable funds from 1,500+ schemes, creates SIP plans, compares funds, and tracks portfolio performance with XIRR — all SEBI-compliant with automatic risk disclaimers.'],
                    ['q' => 'Is the mutual fund chatbot SEBI compliant?', 'a' => 'Yes. The compliance engine auto-appends risk disclaimers, enforces suitability checks, blocks guaranteed return promises, adds past performance disclaimers, manages KYC via Digilocker, maintains audit trails, and integrates SEBI SCORES for grievance redressal.'],
                    ['q' => 'Can IFAs and RIAs use this to manage clients?', 'a' => 'Absolutely. The advisor dashboard enables adding clients via chat, viewing portfolios, receiving AI rebalancing suggestions, generating PDF reports, setting SIP reminders, and auto-maintaining SEBI IA compliance logs. Advisors handle 10x more clients compared to manual processes.'],
                    ['q' => 'What languages does the chatbot support?', 'a' => 'Currently Hindi and English, with Tamil and Marathi planned. The multilingual NLP ensures investors can interact in their preferred language for all advisory functions.'],
                    ['q' => 'How is portfolio entry handled?', 'a' => 'Investors tell the AI their holdings in natural language — "200 units SBI Bluechip at 68.50" — and the system auto-populates the portfolio with current NAV, gain/loss, and XIRR calculations. CAS import is also supported.'],
                ];
                @endphp
                @foreach($faqs as $i => $faq)
                <div class="border border-slate-200 rounded-xl overflow-hidden">
                    <button @click="openFaq = openFaq === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between p-6 text-left hover:bg-slate-50 transition-colors">
                        <span class="text-lg font-semibold text-slate-900 pr-4">{{ $faq['q'] }}</span>
                        <svg class="w-5 h-5 text-slate-500 flex-shrink-0 transition-transform" :class="{'rotate-180': openFaq === {{ $i }}}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openFaq === {{ $i }}" x-collapse class="px-6 pb-6">
                        <p class="text-slate-700 leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Related Use Cases -->
        <div class="border-t border-slate-200 pt-12">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">Related BFSI Chatbot Use Cases</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-blue-300 transition-all">
                    <div class="text-sm text-blue-600 font-semibold mb-2">RBI Compliant</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-2">AI Chatbot for Loan Processing & Lending</h4>
                    <p class="text-slate-600 text-sm">Chat-first loan discovery, smart EMI calculators, and instant eligibility.</p>
                </a>
                <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-purple-300 transition-all">
                    <div class="text-sm text-purple-600 font-semibold mb-2">IRDAI Compliant</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-purple-600 transition-colors mb-2">AI Chatbot for Insurance Distribution</h4>
                    <p class="text-slate-600 text-sm">Policy discovery, claims assistance, and agent portal.</p>
                </a>
            </div>
        </div>
    </div>
</article>

<!-- CTA -->
<section class="py-20 bg-gradient-to-r from-green-600 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Automate Mutual Fund Advisory?</h2>
        <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">Deploy SEBI-compliant AI advisory for your AMC, distribution platform, or wealth management firm. 80% faster, 10x scale.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-green-600 font-semibold rounded-xl hover:bg-green-50 transition-colors">Get a Free Demo</a>
            <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-green-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-green-500/30 transition-colors">View All Use Cases</a>
        </div>
    </div>
</section>

@endsection
