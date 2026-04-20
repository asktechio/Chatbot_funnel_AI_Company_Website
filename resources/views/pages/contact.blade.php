@extends('layouts.app')

@section('title', 'Contact Us — Get Your Free AI Chatbot Demo | EINOVATECH')
@section('meta_description', 'Get started with AI-powered WhatsApp automation. Schedule a free 15-minute demo to see how our chatbot can automate your customer enquiries. Fast response within 2 hours.')
@section('meta_keywords', 'contact EINOVATECH, free chatbot demo, WhatsApp automation quote, AI chatbot consultation, chatbot pricing')
@section('og_title', 'Book a Free AI Chatbot Demo — Contact EINOVATECH')
@section('og_description', 'Schedule a free 15-minute demo with EINOVATECH. See how our AI-powered WhatsApp chatbot automates customer enquiries 24/7 and books appointments automatically.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact EINOVATECH",
    "description": "Book a free 15-minute demo to see how EINOVATECH AI chatbot automates your customer enquiries.",
    "url": "{{ url('/contact') }}",
    "publisher": {
        "@type": "Organization",
        "name": "EINOVATECH",
        "url": "https://einovatech.com",
        "logo": "https://einovatech.com/images/logos/og-logo.png"
    }
}
</script>
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-50 to-blue-50 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-6 leading-tight">
                Ready to Stop
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-500 via-blue-600 to-violet-600">
                    Losing Customers?
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-600 mb-8 leading-relaxed max-w-4xl mx-auto">
                Book a free 15-minute demo and see how AI automation can recover your lost revenue. We respond within 2 hours.
            </p>

            <!-- Contact Info Highlight -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8 mb-8">
                <a href="tel:+919243077840" class="flex items-center gap-3 bg-white rounded-xl px-6 py-4 shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-xs text-slate-500 font-medium">Call Us Now</div>
                        <div class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors">+91 92430 77840</div>
                    </div>
                </a>
                <a href="https://wa.me/919243077840?text=Hi%2C%20I%27m%20interested%20in%20AI%20chatbot%20automation" target="_blank" class="flex items-center gap-3 bg-white rounded-xl px-6 py-4 shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-xs text-slate-500 font-medium">WhatsApp Us</div>
                        <div class="text-lg font-bold text-slate-900 group-hover:text-green-600 transition-colors">Chat Now</div>
                    </div>
                </a>
                <a href="mailto:hello@einovatech.io" class="flex items-center gap-3 bg-white rounded-xl px-6 py-4 shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <div class="text-left">
                        <div class="text-xs text-slate-500 font-medium">Email Us</div>
                        <div class="text-lg font-bold text-slate-900 group-hover:text-violet-600 transition-colors">hello@einovatech.io</div>
                    </div>
                </a>
            </div>

            <!-- Key Benefits -->
            <div class="flex flex-wrap justify-center gap-8 mb-4">
                <div class="flex items-center text-slate-700">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="font-semibold">Free 15-Min Demo</span>
                </div>
                <div class="flex items-center text-slate-700">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="font-semibold">2-Hour Response Time</span>
                </div>
                <div class="flex items-center text-slate-700">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="font-semibold">No Commitment Required</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form + Info -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div class="bg-slate-50 rounded-2xl p-8" x-data="contactForm()">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Get Your Free Demo</h2>
                <p class="text-slate-600 mb-8">Tell us about your business and we'll show you how AI chatbots can help.</p>

                <!-- Success Message -->
                <div x-show="submitted" x-transition class="bg-green-50 border border-green-200 rounded-xl p-6 mb-6" x-cloak>
                    <div class="flex items-center gap-3">
                        <svg class="w-8 h-8 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <div>
                            <div class="font-bold text-green-800">Thank you!</div>
                            <div class="text-green-700 text-sm">We'll get back to you within 2 hours. Check your WhatsApp!</div>
                        </div>
                    </div>
                </div>

                <form x-show="!submitted" @submit.prevent="submitForm()" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-900 mb-2">What industry are you in? *</label>
                        <select x-model="form.industry" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select your industry</option>
                            <option value="healthcare">Healthcare / Clinic</option>
                            <option value="finance">Finance / Lending / Insurance</option>
                            <option value="real-estate">Real Estate / Property</option>
                            <option value="ecommerce">E-Commerce / Retail</option>
                            <option value="education">Education / EdTech</option>
                            <option value="hospitality">Hospitality / Travel</option>
                            <option value="salon-spa">Salon / Spa / Beauty</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">Full Name *</label>
                            <input type="text" x-model="form.name" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your full name">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">Business Name *</label>
                            <input type="text" x-model="form.company" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your business name">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">Email *</label>
                            <input type="email" x-model="form.email" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@company.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">WhatsApp / Phone *</label>
                            <input type="tel" x-model="form.phone" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+91 98765 43210">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-900 mb-2">How many customer enquiries do you get per day?</label>
                        <select x-model="form.volume" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select volume</option>
                            <option value="1-10">1–10 per day</option>
                            <option value="10-50">10–50 per day</option>
                            <option value="50-200">50–200 per day</option>
                            <option value="200+">200+ per day</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-900 mb-2">Tell us about your needs (optional)</label>
                        <textarea x-model="form.message" rows="3" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="E.g., I run a dental clinic and want to automate appointment booking via WhatsApp..."></textarea>
                    </div>
                    <button type="submit" :disabled="submitting" class="w-full bg-gradient-to-r from-teal-500 via-blue-600 to-violet-600 hover:brightness-110 disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold py-4 px-6 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <span x-show="!submitting">Book My Free Demo</span>
                        <span x-show="submitting" x-cloak class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Submitting...
                        </span>
                    </button>
                    <p class="text-xs text-slate-500 text-center">By submitting, you agree to our <a href="{{ url('/privacy-policy') }}" class="text-blue-600 hover:underline">Privacy Policy</a>.</p>
                </form>
            </div>

            <!-- Contact Info Sidebar -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Why Choose EINOVATECH?</h3>
                    <div class="space-y-4">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Live in 14 Days</div>
                                <div class="text-slate-600 text-sm">From sign-up to live AI chatbot in just 2 weeks</div>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">No Risk — Free Trial</div>
                                <div class="text-slate-600 text-sm">Try it for 7 days. If it doesn't book appointments, you pay nothing</div>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-violet-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Dedicated Support</div>
                                <div class="text-slate-600 text-sm">Personal onboarding manager + priority support via WhatsApp</div>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Works Globally</div>
                                <div class="text-slate-600 text-sm">Multi-language support. Serving India, UAE, USA, UK, and growing</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Office Info -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Our Office</h3>
                    <div class="space-y-3 text-sm text-slate-700">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-slate-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div>
                                <div class="font-medium">Einovatech Infosystems Pvt. Ltd.</div>
                                <div class="text-slate-500">Indore, Madhya Pradesh, India</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Mon–Sat: 10:00 AM – 7:00 PM IST</span>
                        </div>
                        <div class="pt-3 border-t border-slate-200 text-xs text-slate-500">
                            <div>CIN: U62091MP2024PTC073760</div>
                            <div>GST: 23AAHCH6362C1ZV</div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Quick -->
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Quick FAQ</h3>
                    <div class="space-y-3" x-data="{ open: null }">
                        <div class="border-b border-blue-100 pb-3">
                            <button @click="open = open === 1 ? null : 1" class="flex items-center justify-between w-full text-left">
                                <span class="text-sm font-medium text-slate-800">How much does it cost?</span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="open === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <p x-show="open === 1" x-collapse class="text-sm text-slate-600 mt-2">Plans start from ₹4,999/month. We offer a 7-day free trial so you can see results before committing.</p>
                        </div>
                        <div class="border-b border-blue-100 pb-3">
                            <button @click="open = open === 2 ? null : 2" class="flex items-center justify-between w-full text-left">
                                <span class="text-sm font-medium text-slate-800">How long to set up?</span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="open === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <p x-show="open === 2" x-collapse class="text-sm text-slate-600 mt-2">Most businesses go live within 14 days. Simple setups can be ready in 3-5 days.</p>
                        </div>
                        <div>
                            <button @click="open = open === 3 ? null : 3" class="flex items-center justify-between w-full text-left">
                                <span class="text-sm font-medium text-slate-800">Do you work outside India?</span>
                                <svg class="w-4 h-4 text-slate-400 transition-transform" :class="open === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <p x-show="open === 3" x-collapse class="text-sm text-slate-600 mt-2">Yes! We serve businesses in India, UAE, USA, UK, Singapore, and more. Our chatbots support multiple languages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('contactForm', () => ({
        form: { name: '', email: '', phone: '', company: '', industry: '', volume: '', message: '' },
        submitting: false,
        submitted: false,
        async submitForm() {
            this.submitting = true;
            try {
                const resp = await fetch('{{ route("chatbot-sales.lead") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: this.form.name,
                        email: this.form.email,
                        phone: this.form.phone,
                        company: this.form.company,
                        industry: this.form.industry,
                        enquiry_volume: this.form.volume,
                        message: this.form.message,
                        source: 'contact-page'
                    })
                });
                this.submitted = true;
            } catch (e) {
                alert('Something went wrong. Please try WhatsApp or call us directly.');
            } finally {
                this.submitting = false;
            }
        }
    }));
});
</script>
@endpush
