import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import intersect from '@alpinejs/intersect'

// Register Alpine.js plugins
Alpine.plugin(collapse)
Alpine.plugin(intersect)

// Make Alpine available on the window for debugging
window.Alpine = Alpine
window.__deployTs = '202603031341';

// Alpine.js global configuration
Alpine.prefix('x-')

// Global Alpine.js stores and utilities
document.addEventListener('alpine:init', () => {
    // Global theme store
    Alpine.store('theme', {
        current: 'light',
        toggle() {
            this.current = this.current === 'light' ? 'dark' : 'light'
            document.documentElement.classList.toggle('dark', this.current === 'dark')
            localStorage.setItem('theme', this.current)
        },
        init() {
            const saved = localStorage.getItem('theme')
            if (saved) {
                this.current = saved
            } else {
                this.current = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }
            document.documentElement.classList.toggle('dark', this.current === 'dark')
        }
    })

    // Global navigation store
    Alpine.store('nav', {
        mobileMenuOpen: false,
        searchOpen: false,
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen
            document.body.style.overflow = this.mobileMenuOpen ? 'hidden' : ''
        },
        closeMobileMenu() {
            this.mobileMenuOpen = false
            document.body.style.overflow = ''
        },
        toggleSearch() {
            this.searchOpen = !this.searchOpen
        }
    })

    // Global analytics store
    Alpine.store('analytics', {
        track(event, properties = {}) {
            // Google Analytics tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', event, properties)
            }
            
            // Facebook Pixel tracking
            if (typeof fbq !== 'undefined') {
                fbq('track', event, properties)
            }
            
            // LinkedIn Insight tracking
            if (typeof lintrk !== 'undefined') {
                lintrk('track', { conversion_id: event })
            }
        },
        
        trackButtonClick(element) {
            const analytics = element.getAttribute('data-analytics')
            if (analytics) {
                this.track('button_click', {
                    button_id: analytics,
                    page_url: window.location.href,
                    page_title: document.title
                })
            }
        }
    })
})

// Global utilities
window.utils = {
    // Smooth scroll to element
    scrollToElement(selector, offset = 0) {
        const element = document.querySelector(selector)
        if (element) {
            const elementPosition = element.getBoundingClientRect().top + window.pageYOffset - offset
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            })
        }
    },

    // Debounce function for search and input handlers
    debounce(func, wait, immediate) {
        let timeout
        return function executedFunction(...args) {
            const later = () => {
                timeout = null
                if (!immediate) func(...args)
            }
            const callNow = immediate && !timeout
            clearTimeout(timeout)
            timeout = setTimeout(later, wait)
            if (callNow) func(...args)
        }
    },

    // Format phone number
    formatPhone(phone) {
        const cleaned = ('' + phone).replace(/\D/g, '')
        const match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/)
        if (match) {
            return '(' + match[1] + ') ' + match[2] + '-' + match[3]
        }
        return phone
    },

    // Validate email
    validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        return re.test(email)
    }
}

import './geo-locale';
// Initialize Alpine
Alpine.start()

// Global event listeners
document.addEventListener('DOMContentLoaded', () => {
    // Initialize theme
    Alpine.store('theme').init()
    
    // Global smooth scrolling for anchor links (single source — remove duplicates from blade files)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href')
            if (href !== '#' && href.length > 1) {
                e.preventDefault()
                const target = document.querySelector(href)
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    })
                }
            }
        })
    })
    
    // Track analytics on button clicks
    document.addEventListener('click', (event) => {
        if (event.target.matches('button[data-analytics], a[data-analytics]')) {
            Alpine.store('analytics').trackButtonClick(event.target)
        }
    })
    
    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) { // lg breakpoint
            Alpine.store('nav').closeMobileMenu()
        }
    })
    
    // Handle scroll events for header transparency
    let lastScrollY = window.scrollY
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header[x-data]')
        if (header) {
            const scrolled = window.scrollY > 10
            header.classList.toggle('scrolled', scrolled)
        }
    }, { passive: true })
})
