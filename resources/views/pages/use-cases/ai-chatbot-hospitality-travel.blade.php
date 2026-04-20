@extends('layouts.app')

@section('title', 'AI Chatbot for Hospitality & Travel | Booking, Concierge & Guest Support | EINOVATECH')
@section('meta_description', 'AI chatbot for hospitality: hotel booking, concierge services, check-in/check-out, itinerary planning, restaurant reservations, multilingual guest support, and loyalty management. 40% higher direct bookings, 55% fewer front desk calls.')
@section('meta_keywords', 'hospitality chatbot AI, hotel chatbot, travel chatbot, booking chatbot, concierge AI, guest support chatbot, hotel check-in chatbot, itinerary planner AI, restaurant reservation chatbot, multilingual hotel chatbot')
@section('og_title', 'AI Chatbot for Hospitality & Travel | Direct Bookings & Guest Experience | EINOVATECH')
@section('og_description', 'AI chatbot for hospitality: direct booking, concierge, check-in, itinerary planning, and multilingual guest support. 40% more direct bookings.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "AI Chatbot for Hospitality & Travel: Guest Experience Reimagined",
    "description": "How AI chatbots transform hospitality with direct booking, digital concierge, and multilingual guest engagement.",
    "author": { "@type": "Organization", "name": "EINOVATECH", "url": "https://einovatech.com" },
    "publisher": { "@type": "Organization", "name": "EINOVATECH", "logo": { "@type": "ImageObject", "url": "https://einovatech.com/images/logo.png" } },
    "datePublished": "2026-02-26",
    "dateModified": "2026-02-26",
    "mainEntityOfPage": { "@type": "WebPage", "@id": "{{ url()->current() }}" },
    "keywords": ["hospitality chatbot", "hotel AI", "travel chatbot", "concierge AI", "guest engagement"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How does an AI chatbot increase direct hotel bookings?",
            "acceptedAnswer": { "@type": "Answer", "text": "AI chatbots increase direct bookings by 40% by engaging website visitors in real-time, answering availability and pricing queries instantly, offering best-rate guarantees, providing room comparisons with photos, handling special requests (extra bed, early check-in), and completing bookings within the chat — eliminating the need to redirect to OTAs." }
        },
        {
            "@type": "Question",
            "name": "Can the chatbot handle multilingual guests?",
            "acceptedAnswer": { "@type": "Answer", "text": "Yes. The chatbot supports 20+ languages including English, Hindi, Arabic, Chinese, Japanese, French, German, Spanish, and Russian. It auto-detects guest language from browser settings or first message, maintains context in that language, and can switch mid-conversation. Ideal for international hotel chains and tourist destinations." }
        },
        {
            "@type": "Question",
            "name": "How does the digital concierge work?",
            "acceptedAnswer": { "@type": "Answer", "text": "The AI concierge provides personalized recommendations for restaurants (with table reservations), local attractions, transportation (taxi booking), spa appointments, room service orders, and activity bookings. It learns guest preferences over stays and proactively suggests relevant experiences based on trip type (business, leisure, family)." }
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
            <span class="text-slate-900 font-medium">Hospitality & Travel</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-amber-600 via-amber-700 to-yellow-800 pt-16 pb-20 md:pt-24 md:pb-28 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 text-amber-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-white font-medium text-sm">Hospitality &bull; Travel AI</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    AI Chatbot for Hospitality & Travel
                </h1>
                <p class="text-xl text-amber-100 mb-8 leading-relaxed">
                    Direct booking engine, digital concierge, contactless check-in, itinerary planning, multilingual guest support, and loyalty management — 40% more direct bookings, 55% fewer front desk calls.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-amber-700 font-semibold rounded-xl hover:bg-amber-50 transition-colors text-center">Request a Demo</a>
                    <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-amber-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-amber-500/30 transition-colors text-center">All Use Cases</a>
                </div>
            </div>
            <div class="lg:pl-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold">Hotel Concierge</div>
                            <div class="text-amber-200 text-xs">Online • 20+ Languages</div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">I need a sea-view room in Goa for Dec 24-28, 2 adults 1 kid</div></div>
                        <div class="flex justify-end"><div class="bg-amber-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">🌊 Found availability! Deluxe Sea View (₹8,500/night) — includes breakfast, kids pool, beach access. Total: ₹34,000. Extra bed for child at ₹500/night. Best rate guarantee! Book now?</div></div>
                        <div class="flex justify-start"><div class="bg-white/20 text-white px-4 py-2 rounded-lg text-sm max-w-xs">Book it! Also need airport transfer and a dinner reservation on Christmas</div></div>
                        <div class="flex justify-end"><div class="bg-amber-500 text-white px-4 py-2 rounded-lg text-sm max-w-xs">✅ Booked! Conf #HYL-24892. Airport transfer (Dec 24, 2PM pickup): ₹1,500. Christmas dinner at Seaside Grill: 8PM, table for 3 with special menu (₹2,800/head). All confirmed! 🎄</div></div>
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
                <div class="text-3xl md:text-4xl font-bold text-amber-600">40%</div>
                <div class="text-sm text-slate-600 mt-1">More Direct Bookings</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600">55%</div>
                <div class="text-sm text-slate-600 mt-1">Fewer Front Desk Calls</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-green-600">20+</div>
                <div class="text-sm text-slate-600 mt-1">Languages Supported</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-purple-600">4.8★</div>
                <div class="text-sm text-slate-600 mt-1">Guest Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<article class="py-16 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="prose prose-lg prose-slate max-w-none mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-6">Reimagining Guest Experience with AI</h2>
            <p class="text-slate-700 leading-relaxed text-lg">
                Hospitality thrives on personalization, yet <strong>OTA commissions eat 15-25% of revenue</strong> and front desk teams are overwhelmed with repetitive queries (WiFi password, checkout time, restaurant hours). AI chatbots reclaim both — driving direct bookings that bypass OTA fees while automating 55% of guest interactions with instant, accurate responses.
            </p>
            <p class="text-slate-700 leading-relaxed text-lg">
                From luxury resorts to budget hotel chains, the AI concierge operates across the entire guest journey: pre-arrival (booking, planning), during stay (concierge, room service, issue resolution), and post-stay (feedback, loyalty, re-engagement). With <strong>20+ language support</strong>, it serves international guests in their preferred language without additional staff.
            </p>
        </div>

        <!-- Guest Journey -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-slate-900 mb-8">The AI-Powered Guest Journey</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-amber-50 rounded-xl p-6 border border-amber-200">
                    <div class="text-amber-600 font-bold text-sm mb-3">PRE-ARRIVAL</div>
                    <h4 class="font-bold text-slate-900 mb-3">Booking & Planning</h4>
                    <ul class="text-sm text-slate-600 space-y-2">
                        <li class="flex items-start"><span class="text-amber-500 mr-2">•</span>Room search & comparison</li>
                        <li class="flex items-start"><span class="text-amber-500 mr-2">•</span>Best-rate direct booking</li>
                        <li class="flex items-start"><span class="text-amber-500 mr-2">•</span>Airport transfer booking</li>
                        <li class="flex items-start"><span class="text-amber-500 mr-2">•</span>Special requests (crib, diet)</li>
                        <li class="flex items-start"><span class="text-amber-500 mr-2">•</span>Local attractions & itinerary</li>
                    </ul>
                </div>
                <div class="bg-green-50 rounded-xl p-6 border border-green-200">
                    <div class="text-green-600 font-bold text-sm mb-3">DURING STAY</div>
                    <h4 class="font-bold text-slate-900 mb-3">Concierge & Service</h4>
                    <ul class="text-sm text-slate-600 space-y-2">
                        <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Contactless check-in/out</li>
                        <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Room service ordering</li>
                        <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Spa & activity booking</li>
                        <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Restaurant reservations</li>
                        <li class="flex items-start"><span class="text-green-500 mr-2">•</span>Issue resolution & escalation</li>
                    </ul>
                </div>
                <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                    <div class="text-blue-600 font-bold text-sm mb-3">POST-STAY</div>
                    <h4 class="font-bold text-slate-900 mb-3">Loyalty & Re-engagement</h4>
                    <ul class="text-sm text-slate-600 space-y-2">
                        <li class="flex items-start"><span class="text-blue-500 mr-2">•</span>Feedback collection</li>
                        <li class="flex items-start"><span class="text-blue-500 mr-2">•</span>Loyalty points status</li>
                        <li class="flex items-start"><span class="text-blue-500 mr-2">•</span>Review management</li>
                        <li class="flex items-start"><span class="text-blue-500 mr-2">•</span>Personalized re-booking offers</li>
                        <li class="flex items-start"><span class="text-blue-500 mr-2">•</span>Referral program</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Core Capabilities -->
        <div class="space-y-8 mb-16">
            @php
            $features = [
                ['title' => 'Direct Booking Engine', 'desc' => 'Real-time inventory and pricing from PMS. NLP understands "sea-view room for 2 adults, Christmas week, under ₹10K/night" — shows matching rooms with photos, amenities, and best-rate guarantee. In-chat payment with instant confirmation. Saves 15-25% OTA commission.', 'color' => 'amber'],
                ['title' => 'Digital Concierge', 'desc' => 'Personalized recommendations for restaurants (with reservations), attractions, activities, and transportation. Learns preferences across stays: business travelers get meeting room suggestions; families get kid-friendly activities. Handles 80+ concierge request types.', 'color' => 'blue'],
                ['title' => 'Contactless Check-in/Check-out', 'desc' => 'Pre-arrival document upload, digital registration card, room assignment notification, digital key delivery, express checkout with folio review, and automated invoice generation. Reduces front desk queue time by 70%.', 'color' => 'green'],
                ['title' => 'Room Service & F&B Ordering', 'desc' => 'Digital menu browsing with dietary filters (vegan, halal, gluten-free), customization options, real-time kitchen capacity, estimated delivery times, and in-chat payment. Increases F&B revenue by 25% through smart upselling.', 'color' => 'purple'],
                ['title' => 'Issue Resolution', 'desc' => 'Real-time complaint handling with automated routing: housekeeping requests → housekeeping team, maintenance → engineering, billing disputes → front office. SLA tracking with guest-visible status. Escalation to duty manager for critical issues.', 'color' => 'red'],
                ['title' => 'Multilingual Guest Support', 'desc' => '20+ languages with auto-detection from guest profile or first message. Maintains context across language switches. Culturally-aware responses (greeting styles, dietary norms, tipping guidance). Eliminates need for multilingual front desk staff.', 'color' => 'teal'],
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

        <!-- Integrations -->
        <div class="bg-gradient-to-r from-amber-600 to-yellow-600 rounded-2xl p-8 mb-16 text-white">
            <h3 class="text-2xl font-bold mb-6">Hospitality System Integrations</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                $systems = ['Opera PMS', 'Cloudbeds', 'RoomRaccoon', 'Hotelogix', 'WhatsApp', 'Google Maps', 'Stripe/Razorpay', 'TripAdvisor'];
                @endphp
                @foreach($systems as $system)
                <div class="bg-white/10 rounded-lg p-3 text-center">
                    <span class="text-white font-medium text-sm">{{ $system }}</span>
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
                    ['q' => 'How does the chatbot increase direct bookings?', 'a' => 'By engaging visitors in real-time, answering queries instantly, offering best-rate guarantees, showing room comparisons with photos, handling special requests, and completing bookings in-chat. Saves 15-25% in OTA commissions.'],
                    ['q' => 'Can it integrate with our existing PMS?', 'a' => 'Yes. Supports Opera, Cloudbeds, RoomRaccoon, Hotelogix, and other PMS systems via API. Real-time sync for inventory, pricing, guest profiles, and reservation data.'],
                    ['q' => 'How does multilingual support work for international hotels?', 'a' => '20+ languages with auto-detection. Maintains context across language switches, provides culturally-aware responses, and eliminates the need for multilingual front desk staff. Ideal for tourist destinations and international chains.'],
                    ['q' => 'Can guests order room service through the chatbot?', 'a' => 'Yes. Digital menu with dietary filters, customization, real-time kitchen capacity, delivery time estimates, and in-chat payment. Increases F&B revenue by 25% through contextual upselling.'],
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
                <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-orange-300 transition-all">
                    <div class="text-sm text-orange-600 font-semibold mb-2">E-Commerce</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-orange-600 transition-colors mb-2">AI Chatbot for E-Commerce & Retail</h4>
                    <p class="text-slate-600 text-sm">Product discovery, order tracking, and conversational commerce.</p>
                </a>
                <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="group block bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg hover:border-indigo-300 transition-all">
                    <div class="text-sm text-indigo-600 font-semibold mb-2">Education</div>
                    <h4 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors mb-2">AI Chatbot for Education & EdTech</h4>
                    <p class="text-slate-600 text-sm">Student enrollment, course advisory, and academic support.</p>
                </a>
            </div>
        </div>
    </div>
</article>

<!-- CTA -->
<section class="py-20 bg-gradient-to-r from-amber-600 to-yellow-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Elevate Guest Experience with AI?</h2>
        <p class="text-xl text-amber-100 mb-8 max-w-2xl mx-auto">Deploy AI concierge for direct bookings, guest services, and multilingual support. 40% more direct bookings, 55% fewer calls.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/#book-demo') }}" class="inline-block px-8 py-4 bg-white text-amber-600 font-semibold rounded-xl hover:bg-amber-50 transition-colors">Get a Free Demo</a>
            <a href="{{ url('/use-cases') }}" class="inline-block px-8 py-4 bg-amber-500/20 text-white font-semibold rounded-xl border border-white/30 hover:bg-amber-500/30 transition-colors">View All Use Cases</a>
        </div>
    </div>
</section>

@endsection
