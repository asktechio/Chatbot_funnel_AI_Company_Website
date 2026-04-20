@extends('layouts.app')

@section('title', 'AI Chatbot Use Cases by Industry 2026 | Agentic Chatbot Solutions | EINOVATECH')
@section('meta_description', 'Explore industry-specific AI chatbot use cases: BFSI lending, mutual fund advisory, insurance, healthcare, e-commerce, real estate, education & hospitality. See how agentic chatbots transform operations with 70% faster processing and 24/7 availability.')
@section('meta_keywords', 'AI chatbot use cases, industry chatbot solutions, agentic chatbot, BFSI chatbot, healthcare chatbot, e-commerce chatbot, real estate chatbot, education chatbot, hospitality chatbot, enterprise AI chatbot')
@section('og_title', 'AI Chatbot Use Cases by Industry | Agentic Chatbot Solutions | EINOVATECH')
@section('og_description', '8 industry-specific AI chatbot use cases with real implementation data. From BFSI lending to healthcare patient engagement.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "AI Chatbot Use Cases by Industry 2026",
    "description": "Comprehensive collection of industry-specific AI chatbot use cases showing implementation patterns, ROI data, and compliance frameworks.",
    "publisher": {
        "@type": "Organization",
        "name": "EINOVATECH",
        "url": "https://einovatech.com"
    },
    "mainEntity": {
        "@type": "ItemList",
        "itemListElement": [
            {"@type": "ListItem", "position": 1, "name": "AI Chatbot for Loan Processing & Lending", "url": "{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}"},
            {"@type": "ListItem", "position": 2, "name": "AI Chatbot for Mutual Fund Advisory", "url": "{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}"},
            {"@type": "ListItem", "position": 3, "name": "AI Chatbot for Insurance Distribution", "url": "{{ url('/use-cases/ai-chatbot-insurance-distribution') }}"},
            {"@type": "ListItem", "position": 4, "name": "AI Chatbot for Healthcare & Patient Engagement", "url": "{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}"},
            {"@type": "ListItem", "position": 5, "name": "AI Chatbot for E-Commerce & Retail", "url": "{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}"},
            {"@type": "ListItem", "position": 6, "name": "AI Chatbot for Real Estate & Property", "url": "{{ url('/use-cases/ai-chatbot-real-estate-property') }}"},
            {"@type": "ListItem", "position": 7, "name": "AI Chatbot for Education & EdTech", "url": "{{ url('/use-cases/ai-chatbot-education-edtech') }}"},
            {"@type": "ListItem", "position": 8, "name": "AI Chatbot for Hospitality & Travel", "url": "{{ url('/use-cases/ai-chatbot-hospitality-travel') }}"}
        ]
    }
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
            <span class="text-slate-900 font-medium">Chatbot Use Cases</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-800 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-blue-500/20 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-4xl">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                <svg class="w-5 h-5 text-cyan-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                </svg>
                <span class="text-white font-medium text-sm">Industry-Specific Agentic AI Chatbots &bull; 2026</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                AI Chatbot Use Cases<br>by Industry
            </h1>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-3xl">
                How agentic AI chatbots are transforming 8 major industries — from RBI-compliant lending automation to SEBI-compliant mutual fund advisory, healthcare triage, and beyond.
            </p>
            <div class="flex flex-wrap gap-3">
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">BFSI</span>
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">Healthcare</span>
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">E-Commerce</span>
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">Real Estate</span>
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">Education</span>
                <span class="bg-blue-500/20 text-blue-200 px-3 py-1 rounded-full text-sm border border-blue-400/30">Hospitality</span>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="bg-white border-b border-slate-200 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600">8</div>
                <div class="text-sm text-slate-600 mt-1">Industries Covered</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-green-600">70%</div>
                <div class="text-sm text-slate-600 mt-1">Avg. Processing Speed Gain</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600">24/7</div>
                <div class="text-sm text-slate-600 mt-1">Always-On Availability</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-orange-600">100%</div>
                <div class="text-sm text-slate-600 mt-1">Regulatory Compliance</div>
            </div>
        </div>
    </div>
</section>

<!-- BFSI Use Cases Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                Banking, Financial Services & Insurance
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">BFSI Chatbot Solutions</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Regulatory-compliant AI chatbots built for India's financial services ecosystem — RBI, SEBI & IRDAI compliant out of the box.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Loan Processing -->
            <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-blue-300 transition-all duration-300">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors">
                    <svg class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </div>
                <div class="text-sm text-blue-600 font-semibold mb-2">RBI Compliant</div>
                <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-3">AI Chatbot for Loan Processing & Lending</h3>
                <p class="text-slate-600 mb-4">Chat-first loan discovery, smart EMI calculators, in-chat KYC via Digilocker, instant eligibility checks across 20+ lender partners.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Personal Loans</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Home Loans</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Business Loans</span>
                </div>
                <div class="mt-6 flex items-center text-blue-600 font-medium text-sm">
                    View Use Case
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <!-- Mutual Fund Advisory -->
            <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-green-300 transition-all duration-300">
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors">
                    <svg class="w-7 h-7 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="text-sm text-green-600 font-semibold mb-2">SEBI Compliant</div>
                <h3 class="text-xl font-bold text-slate-900 group-hover:text-green-600 transition-colors mb-3">AI Chatbot for Mutual Fund Advisory</h3>
                <p class="text-slate-600 mb-4">Chat-first fund advisory covering 1,500+ schemes, SIP planning, goal-based investing, portfolio tracking with XIRR, and IFA/RIA dashboard.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">SIP Planning</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Fund Comparison</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Portfolio Tracking</span>
                </div>
                <div class="mt-6 flex items-center text-green-600 font-medium text-sm">
                    View Use Case
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <!-- Insurance Distribution -->
            <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-purple-300 transition-all duration-300">
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors">
                    <svg class="w-7 h-7 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="text-sm text-purple-600 font-semibold mb-2">IRDAI Compliant</div>
                <h3 class="text-xl font-bold text-slate-900 group-hover:text-purple-600 transition-colors mb-3">AI Chatbot for Insurance Distribution</h3>
                <p class="text-slate-600 mb-4">Policy discovery, premium calculators, claims assistance, renewal reminders, and agent portal with IRDAI-compliant disclosure engine.</p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Life Insurance</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Health Insurance</span>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">Motor Insurance</span>
                </div>
                <div class="mt-6 flex items-center text-purple-600 font-medium text-sm">
                    View Use Case
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Other Industries Section -->
<section class="py-16 md:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium mb-4">
                Cross-Industry Solutions
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Industry-Specific Chatbot Use Cases</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Agentic AI chatbots tailored for each industry's unique workflows, compliance requirements, and customer engagement patterns.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Healthcare -->
            <a href="{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-red-300 transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-red-200 transition-colors">
                        <svg class="w-7 h-7 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-red-600 transition-colors mb-2">AI Chatbot for Healthcare & Patient Engagement</h3>
                        <p class="text-slate-600 mb-4">Appointment scheduling, symptom pre-screening, patient triage, medication reminders, lab result delivery, and HIPAA/DISHA-compliant patient communication.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-red-50 text-red-600 px-2 py-1 rounded">Patient Triage</span>
                            <span class="text-xs bg-red-50 text-red-600 px-2 py-1 rounded">Appointment Booking</span>
                            <span class="text-xs bg-red-50 text-red-600 px-2 py-1 rounded">Telemedicine</span>
                        </div>
                        <span class="text-red-600 font-medium text-sm flex items-center">
                            View Use Case
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </div>
                </div>
            </a>

            <!-- E-Commerce -->
            <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-orange-300 transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-orange-200 transition-colors">
                        <svg class="w-7 h-7 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-orange-600 transition-colors mb-2">AI Chatbot for E-Commerce & Retail</h3>
                        <p class="text-slate-600 mb-4">Product discovery via natural language, order tracking, returns/exchange handling, personalized recommendations, abandoned cart recovery, and loyalty program management.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-orange-50 text-orange-600 px-2 py-1 rounded">Product Discovery</span>
                            <span class="text-xs bg-orange-50 text-orange-600 px-2 py-1 rounded">Order Tracking</span>
                            <span class="text-xs bg-orange-50 text-orange-600 px-2 py-1 rounded">Cart Recovery</span>
                        </div>
                        <span class="text-orange-600 font-medium text-sm flex items-center">
                            View Use Case
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Real Estate -->
            <a href="{{ url('/use-cases/ai-chatbot-real-estate-property') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-teal-300 transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-teal-200 transition-colors">
                        <svg class="w-7 h-7 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-teal-600 transition-colors mb-2">AI Chatbot for Real Estate & Property</h3>
                        <p class="text-slate-600 mb-4">Property search via conversational filters, virtual tour scheduling, EMI estimation, lead qualification, RERA-compliant disclosures, and broker/agent management.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-teal-50 text-teal-600 px-2 py-1 rounded">Property Search</span>
                            <span class="text-xs bg-teal-50 text-teal-600 px-2 py-1 rounded">Lead Qualification</span>
                            <span class="text-xs bg-teal-50 text-teal-600 px-2 py-1 rounded">Virtual Tours</span>
                        </div>
                        <span class="text-teal-600 font-medium text-sm flex items-center">
                            View Use Case
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Education -->
            <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-indigo-200 transition-colors">
                        <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors mb-2">AI Chatbot for Education & EdTech</h3>
                        <p class="text-slate-600 mb-4">Student enrollment guidance, course advisory, assignment help, exam prep, attendance tracking, fee payment reminders, and parent communication portal.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-indigo-50 text-indigo-600 px-2 py-1 rounded">Course Advisory</span>
                            <span class="text-xs bg-indigo-50 text-indigo-600 px-2 py-1 rounded">Student Support</span>
                            <span class="text-xs bg-indigo-50 text-indigo-600 px-2 py-1 rounded">Enrollment</span>
                        </div>
                        <span class="text-indigo-600 font-medium text-sm flex items-center">
                            View Use Case
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Hospitality -->
            <a href="{{ url('/use-cases/ai-chatbot-hospitality-travel') }}" class="group block bg-white rounded-2xl border border-slate-200 p-8 hover:shadow-xl hover:border-amber-300 transition-all duration-300 md:col-span-2">
                <div class="flex items-start">
                    <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-amber-200 transition-colors">
                        <svg class="w-7 h-7 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-amber-600 transition-colors mb-2">AI Chatbot for Hospitality & Travel</h3>
                        <p class="text-slate-600 mb-4">Booking assistance, concierge services, check-in/check-out automation, itinerary planning, restaurant recommendations, loyalty program management, and multilingual guest support across 50+ languages.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-amber-50 text-amber-600 px-2 py-1 rounded">Booking Automation</span>
                            <span class="text-xs bg-amber-50 text-amber-600 px-2 py-1 rounded">Concierge AI</span>
                            <span class="text-xs bg-amber-50 text-amber-600 px-2 py-1 rounded">Guest Support</span>
                            <span class="text-xs bg-amber-50 text-amber-600 px-2 py-1 rounded">Itinerary Planning</span>
                        </div>
                        <span class="text-amber-600 font-medium text-sm flex items-center">
                            View Use Case
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Research-Backed Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Backed by Research</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Our chatbot use cases are informed by the latest industry research and adoption data from our case study series.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="https://einovatech.com/case-studies/chatbot-research/global-chatbot-adoption-trends-2026" class="group block bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-all">
                <div class="text-3xl font-bold text-blue-600 mb-2">16.3%</div>
                <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors mb-2">Global Chatbot Adoption</h4>
                <p class="text-slate-600 text-sm">Working-age population actively using AI chatbot products worldwide.</p>
            </a>
            <a href="https://einovatech.com/case-studies/chatbot-research/enterprise-chatbot-barriers-pain-points-2026" class="group block bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-6 border border-amber-200 hover:shadow-lg transition-all">
                <div class="text-3xl font-bold text-amber-600 mb-2">54%</div>
                <h4 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors mb-2">Enterprise GenAI Usage</h4>
                <p class="text-slate-600 text-sm">Organizations currently using generative AI in their operations.</p>
            </a>
            <a href="https://einovatech.com/case-studies/chatbot-research/chatgpt-youth-adoption-gen-z-trends" class="group block bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all">
                <div class="text-3xl font-bold text-purple-600 mb-2">58%</div>
                <h4 class="text-lg font-bold text-slate-900 group-hover:text-purple-600 transition-colors mb-2">Gen Z Chatbot Adoption</h4>
                <p class="text-slate-600 text-sm">Under-30s actively using AI chatbots in 2025 — double 2023 levels.</p>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Ready to Deploy an AI Chatbot for Your Industry?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            EINOVATECH builds enterprise-grade agentic chatbots with RAG, regulatory compliance engines, voice automation, and multilingual support. Let's discuss your use case.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-colors">
                Get a Free Consultation
            </a>
            <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-blue-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-blue-500/30 transition-colors">
                Explore Our Solutions
            </a>
        </div>
    </div>
</section>

@endsection
