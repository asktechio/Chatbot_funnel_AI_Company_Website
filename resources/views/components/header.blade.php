<!-- Chatbot Funnel Header — Industry Standard Navigation -->
<header x-data="{ mobileOpen: false, useCasesOpen: false, scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 }, { passive: true })"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm' : 'bg-white'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 group relative z-20">
                <img src="/images/logos/logo-nav.png"
                     srcset="/images/logos/logo-nav.png 1x, /images/logos/logo-nav@2x.png 2x"
                     alt="HYLUMINIX Logo"
                     class="h-10 w-auto group-hover:opacity-90 transition-opacity"
                     width="160" height="40">
                <span class="text-lg font-bold tracking-wide text-slate-800 group-hover:text-blue-600 transition-colors">HYLUMINIX</span>
            </a>

            <!-- Desktop Nav — Industry Standard: Home | Use Cases ▾ | Company ▾ | CTA -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ url('/') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('/') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' }}">
                    Home
                </a>

                <!-- Use Cases Mega Dropdown -->
                <div class="relative" @mouseenter="useCasesOpen = true" @mouseleave="useCasesOpen = false">
                    <button class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors inline-flex items-center {{ request()->is('use-cases*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' }}">
                        Use Cases
                        <svg class="ml-1 w-4 h-4 transition-transform" :class="useCasesOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="useCasesOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-1/2 -translate-x-1/2 mt-1 w-[540px] bg-white rounded-xl shadow-xl border border-slate-200 p-4 z-50"
                         x-cloak>
                        <div class="grid grid-cols-2 gap-1">
                            <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🏦</span>
                                <div><div class="font-medium">Loan & Lending</div><div class="text-xs text-slate-400">Automate loan qualification</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">📊</span>
                                <div><div class="font-medium">Mutual Funds</div><div class="text-xs text-slate-400">Advisory & KYC automation</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🛡️</span>
                                <div><div class="font-medium">Insurance</div><div class="text-xs text-slate-400">Quote & claims automation</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🏥</span>
                                <div><div class="font-medium">Healthcare</div><div class="text-xs text-slate-400">Patient booking & follow-up</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🛒</span>
                                <div><div class="font-medium">E-Commerce</div><div class="text-xs text-slate-400">Order & cart recovery</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-real-estate-property') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🏠</span>
                                <div><div class="font-medium">Real Estate</div><div class="text-xs text-slate-400">Lead capture & site visits</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">🎓</span>
                                <div><div class="font-medium">Education</div><div class="text-xs text-slate-400">Enrolment & student support</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-hospitality-travel') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 transition-colors">
                                <span class="text-lg">✈️</span>
                                <div><div class="font-medium">Hospitality</div><div class="text-xs text-slate-400">Booking & concierge</div></div>
                            </a>
                        </div>
                        <div class="border-t border-slate-100 mt-2 pt-2">
                            <a href="{{ url('/use-cases') }}" class="flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                View All Use Cases
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>



                <!-- About Us -->
                <a href="{{ url('/about') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('about') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' }}">
                    About Us
                </a>

                <!-- Contact Us -->
                <a href="{{ url('/contact') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('contact') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:text-blue-600 hover:bg-slate-50' }}">
                    Contact Us
                </a>
            </nav>

            <!-- CTA + Mobile Toggle -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/#demo-qualifier') }}"
                   class="hidden sm:inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white rounded-lg bg-gradient-to-r from-teal-500 via-blue-600 to-violet-600 hover:brightness-110 shadow-md hover:shadow-lg transition-all duration-200">
                    Try It
                </a>
                <!-- Mobile menu button -->
                <button @click="mobileOpen = !mobileOpen"
                        class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                        aria-label="Toggle menu">
                    <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-white border-t border-slate-200 shadow-lg max-h-[calc(100vh-4rem)] overflow-y-auto"
         x-cloak>
        <div class="px-4 py-4 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium transition-colors {{ request()->is('/') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">Home</a>

            <!-- Mobile Use Cases -->
            <a href="{{ url('/use-cases') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium transition-colors {{ request()->is('use-cases*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">Use Cases</a>
            <div x-data="{ open: false }" class="pl-3">
                <button @click="open = !open" class="flex items-center w-full px-3 py-2 text-sm text-slate-500 hover:text-blue-600">
                    <span>Browse Industries</span>
                    <svg class="ml-auto w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="pl-3 space-y-1">
                    <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🏦 Loan Processing</a>
                    <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">📊 Mutual Funds</a>
                    <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🛡️ Insurance</a>
                    <a href="{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🏥 Healthcare</a>
                    <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🛒 E-Commerce</a>
                    <a href="{{ url('/use-cases/ai-chatbot-real-estate-property') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🏠 Real Estate</a>
                    <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">🎓 Education</a>
                    <a href="{{ url('/use-cases/ai-chatbot-hospitality-travel') }}" class="block px-3 py-1.5 text-sm text-slate-600 hover:text-blue-600">✈️ Hospitality</a>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-2 mt-2">
                <a href="{{ url('/about') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium transition-colors {{ request()->is('about') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">About Us</a>
                <a href="{{ url('/contact') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium transition-colors {{ request()->is('contact') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">Contact Us</a>
            </div>

            <div class="pt-3 border-t border-slate-100 space-y-2">
                <a href="{{ url('/#demo-qualifier') }}"
                   class="block w-full text-center px-5 py-3 text-sm font-semibold text-white rounded-lg bg-gradient-to-r from-teal-500 via-blue-600 to-violet-600 hover:brightness-110 shadow-md">
                    Try It
                </a>
                <a href="{{ url('/contact') }}"
                   class="block w-full text-center px-5 py-2.5 text-sm font-semibold text-blue-600 rounded-lg border border-blue-200 hover:bg-blue-50 transition-colors">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-16"></div>
