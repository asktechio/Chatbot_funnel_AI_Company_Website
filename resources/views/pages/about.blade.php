@extends('layouts.app')

@section('title', 'About Us - EINOVATECH | AI-Powered Customer Automation')
@section('meta_description', 'Learn about EINOVATECH - a forward-thinking technology company building AI-powered WhatsApp chatbots and customer automation solutions for businesses worldwide.')
@section('meta_keywords', 'about EINOVATECH, AI chatbot company, WhatsApp automation, customer automation, AI technology partner')
@section('og_title', 'About EINOVATECH - AI-Powered Customer Automation Company')
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

<section class="relative pt-20 pb-24 md:pt-28 md:pb-32 overflow-hidden" style="background: linear-gradient(135deg, #070F1A 0%, #0A2540 52%, #0D2E4E 100%);">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 rounded-full filter blur-[120px] opacity-30 animate-pulse" style="background: rgba(0,212,255,0.15);"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full filter blur-[120px] opacity-20 animate-pulse" style="background: rgba(0,130,168,0.22); animation-delay:2s;"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center" data-aos="fade-up">
        <div class="inline-flex items-center px-4 py-2 rounded-full mb-6 border" style="background: rgba(0,212,255,0.08); border-color: rgba(0,212,255,0.22);">
            <svg class="w-5 h-5 mr-2" style="color:#00D4FF;" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-sm font-medium" style="color:#9EEBFF;">About EINOVATECH</span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            We Build AI That
            <span class="bg-clip-text text-transparent" style="background-image: linear-gradient(to right, #00D4FF, #0082A8);"> Talks to Your Customers</span>
        </h1>
        <p class="text-xl md:text-2xl text-slate-300/90 mb-8 leading-relaxed max-w-4xl mx-auto">
            EINOVATECH is an AI-first technology company specialising in conversational automation. We help businesses automate customer enquiries, book appointments, and qualify leads 24/7 - across WhatsApp, web, and voice.
        </p>
    </div>
</section>

<section class="py-20" style="background: #070F1A;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card rounded-2xl p-8" data-aos="fade-up">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6" style="background: rgba(0,212,255,0.1); border: 1px solid rgba(0,212,255,0.2);">
                    <svg class="w-8 h-8 text-cyan-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Our Mission</h2>
                <p class="text-slate-400 leading-relaxed">To make AI-powered customer automation accessible to every business - from local clinics and salons to enterprise retailers - so no customer enquiry goes unanswered, ever.</p>
            </div>

            <div class="glass-card rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6" style="background: rgba(0,212,255,0.1); border: 1px solid rgba(0,212,255,0.2);">
                    <svg class="w-8 h-8 text-cyan-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Our Vision</h2>
                <p class="text-slate-400 leading-relaxed">To be the world's most trusted AI automation partner - powering intelligent conversations for 10,000+ businesses across healthcare, finance, retail, real estate, and education by 2028.</p>
            </div>

            <div class="glass-card rounded-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6" style="background: rgba(0,212,255,0.1); border: 1px solid rgba(0,212,255,0.2);">
                    <svg class="w-8 h-8 text-cyan-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Our Values</h2>
                <p class="text-slate-400 leading-relaxed">Customer-first thinking, relentless innovation, transparent partnerships, and measurable ROI. Every chatbot we build must pay for itself within the first month.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20" style="background: #0A2540;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Our Story</h2>
                <div class="space-y-4 text-slate-300 leading-relaxed">
                    <p>EINOVATECH was born from a simple observation: businesses lose thousands in revenue every month because they cannot respond to customer enquiries fast enough. A missed WhatsApp message at 11 PM or an unanswered call during lunch break - each one is a lost customer.</p>
                    <p>We set out to solve this with AI-powered conversational automation. Our platform handles enquiries on WhatsApp, books appointments, qualifies leads, and integrates with your existing CRM - all without human intervention.</p>
                    <p>Today, EINOVATECH serves businesses across healthcare, finance, real estate, education, hospitality, and retail. From a single dental clinic in Mumbai to insurance distributors processing hundreds of policies daily - our chatbots work 24/7 so your team does not have to.</p>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center glass-card">
                    <div class="text-center p-8">
                        <div class="w-24 h-24 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl" style="background: linear-gradient(135deg, #00D4FF 0%, #0082A8 100%);">
                            <span class="text-[#0A2540] font-extrabold text-5xl leading-none">H</span>
                        </div>
                        <div class="text-2xl font-bold text-white mb-2">EINOVATECH</div>
                        <div class="text-slate-400">Illuminating Your Digital Future</div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 glass-card rounded-xl p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background: rgba(0,212,255,0.1);">
                            <svg class="w-6 h-6 text-cyan-accent" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">2s</div>
                            <div class="text-sm text-slate-400">Avg. AI Response Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20" style="background: #070F1A;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">What Sets Us Apart</h2>
            <p class="text-xl text-slate-400 max-w-3xl mx-auto">Built for revenue recovery, not just chat replies</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
            $features = [
                ['title' => 'WhatsApp-Native', 'desc' => 'Built specifically for WhatsApp Business API - not a generic chatbot adapted for messaging.'],
                ['title' => 'ROI-Focused', 'desc' => 'Every deployment is measured by revenue recovered, appointments booked, and leads qualified - not vanity metrics.'],
                ['title' => 'Industry-Specific', 'desc' => 'Pre-trained conversation flows for healthcare, finance, real estate, retail, education, and hospitality.'],
                ['title' => 'Live in 14 Days', 'desc' => 'From sign-up to live chatbot in 14 days. No months of development - just fast, proven deployment.']
            ];
            @endphp
            @foreach($features as $idx => $feature)
                <div class="glass-card rounded-2xl p-6 text-center" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4" style="background: rgba(0,212,255,0.1); border: 1px solid rgba(0,212,255,0.15);">
                        <svg class="w-8 h-8 text-cyan-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-slate-400">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 text-white" style="background: linear-gradient(135deg, #0A2540 0%, #0D2E4E 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Trusted by Growing Businesses</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center"><div class="text-4xl md:text-5xl font-bold mb-2" style="color:#00D4FF;" x-data="{ count: 0 }" x-intersect.once="let i = setInterval(() => { count++; if(count >= 100) clearInterval(i) }, 20)" x-text="count + '+'">100+</div><div class="text-slate-400">Businesses Automated</div></div>
            <div class="text-center"><div class="text-4xl md:text-5xl font-bold mb-2" style="color:#00D4FF;">24/7</div><div class="text-slate-400">Always-On Automation</div></div>
            <div class="text-center"><div class="text-4xl md:text-5xl font-bold mb-2" style="color:#00D4FF;">2s</div><div class="text-slate-400">Average Response Time</div></div>
            <div class="text-center"><div class="text-4xl md:text-5xl font-bold mb-2" style="color:#00D4FF;">8+</div><div class="text-slate-400">Industries Served</div></div>
        </div>
    </div>
</section>

<section class="py-20" style="background: #070F1A;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Technology Stack</h2>
            <p class="text-xl text-slate-400">Enterprise-grade infrastructure powering every conversation</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @php
            $technologies = ['WhatsApp Business API', 'OpenAI GPT-4', 'Laravel', 'Node.js', 'Python', 'AWS', 'Docker', 'Redis', 'PostgreSQL', 'React', 'Tailwind CSS', 'Kubernetes'];
            @endphp
            @foreach($technologies as $tech)
                <div class="rounded-xl p-4 text-center" style="background: rgba(13,46,78,0.45); border: 1px solid rgba(0,212,255,0.1);">
                    <div class="text-sm font-medium text-slate-300">{{ $tech }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20" style="background: linear-gradient(135deg, #0A2540 0%, #0D2E4E 100%); border-top: 1px solid rgba(0,212,255,0.1);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Automate Your Customer Conversations?</h2>
        <p class="text-xl text-slate-400 mb-8">Book a free 15-minute demo and see how AI chatbots can recover your lost revenue.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-flex items-center justify-center px-8 py-4 font-bold rounded-xl transition-all duration-300 shadow-lg text-lg" style="background: linear-gradient(135deg, #00D4FF 0%, #0082A8 100%); color: #0A2540;">
                Book a Free Demo
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
            <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center px-8 py-4 font-bold rounded-xl transition-colors" style="background: rgba(0,212,255,0.05); border: 1px solid rgba(0,212,255,0.3); color: #00D4FF;">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection
