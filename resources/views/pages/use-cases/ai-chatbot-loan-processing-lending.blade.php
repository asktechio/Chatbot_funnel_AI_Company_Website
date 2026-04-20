@extends('layouts.app')

@section('title', 'AI Chatbot for Loan Processing & Lending | RBI-Compliant LoanChat AI | HYLUMINIX')
@section('meta_description', 'Discover how AI chatbots transform loan processing with chat-first discovery, smart EMI calculators, in-chat KYC via Digilocker, and instant eligibility across 20+ lenders. 70% faster processing, 100% RBI-compliant.')
@section('meta_keywords', 'AI chatbot loan processing, lending chatbot, RBI compliant chatbot, loan EMI calculator chatbot, digital lending AI, personal loan chatbot, home loan chatbot, business loan AI, DSA chatbot, Digilocker KYC chatbot')
@section('og_title', 'AI Chatbot for Loan Processing & Lending | LoanChat AI | HYLUMINIX')
@section('og_description', 'RBI-compliant AI chatbot for loan processing: chat-first discovery across 6 loan categories, smart calculators, in-chat KYC, and instant eligibility checks.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "AI Chatbot for Loan Processing & Lending: How LoanChat AI Transforms Digital Lending",
    "description": "Complete guide to AI-powered loan processing chatbots with RBI compliance, in-chat KYC, smart calculators, and multi-lender comparison.",
    "author": { "@type": "Organization", "name": "HYLUMINIX", "url": "https://hyluminix.com" },
    "publisher": { "@type": "Organization", "name": "HYLUMINIX", "logo": { "@type": "ImageObject", "url": "https://hyluminix.com/images/logo.png" } },
    "datePublished": "2026-02-26",
    "dateModified": "2026-02-26",
    "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ url()->current() }}" },
    "keywords": ["loan processing chatbot", "lending AI", "RBI compliance", "digital lending", "LoanChat AI", "EMI calculator chatbot"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How does an AI chatbot process loan applications?",
            "acceptedAnswer": { "@type": "Answer", "text": "An AI lending chatbot enables borrowers to describe their loan needs in natural language. The system matches requirements against 20+ lender partners across 6 loan categories (Personal, Home, Business, Gold, Vehicle, Education), performs instant eligibility checks using income, EMI, and CIBIL data, and facilitates in-chat KYC via Digilocker — all within a single conversation." }
        },
        {
            "@type": "Question",
            "name": "Is an AI loan chatbot RBI compliant?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. A properly built lending chatbot enforces RBI 2022 Digital Lending Guidelines including APR & total cost disclosure upfront, Fair Practice Code compliance, KYC/CKYC via Digilocker, DPDPA 2023 consent management, LSP disclosure requirements, cooling-off period enforcement, grievance redressal with RBI Ombudsman integration, and full audit trails." }
        },
        {
            "@type": "Question",
            "name": "What types of loans can an AI chatbot handle?",
            "acceptedAnswer": { "@type": "Answer", "text": "AI lending chatbots typically handle 6 major loan categories: Personal Loans, Home Loans, Business Loans, Gold Loans, Vehicle Loans, and Education Loans. Each category has specialized eligibility criteria, documentation requirements, and lender comparison parameters built into the conversational flow." }
        },
        {
            "@type": "Question",
            "name": "How much faster is AI-powered loan processing vs traditional methods?",
            "acceptedAnswer": { "@type": "Answer", "text": "AI chatbot-powered loan processing is approximately 70% faster than traditional methods. Eligibility checks that previously took days can be completed in 30 seconds. DSAs using chatbot-enabled agent portals handle 10x more leads. 24/7 availability means applications are never delayed by business hours." }
        },
        {
            "@type": "Question",
            "name": "Can loan DSAs and agents use the AI chatbot?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. Modern lending chatbots include a dedicated DSA/Agent portal mode where agents can add leads via chat, view their pipeline, collect documents from borrowers through the chat interface, set automated follow-up reminders, track commissions, and generate approval letters — all without leaving the chat." }
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
            <span class="text-slate-900 font-medium">Loan Processing & Lending</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-cyan-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                    <span class="text-white font-medium text-sm">BFSI &bull; RBI Compliant &bull; LoanChat AI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    AI Chatbot for Loan Processing & Lending
                </h1>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    Chat-first loan discovery across 6 categories, smart calculators, in-chat KYC via Digilocker, and instant eligibility checks — all 100% RBI-compliant.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-blue-700 font-semibold rounded-xl hover:bg-blue-50 transition-colors text-center">
                        Request a Demo
                    </a>
                    <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-blue-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-blue-500/30 transition-colors text-center">
                        All Use Cases
                    </a>
                </div>
            </div>
            <!-- Mock Chat Interface -->
            <div class="lg:pl-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold">LoanChat AI</div>
                            <div class="text-blue-200 text-xs">Online • RBI Compliant</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Hi! I need a home loan of about ₹50 lakhs. What options do I have?</div></div>
                        <div class="flex justify-end"><div class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">I found 8 lender offers for ₹50L home loan. Based on your profile, SBI offers 8.5% APR with EMI ₹44,986/mo. Shall I compare top 3?</div></div>
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Yes, compare top 3 with lowest EMI</div></div>
                        <div class="flex justify-end"><div class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">📊 Comparison ready! SBI: ₹44,986/mo | HDFC: ₹45,120/mo | ICICI: ₹45,340/mo. Want to start application with SBI?</div></div>
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
                <div class="text-3xl md:text-4xl font-bold text-blue-600">70%</div>
                <div class="text-sm text-slate-600 mt-1">Faster Processing</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-green-600">20+</div>
                <div class="text-sm text-slate-600 mt-1">Lender Partners</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600">30s</div>
                <div class="text-sm text-slate-600 mt-1">Eligibility Check</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-orange-600">10x</div>
                <div class="text-sm text-slate-600 mt-1">Leads per DSA</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<article class="py-16 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Overview -->
        <div class="prose prose-lg prose-slate max-w-none mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">How AI Chatbots Transform Loan Processing</h2>
            <p class="text-slate-700 leading-relaxed text-lg">
                Traditional loan processing involves multiple branch visits, paper-heavy documentation, and weeks of waiting. An <strong>AI-powered lending chatbot</strong> collapses this entire journey into a single conversational interface. Borrowers describe their needs in natural language — "I need a home loan for ₹50 lakhs in Mumbai" — and the system instantly matches them with the best-fit options from <strong>20+ lender partners across 6 loan categories</strong>.
            </p>
            <p class="text-slate-700 leading-relaxed text-lg">
                With <strong>LoanChat AI</strong>, the entire lifecycle — from discovery to comparison to application to disbursement tracking — happens inside chat. Smart calculators (EMI, eligibility, balance transfer, prepayment) are triggered by natural language. KYC happens via Digilocker integration. And every interaction is <strong>100% RBI-compliant</strong> with built-in disclosure engines.
            </p>
        </div>

        <!-- Loan Categories -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 mb-16 border border-blue-200">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">6 Loan Categories Supported</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @php
                $loanTypes = [
                    ['name' => 'Personal Loans', 'desc' => 'Unsecured loans up to ₹40L with instant approval', 'icon' => '💰'],
                    ['name' => 'Home Loans', 'desc' => 'Property purchase, construction & renovation', 'icon' => '🏠'],
                    ['name' => 'Business Loans', 'desc' => 'MSME, working capital & equipment finance', 'icon' => '🏢'],
                    ['name' => 'Gold Loans', 'desc' => 'Instant liquidity against gold collateral', 'icon' => '🥇'],
                    ['name' => 'Vehicle Loans', 'desc' => 'New & used car, two-wheeler financing', 'icon' => '🚗'],
                    ['name' => 'Education Loans', 'desc' => 'Domestic & international study financing', 'icon' => '🎓'],
                ];
                @endphp
                @foreach($loanTypes as $loan)
                <div class="bg-white rounded-xl p-4 border border-slate-200">
                    <div class="text-2xl mb-2">{{ $loan['icon'] }}</div>
                    <h4 class="font-bold text-slate-900 mb-1">{{ $loan['name'] }}</h4>
                    <p class="text-slate-600 text-sm">{{ $loan['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Core Features -->
        <div class="prose prose-lg prose-slate max-w-none mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">Core Capabilities</h2>
        </div>

        <div class="space-y-8 mb-16">
            @php
            $features = [
                ['title' => 'Chat-First Loan Discovery', 'desc' => 'Borrowers describe their loan needs in natural language. The AI matches requirements against 20+ lender partners, considering income, credit score, location, and loan purpose to find the best-fit options.', 'color' => 'blue'],
                ['title' => 'Smart Loan Calculators', 'desc' => 'EMI Calculator, Eligibility Check, Balance Transfer calculator, Prepayment Planner, Loan Comparison, and Affordability calculator — all triggered by natural language inside the chat conversation.', 'color' => 'green'],
                ['title' => 'In-Chat KYC & Document Upload', 'desc' => 'PAN/Aadhaar verification via Digilocker integration. Document upload (salary slips, bank statements, ITR) with automated OCR detection — "Net salary: ₹85,000/month detected from uploaded slip."', 'color' => 'purple'],
                ['title' => 'Instant Eligibility & Multi-Lender Comparison', 'desc' => '30-second eligibility check using income, existing EMIs, and CIBIL score. Side-by-side comparison showing rate, EMI, processing fee, total interest, and prepayment penalties across lenders.', 'color' => 'orange'],
                ['title' => 'DSA & Agent Portal', 'desc' => 'Agent mode for DSAs: add leads via chat, view pipeline, collect documents from borrowers, automated follow-up reminders, commission tracking, and approval letter generation — all within the chat interface.', 'color' => 'teal'],
                ['title' => 'Application Tracking & Smart Alerts', 'desc' => 'Real-time status tracking (Submitted → KYC → Docs → Credit Assessment → Property Valuation → Approval → Disbursement). Smart alerts for rate drops, EMI due dates, and new lender offers.', 'color' => 'indigo'],
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

        <!-- RBI Compliance -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 mb-16 text-white">
            <h3 class="text-2xl font-bold mb-6">Built-In RBI Compliance Engine</h3>
            <p class="text-blue-100 mb-6">Every interaction enforced by automated regulatory checks — no manual compliance overhead.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                $compliance = [
                    'APR & total cost disclosure upfront on every offer',
                    'Fair Practice Code: rejection reasons, no hidden charges',
                    'KYC/CKYC via Digilocker with consent management',
                    'DPDPA 2023 data privacy compliance',
                    'RBI 2022 Digital Lending Guidelines (LSP disclosure)',
                    'Cooling-off period enforcement on all loans',
                    'Grievance redressal + RBI Ombudsman integration',
                    'Full audit trail with reasoning & timestamps',
                ];
                @endphp
                @foreach($compliance as $item)
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-green-300 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-blue-100 text-sm">{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Target Users -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Who Benefits?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">👤</div>
                    <h4 class="font-bold text-slate-900 mb-2">Borrowers</h4>
                    <p class="text-slate-600 text-sm">Instant loan comparison, 30-second eligibility, and paperless application through a single chat conversation.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">🤝</div>
                    <h4 class="font-bold text-slate-900 mb-2">DSAs & Agents</h4>
                    <p class="text-slate-600 text-sm">10x lead management capacity with in-chat pipeline tracking, document collection, and commission monitoring.</p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 p-6 text-center">
                    <div class="text-3xl mb-3">🏦</div>
                    <h4 class="font-bold text-slate-900 mb-2">Banks & NBFCs</h4>
                    <p class="text-slate-600 text-sm">Reduced acquisition cost, higher conversion rates, 24/7 lead capture, and automated RBI compliance.</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4" x-data="{openFaq: null}">
                @php
                $faqs = [
                    ['q' => 'How does an AI chatbot process loan applications?', 'a' => 'Borrowers describe their loan needs in natural language. The AI matches requirements against 20+ lender partners across 6 categories, performs instant eligibility checks using income/EMI/CIBIL data, facilitates in-chat KYC via Digilocker, and tracks applications through disbursement — all within a single conversation.'],
                    ['q' => 'Is an AI loan chatbot RBI compliant?', 'a' => 'Yes. The compliance engine enforces RBI 2022 Digital Lending Guidelines including APR disclosure, Fair Practice Code, KYC/CKYC via Digilocker, DPDPA 2023 consent management, LSP disclosure, cooling-off periods, grievance redressal with RBI Ombudsman integration, and full audit trails with timestamps.'],
                    ['q' => 'How much faster is AI-powered loan processing?', 'a' => 'Approximately 70% faster than traditional methods. Eligibility checks complete in 30 seconds vs. days. DSAs handle 10x more leads. 24/7 availability eliminates business-hour delays. Document verification via OCR is instant.'],
                    ['q' => 'Can it handle balance transfer and prepayment analysis?', 'a' => 'Yes. The AI analyzes current loan terms, compares against available refinancing options, and projects total savings including processing fees, rate differential, and remaining tenure. Prepayment planners calculate optimal prepayment amounts to minimize total interest paid.'],
                    ['q' => 'What deployment options are available?', 'a' => 'LoanChat AI is available as a white-label solution for banks and NBFCs, a plugin for existing lending platforms, or a standalone SaaS. Deployment options include demo, 3-month free pilot, and full enterprise/white-label licensing.'],
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
                <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-green-300 transition-all">
                    <div class="text-sm text-green-600 font-semibold mb-2">SEBI Compliant</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-green-600 transition-colors mb-2">AI Chatbot for Mutual Fund Advisory</h4>
                    <p class="text-slate-600 text-sm">Chat-first fund advisory, SIP planning, portfolio tracking with XIRR.</p>
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

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Automate Loan Processing with AI?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Deploy LoanChat AI for your bank, NBFC, or lending platform. 70% faster processing, 100% RBI-compliant, 24/7 availability.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-colors">Get a Free Demo</a>
            <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-blue-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-blue-500/30 transition-colors">View All Use Cases</a>
        </div>
    </div>
</section>

@endsection
