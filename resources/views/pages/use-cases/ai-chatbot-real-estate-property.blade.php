@extends('layouts.app')

@section('title', 'AI Chatbot for Real Estate & Property | Lead Qualification & Virtual Tours | EINOVATECH')
@section('meta_description', 'AI chatbot for real estate: property search with natural language, virtual tour scheduling, EMI estimation, RERA compliance, lead qualification, and site visit booking. 50% faster lead conversion for developers and brokers.')
@section('meta_keywords', 'real estate chatbot AI, property search chatbot, RERA compliant chatbot, virtual tour chatbot, real estate lead qualification, EMI calculator chatbot, property portal AI, broker chatbot, real estate CRM chatbot')
@section('og_title', 'AI Chatbot for Real Estate & Property | Lead Qualification | EINOVATECH')
@section('og_description', 'AI chatbot for real estate: natural language property search, virtual tours, EMI calculations, and RERA-compliant lead qualification. 50% faster conversions.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "AI Chatbot for Real Estate & Property: From Search to Site Visit",
    "description": "How AI chatbots transform real estate with intelligent property matching, RERA-compliant information delivery, and automated lead qualification.",
    "author": { "@type": "Organization", "name": "EINOVATECH", "url": "https://einovatech.com" },
    "publisher": { "@type": "Organization", "name": "EINOVATECH", "logo": { "@type": "ImageObject", "url": "https://einovatech.com/images/logo.png" } },
    "datePublished": "2026-02-26",
    "dateModified": "2026-02-26",
    "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ url()->current() }}" },
    "keywords": ["real estate chatbot", "property AI", "RERA compliance", "lead qualification", "virtual tours"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How does the AI chatbot qualify real estate leads?",
            "acceptedAnswer": { "@type": "Answer", "text": "The chatbot qualifies leads through conversational data collection: budget range, preferred location, property type (apartment/villa/plot), BHK configuration, possession timeline, and financing needs. It scores each lead based on engagement depth and purchase intent, routing hot leads to sales teams immediately while nurturing warm leads with periodic updates." }
        },
        {
            "@type": "Question",
            "name": "Is the real estate chatbot RERA compliant?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. The chatbot is designed for RERA compliance: it displays RERA registration numbers for all listed projects, provides only verified carpet area and super built-up area figures, shares approved layouts, does not make price promises beyond registered rates, and maintains conversation logs as disclosure records." }
        },
        {
            "@type": "Question",
            "name": "Can the chatbot schedule site visits automatically?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. The chatbot integrates with sales team calendars to show available time slots, books confirmed appointments, sends reminders via WhatsApp/SMS, shares location and directions, and tracks visit completion. If a visitor doesn't show up, it automatically reschedules within 48 hours." }
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
            <span class="text-slate-900 font-medium">Real Estate & Property</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-teal-600 via-teal-700 to-emerald-800 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-teal-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    <span class="text-white font-medium text-sm">Real Estate &bull; PropTech AI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    AI Chatbot for Real Estate & Property
                </h1>
                <p class="text-xl text-teal-100 mb-8 leading-relaxed">
                    Intelligent property matching, RERA-compliant information delivery, automated lead qualification, EMI estimation, virtual tour scheduling, and site visit booking — 50% faster lead-to-site-visit conversion.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-teal-700 font-semibold rounded-xl hover:bg-teal-50 transition-colors text-center">Request a Demo</a>
                    <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-teal-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-teal-500/30 transition-colors text-center">All Use Cases</a>
                </div>
            </div>
            <div class="lg:pl-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold">Property Assistant</div>
                            <div class="text-teal-200 text-xs">Online • RERA Compliant</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Looking for a 3BHK flat in Whitefield, Bangalore, budget around 1.2 crore</div></div>
                        <div class="flex justify-end"><div class="bg-teal-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Found 8 RERA-registered 3BHK projects in Whitefield (₹95L–₹1.3Cr). Top picks: Prestige Lake Ridge (1,450 sqft, ₹1.1Cr), Brigade Utopia (1,380 sqft, ₹1.05Cr). Shall I show floor plans?</div></div>
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Show me Prestige one and calculate EMI for 80% loan</div></div>
                        <div class="flex justify-end"><div class="bg-teal-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">📐 Prestige Lake Ridge 3BHK: 1,450 sqft, East-facing, possession Dec 2027. RERA: PRM/KA/RERA/1251. EMI for ₹88L (80%): ~₹73,500/month @8.5% for 20 yrs. Book a site visit?</div></div>
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
                <div class="text-3xl md:text-4xl font-bold text-teal-600">50%</div>
                <div class="text-sm text-slate-600 mt-1">Faster Lead Conversion</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600">3x</div>
                <div class="text-sm text-slate-600 mt-1">More Site Visits Booked</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-green-600">70%</div>
                <div class="text-sm text-slate-600 mt-1">Lead Qualification Automated</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600">24/7</div>
                <div class="text-sm text-slate-600 mt-1">Property Inquiry Handling</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<article class="py-16 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="prose prose-lg prose-slate max-w-none mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">Transforming Real Estate with Conversational AI</h2>
            <p class="text-slate-700 leading-relaxed text-lg">
                Real estate is India's second-largest employment sector and increasingly digital. Yet <strong>78% of property inquiries happen outside business hours</strong>, and sales teams waste 30% of time on unqualified leads. AI chatbots bridge this gap: they handle unlimited concurrent inquiries 24/7, qualify leads through natural conversation, and deliver RERA-compliant property details instantly.
            </p>
            <p class="text-slate-700 leading-relaxed text-lg">
                From developers launching new projects to brokerages managing multiple listings, the chatbot acts as a tireless sales assistant — understanding buyer preferences from "3BHK near good schools in South Bangalore under 1 crore" and matching them to the right inventory, complete with floor plans, EMI estimates, and site visit booking.
            </p>
        </div>

        <!-- Core Capabilities -->
        <div class="space-y-8 mb-16">
            @php
            $features = [
                ['title' => 'Intelligent Property Matching', 'desc' => 'NLP engine understands complex property queries: location, BHK, budget, possession date, amenities, facing direction, and lifestyle preferences. Returns RERA-registered matches ranked by buyer fit with carpet area, price per sqft, and builder reputation scores.', 'color' => 'teal'],
                ['title' => 'RERA-Compliant Information', 'desc' => 'All project details display RERA registration numbers, approved carpet areas, completion timelines from approved plans, and occupation certificates. No price promises beyond registered rates. Conversation logs serve as disclosure records.', 'color' => 'green'],
                ['title' => 'EMI & Affordability Calculator', 'desc' => 'Built-in affordability assessment: income-based loan eligibility, EMI calculations across multiple banks and rates, stamp duty and registration charges, and total cost of ownership including maintenance — all within the chat conversation.', 'color' => 'blue'],
                ['title' => 'Virtual Tour Scheduling', 'desc' => 'Integrates with video call platforms and 360° tour tools. Buyers can take virtual property tours, view floor plans and 3D renders, and compare multiple properties — before deciding which ones warrant a physical site visit.', 'color' => 'purple'],
                ['title' => 'Automated Lead Qualification', 'desc' => 'Scores leads based on budget clarity, location firmness, possession urgency, and engagement depth. Routes hot leads (score >80) to sales immediately with full conversation context. Nurtures warm leads with construction updates and price alerts.', 'color' => 'orange'],
                ['title' => 'Site Visit Booking', 'desc' => 'Calendar integration with sales teams for real-time availability. Confirms appointments, sends location/directions via WhatsApp, issues reminders, and auto-reschedules no-shows. 3x more site visits booked vs. traditional web forms.', 'color' => 'indigo'],
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

        <!-- Target Users -->
        <div class="bg-teal-50 rounded-2xl p-8 mb-16">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">Built For</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $users = [
                    ['name' => 'Real Estate Developers', 'desc' => 'New project launches, pre-launch interest capture, construction progress updates, and post-possession support.'],
                    ['name' => 'Brokerages & Agents', 'desc' => 'Multi-property listing management, client matching, site visit coordination, and commission tracking.'],
                    ['name' => 'Property Portals', 'desc' => 'Embedded chat on listing pages, buyer intent extraction, premium lead generation, and seller verification.'],
                ];
                @endphp
                @foreach($users as $user)
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h4 class="font-bold text-teal-700 mb-2">{{ $user['name'] }}</h4>
                    <p class="text-slate-600 text-sm">{{ $user['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- FAQ -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4" x-data="{openFaq: null}">
                @php
                $faqs = [
                    ['q' => 'How does the chatbot qualify real estate leads?', 'a' => 'Through conversational data collection: budget, preferred location, property type, BHK configuration, possession timeline, and financing needs. Each lead is scored on engagement depth and purchase intent, with hot leads routed instantly to sales.'],
                    ['q' => 'Is the chatbot RERA compliant?', 'a' => 'Yes. It displays RERA registration numbers, provides only verified carpet areas, shares approved layouts, never makes price promises beyond registered rates, and maintains conversation logs as disclosure records.'],
                    ['q' => 'Can it schedule site visits automatically?', 'a' => 'Yes. It integrates with sales team calendars, books appointments, sends WhatsApp reminders with location details, and auto-reschedules no-shows. Developers report 3x more site visits booked vs. web forms.'],
                    ['q' => 'Does it work for both residential and commercial?', 'a' => 'Yes. The chatbot supports residential apartments, villas, plots, commercial offices, retail spaces, and co-working properties. Each property type has specialized search filters and qualification criteria.'],
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

        <!-- Related -->
        <div class="border-t border-slate-200 pt-12">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">Explore More Use Cases</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-blue-300 transition-all">
                    <div class="text-sm text-blue-600 font-semibold mb-2">BFSI — Lending</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-2">AI Chatbot for Loan Processing</h4>
                    <p class="text-slate-600 text-sm">Home loan calculators, eligibility checks, and document collection.</p>
                </a>
                <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-orange-300 transition-all">
                    <div class="text-sm text-orange-600 font-semibold mb-2">E-Commerce</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-orange-600 transition-colors mb-2">AI Chatbot for E-Commerce & Retail</h4>
                    <p class="text-slate-600 text-sm">Product discovery, order tracking, and conversational commerce.</p>
                </a>
            </div>
        </div>
    </div>
</article>

<!-- CTA -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Transform Real Estate Lead Conversion?</h2>
        <p class="text-xl text-teal-100 mb-8 max-w-2xl mx-auto">Deploy AI-powered property matching and automated lead qualification. 50% faster conversions, 3x more site visits.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-teal-600 font-semibold rounded-xl hover:bg-teal-50 transition-colors">Get a Free Demo</a>
            <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-teal-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-teal-500/30 transition-colors">View All Use Cases</a>
        </div>
    </div>
</section>

@endsection
