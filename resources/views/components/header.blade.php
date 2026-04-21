<!-- Premium Dark Header — EINOVATECH -->
<header x-data="{ mobileOpen: false, useCasesOpen: false, scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 }, { passive: true })"
        :class="scrolled ? 'header-brand-scrolled' : 'header-brand'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 group relative z-20">
                <span class="w-2 h-2 rounded-full bg-cyan-accent opacity-80 group-hover:opacity-100 transition-opacity" style="box-shadow: 0 0 8px rgba(0,212,255,0.6);"></span>
                <span class="text-lg font-bold tracking-widest text-white group-hover:text-cyan-accent transition-colors font-heading">EINOVATECH</span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ url('/') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('/') ? 'text-cyan-accent' : '' }}">
                    Home
                </a>

                <!-- Use Cases Mega Dropdown -->
                <div class="relative" @mouseenter="useCasesOpen = true" @mouseleave="useCasesOpen = false">
                    <button class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors inline-flex items-center {{ request()->is('use-cases*') ? 'text-cyan-accent' : '' }}">
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
                         class="dropdown-brand absolute left-1/2 -translate-x-1/2 mt-1 w-[540px] p-4 z-50"
                         x-cloak>
                        <div class="grid grid-cols-2 gap-1">
                            <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="dropdown-item-brand">
                                <span class="text-lg">🏦</span>
                                <div><div class="font-medium text-white">Loan &amp; Lending</div><div class="text-xs text-slate-500">Automate loan qualification</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="dropdown-item-brand">
                                <span class="text-lg">📊</span>
                                <div><div class="font-medium text-white">Mutual Funds</div><div class="text-xs text-slate-500">Advisory &amp; KYC automation</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="dropdown-item-brand">
                                <span class="text-lg">🛡️</span>
                                <div><div class="font-medium text-white">Insurance</div><div class="text-xs text-slate-500">Quote &amp; claims automation</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}" class="dropdown-item-brand">
                                <span class="text-lg">🏥</span>
                                <div><div class="font-medium text-white">Healthcare</div><div class="text-xs text-slate-500">Patient booking &amp; follow-up</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="dropdown-item-brand">
                                <span class="text-lg">🛒</span>
                                <div><div class="font-medium text-white">E-Commerce</div><div class="text-xs text-slate-500">Order &amp; cart recovery</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-real-estate-property') }}" class="dropdown-item-brand">
                                <span class="text-lg">🏠</span>
                                <div><div class="font-medium text-white">Real Estate</div><div class="text-xs text-slate-500">Lead capture &amp; site visits</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="dropdown-item-brand">
                                <span class="text-lg">🎓</span>
                                <div><div class="font-medium text-white">Education</div><div class="text-xs text-slate-500">Enrolment &amp; student support</div></div>
                            </a>
                            <a href="{{ url('/use-cases/ai-chatbot-hospitality-travel') }}" class="dropdown-item-brand">
                                <span class="text-lg">✈️</span>
                                <div><div class="font-medium text-white">Hospitality</div><div class="text-xs text-slate-500">Booking &amp; concierge</div></div>
                            </a>
                        </div>
                        <div class="mt-2 pt-2" style="border-top: 1px solid rgba(0,212,255,0.1)">
                            <a href="{{ url('/use-cases') }}" class="flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-cyan-accent hover:bg-cyan-accent/10 rounded-lg transition-colors">
                                View All Use Cases
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/about') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('about') ? 'text-cyan-accent' : '' }}">
                    About Us
                </a>

                <a href="{{ url('/contact') }}"
                   class="nav-link-brand px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('contact') ? 'text-cyan-accent' : '' }}">
                    Contact Us
                </a>
            </nav>

            <!-- CTA + Mobile Toggle -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/#demo-qualifier') }}"
                   class="hidden sm:inline-flex items-center px-5 py-2.5 text-sm font-bold rounded-lg transition-all duration-300"
                   style="background: linear-gradient(135deg, #00D4FF 0%, #0082A8 100%); color: #0A2540; box-shadow: 0 4px 16px rgba(0,212,255,0.3);">
                    Book a Demo
                </a>
                <button @click="mobileOpen = !mobileOpen"
                        class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-accent transition-colors"
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
         class="lg:hidden max-h-[calc(100vh-4rem)] overflow-y-auto"
         style="background: rgba(7,15,26,0.98); border-top: 1px solid rgba(0,212,255,0.1);"
         x-cloak>
        <div class="px-4 py-4 space-y-1">
            <a href="{{ url('/') }}" class="mobile-nav-item-brand {{ request()->is('/') ? 'text-cyan-accent' : '' }}">Home</a>

            <a href="{{ url('/use-cases') }}" class="mobile-nav-item-brand {{ request()->is('use-cases*') ? 'text-cyan-accent' : '' }}">Use Cases</a>
            <div x-data="{ open: false }" class="pl-3">
                <button @click="open = !open" class="flex items-center w-full px-3 py-2 text-sm text-slate-500 hover:text-cyan-accent transition-colors">
                    <span>Browse Industries</span>
                    <svg class="ml-auto w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="pl-3 space-y-1">
                    <a href="{{ url('/use-cases/ai-chatbot-loan-processing-lending') }}" class="mobile-sub-item">🏦 Loan Processing</a>
                    <a href="{{ url('/use-cases/ai-chatbot-mutual-fund-advisory') }}" class="mobile-sub-item">📊 Mutual Funds</a>
                    <a href="{{ url('/use-cases/ai-chatbot-insurance-distribution') }}" class="mobile-sub-item">🛡️ Insurance</a>
                    <a href="{{ url('/use-cases/ai-chatbot-healthcare-patient-engagement') }}" class="mobile-sub-item">🏥 Healthcare</a>
                    <a href="{{ url('/use-cases/ai-chatbot-ecommerce-retail') }}" class="mobile-sub-item">🛒 E-Commerce</a>
                    <a href="{{ url('/use-cases/ai-chatbot-real-estate-property') }}" class="mobile-sub-item">🏠 Real Estate</a>
                    <a href="{{ url('/use-cases/ai-chatbot-education-edtech') }}" class="mobile-sub-item">🎓 Education</a>
                    <a href="{{ url('/use-cases/ai-chatbot-hospitality-travel') }}" class="mobile-sub-item">✈️ Hospitality</a>
                </div>
            </div>

            <div class="pt-2 mt-2" style="border-top: 1px solid rgba(0,212,255,0.08)">
                <a href="{{ url('/about') }}" class="mobile-nav-item-brand {{ request()->is('about') ? 'text-cyan-accent' : '' }}">About Us</a>
                <a href="{{ url('/contact') }}" class="mobile-nav-item-brand {{ request()->is('contact') ? 'text-cyan-accent' : '' }}">Contact Us</a>
            </div>

            <div class="pt-3 space-y-2" style="border-top: 1px solid rgba(0,212,255,0.08)">
                <a href="{{ url('/#demo-qualifier') }}"
                   class="block w-full text-center px-5 py-3 text-sm font-bold rounded-xl transition-all duration-300"
                   style="background: linear-gradient(135deg, #00D4FF 0%, #0082A8 100%); color: #0A2540; box-shadow: 0 4px 16px rgba(0,212,255,0.3);">
                    Book a Demo
                </a>
                <a href="{{ url('/contact') }}"
                   class="block w-full text-center px-5 py-2.5 text-sm font-semibold rounded-xl transition-colors"
                   style="border: 1px solid rgba(0,212,255,0.3); color: #00D4FF; background: rgba(0,212,255,0.05);">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-16"></div>
