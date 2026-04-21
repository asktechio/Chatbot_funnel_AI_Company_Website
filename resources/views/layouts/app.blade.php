<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5RXTQQ7N');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>@yield('title', 'AI Customer Automation — WhatsApp Chatbot for Business | EINOVATECH')</title>
    <meta name="title" content="@yield('meta_title', 'AI Customer Automation — WhatsApp Chatbot for Business | EINOVATECH')">
    <meta name="description" content="@yield('meta_description', 'Automate customer enquiries, book appointments & qualify leads 24/7 with our AI-powered WhatsApp chatbot. Book a free 15-minute demo.')">
    <meta name="keywords" content="@yield('meta_keywords', 'AI automation, WhatsApp chatbot, appointment booking, lead qualification, customer automation, EINOVATECH')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="EINOVATECH">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('og_title', 'AI Customer Automation — WhatsApp Chatbot | EINOVATECH')">
    <meta property="og:description" content="@yield('og_description', 'Automate customer enquiries, book appointments & qualify leads 24/7 with our AI-powered WhatsApp chatbot.')">
    <meta property="og:image" content="@yield('og_image', '')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@EINOVATECH">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('og_title', 'AI Customer Automation — WhatsApp Chatbot | EINOVATECH')">
    <meta name="twitter:description" content="@yield('og_description', 'Automate customer enquiries, book appointments & qualify leads 24/7.')">
    <meta name="twitter:image" content="@yield('og_image', '')">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')

    <!-- Global Organization Schema (every page) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "EINOVATECH",
        "legalName": "Einovatech Infosystems Private Limited",
        "url": "https://einovatech.com",
        "description": "AI-powered WhatsApp chatbots that automate customer enquiries, book appointments & qualify leads 24/7.",
        "foundingDate": "2024",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-92430-77840",
            "contactType": "sales",
            "availableLanguage": ["English", "Hindi"]
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "IN"
        },
        "sameAs": [
            "https://linkedin.com/company/einovatech",
            "https://twitter.com/einovatech"
        ]
    }
    </script>

    @yield('head')
</head>
<body class="font-sans antialiased bg-white text-slate-900 leading-normal">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RXTQQ7N"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded-md z-50">
        Skip to main content
    </a>

    <!-- Header & Navigation -->
    @include('components.header')

    <!-- Main Content -->
    <main id="main-content" role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    @stack('scripts')

    <!-- Calendly Widget — lazy-loaded on demand -->
    <script type="text/javascript">
        var _calendlyLoaded = false;
        function _loadCalendly(callback) {
            if (_calendlyLoaded) { callback(); return; }
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://assets.calendly.com/assets/external/widget.css';
            document.head.appendChild(link);
            var script = document.createElement('script');
            script.src = 'https://assets.calendly.com/assets/external/widget.js';
            script.onload = function() { _calendlyLoaded = true; callback(); };
            document.head.appendChild(script);
        }
        function openCalendly() {
            _loadCalendly(function() {
                Calendly.initPopupWidget({url: 'https://calendly.com/einovatech'});
            });
            return false;
        }
    </script>
</body>
</html>
