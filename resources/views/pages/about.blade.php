@extends('layouts.app')

@section('title', 'About Us — EINOVATECH | AI-Powered Customer Automation')
@section('meta_description', 'Learn about EINOVATECH — a forward-thinking technology company building AI-powered WhatsApp chatbots and customer automation solutions for businesses worldwide.')
@section('meta_keywords', 'about EINOVATECH, AI chatbot company, WhatsApp automation, customer automation, AI technology partner')
@section('og_title', 'About EINOVATECH — AI-Powered Customer Automation Company')
@section('og_description', 'EINOVATECH builds AI-powered WhatsApp chatbots and customer automation solutions that help businesses recover lost revenue and serve customers 24/7.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "EINOVATECH",
    "url": "https://einovatech.com",
    "description": "EINOVATECH builds AI-powered WhatsApp chatbots and customer automation solutions for businesses.",
    "foundingDate": "2023",
    "sameAs": [
        "https://www.linkedin.com/company/einovatech"
    ],
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "availableLanguage": ["English", "Hindi"]
    }
}
</script>
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 pt-20 pb-24 md:pt-28 md:pb-32 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-500 rounded-full filter blur-[120px] opacity-20 animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-violet-500 rounded-full filter blur-[120px] opacity-15 animate-pulse" style="animation-delay:2s;"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6 border border-white/20">
                <svg class="w-5 h-5 text-blue-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-white/90 font-medium text-sm">About EINOVATECH</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                We Build AI That
                <span class="bg-gradient-to-r from-teal-400 to-blue-400 bg-clip-text text-transparent"> Talks to Your Customers</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100/80 mb-8 leading-relaxed max-w-4xl mx-auto">
                EINOVATECH is an AI-first technology company specialising in conversational automation. We help businesses automate customer enquiries, book appointments, and qualify leads 24/7 — across WhatsApp, web, and voice.
            </p>
        </div>
    </div>
</section>

<!-- Mission, Vision & Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-gradient-to-br from-teal-50 to-blue-50 rounded-2xl p-8 border border-teal-200 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Our Mission</h2>
                <p class="text-slate-700 leading-relaxed">
                    To make AI-powered customer automation accessible to every business — from local clinics and salons to enterprise retailers — so no customer enquiry goes unanswered, ever.
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 border border-indigo-200 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Our Vision</h2>
                <p class="text-slate-700 leading-relaxed">
                    To be the world's most trusted AI automation partner — powering intelligent conversations for 10,000+ businesses across healthcare, finance, retail, real estate, and education by 2028.
                </p>
            </div>

            <!-- Values -->
            <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-8 border border-orange-200 hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Our Values</h2>
                <p class="text-slate-700 leading-relaxed">
                    Customer-first thinking, relentless innovation, transparent partnerships, and measurable ROI. Every chatbot we build must pay for itself within the first month.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company Story -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">Our Story</h2>
                <div class="space-y-4 text-slate-700 leading-relaxed">
                    <p>
                        EINOVATECH was born from a simple observation: businesses lose thousands in revenue every month because they can't respond to customer enquiries fast enough. A missed WhatsApp message at 11 PM or an unanswered call during lunch break — each one is a lost customer.
                    </p>
                    <p>
                        We set out to solve this with AI-powered conversational automation. Our platform handles enquiries on WhatsApp, books appointments, qualifies leads, and integrates with your existing CRM — all without human intervention.
                    </p>
                    <p>
                        Today, EINOVATECH serves businesses across healthcare, finance, real estate, education, hospitality, and retail. From a single dental clinic in Mumbai to insurance distributors processing hundreds of policies daily — our chatbots work 24/7 so your team doesn't have to.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-square bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center">
                    <div class="text-center p-8">
                        <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-teal-400 via-blue-500 to-violet-600 flex items-center justify-center mx-auto mb-6 shadow-xl">
                            <span class="text-white font-extrabold text-5xl leading-none">H</span>
                        </div>
                        <div class="text-2xl font-bold text-slate-900 mb-2">EINOVATECH</div>
                        <div class="text-slate-600">Illuminating Your Digital Future</div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 bg-white rounded-xl shadow-lg p-6 border border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-slate-900">2s</div>
                            <div class="text-sm text-slate-600">Avg. AI Response Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Sets Us Apart -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">What Sets Us Apart</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">Built for revenue recovery, not just chat replies</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-teal-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">WhatsApp-Native</h3>
                <p class="text-slate-600">Built specifically for WhatsApp Business API — not a generic chatbot adapted for messaging.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">ROI-Focused</h3>
                <p class="text-slate-600">Every deployment is measured by revenue recovered, appointments booked, and leads qualified — not vanity metrics.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-violet-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Industry-Specific</h3>
                <p class="text-slate-600">Pre-trained conversation flows for healthcare, finance, real estate, retail, education, and hospitality.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Live in 14 Days</h3>
                <p class="text-slate-600">From sign-up to live chatbot in 14 days. No months of development — just fast, proven deployment.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-20 bg-gradient-to-br from-slate-900 to-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Trusted by Growing Businesses</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2" x-data="{ count: 0 }" x-intersect.once="let i = setInterval(() => { count++; if(count >= 100) clearInterval(i) }, 20)" x-text="count + '+'">100+</div>
                <div class="text-slate-300">Businesses Automated</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-blue-400 mb-2">24/7</div>
                <div class="text-slate-300">Always-On Automation</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-violet-400 mb-2">2s</div>
                <div class="text-slate-300">Average Response Time</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-orange-400 mb-2">8+</div>
                <div class="text-slate-300">Industries Served</div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Our Technology Stack</h2>
            <p class="text-xl text-slate-600">Enterprise-grade infrastructure powering every conversation</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @php
            $technologies = ['WhatsApp Business API', 'OpenAI GPT-4', 'Laravel', 'Node.js', 'Python', 'AWS', 'Docker', 'Redis', 'PostgreSQL', 'React', 'Tailwind CSS', 'Kubernetes'];
            @endphp
            @foreach($technologies as $tech)
                <div class="bg-slate-50 rounded-xl p-4 text-center hover:bg-slate-100 transition-colors border border-slate-200">
                    <div class="text-sm font-medium text-slate-700">{{ $tech }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 via-blue-600 to-violet-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Automate Your Customer Conversations?</h2>
        <p class="text-xl text-blue-100 mb-8">Book a free 15-minute demo and see how AI chatbots can recover your lost revenue.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-lg text-lg">
                Book a Free Demo
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
            <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur text-white font-bold rounded-xl hover:bg-white/20 transition-colors border border-white/30">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection
