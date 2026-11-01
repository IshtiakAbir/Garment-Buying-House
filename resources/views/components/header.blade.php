@props([
    'active' => null
])

<header 
    id="site-header"
    x-data="{ 
        scrolled: false, 
        mobileOpen: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 20;
            }, { passive: true });
        },
        toggleMobile() {
            this.mobileOpen = !this.mobileOpen;
            if (this.mobileOpen) {
                document.body.style.overflow = 'hidden';
                this.$nextTick(() => {
                    this.$refs.firstMobileLink && this.$refs.firstMobileLink.focus();
                });
            } else {
                document.body.style.overflow = '';
                this.$refs.menuButton && this.$refs.menuButton.focus();
            }
        },
        closeMobile() {
            if (this.mobileOpen) {
                this.mobileOpen = false;
                document.body.style.overflow = '';
                this.$refs.menuButton && this.$refs.menuButton.focus();
            }
        }
    }"
    @keydown.escape.window="closeMobile()"
    :class="{ 
        'py-3.5 bg-white/95 backdrop-blur-md shadow-header border-b border-muted-light/60': scrolled, 
        'py-5 bg-white border-b border-transparent': !scrolled 
    }"
    class="sticky top-0 z-40 w-full transition-all duration-300 ease-in-out"
>
    <div class="max-w-[80rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group focus:outline-none" aria-label="Ventera Home">
                <img src="{{ asset('images/brand/logo.svg') }}" 
                     alt="Ventera Logo" 
                     class="h-9 md:h-10 w-auto transition-transform duration-200 group-hover:scale-[1.02]">
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-7" aria-label="Main Navigation">
                <a href="{{ route('home') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('home') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('about') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    About
                </a>
                <a href="{{ route('services') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('services*') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Services
                </a>
                <a href="{{ route('products') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('products*') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Products
                </a>
                <a href="{{ route('process') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('process') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Process
                </a>
                <a href="{{ route('compliance') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('compliance') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Compliance
                </a>
                <a href="{{ route('contact') }}" 
                   class="text-sm font-medium tracking-wide transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-copper font-semibold' : 'text-charcoal hover:text-copper' }}">
                    Contact
                </a>
            </nav>

            <!-- Header Action Button (Desktop) -->
            <div class="hidden lg:flex items-center gap-4">
                <x-button href="{{ route('contact') }}" variant="primary" size="md">
                    Request a Quote
                </x-button>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center gap-3 lg:hidden">
                <x-button href="{{ route('contact') }}" variant="primary" size="md" class="py-1.5 px-3.5 text-xs sm:text-sm">
                    Quote
                </x-button>

                <button 
                    type="button" 
                    x-ref="menuButton"
                    @click="toggleMobile()" 
                    class="p-2 rounded text-charcoal hover:text-copper hover:bg-cream-light focus:outline-none focus:ring-2 focus:ring-copper"
                    :aria-expanded="mobileOpen ? 'true' : 'false'"
                    aria-controls="mobile-menu"
                    aria-label="Toggle navigation menu"
                >
                    <!-- Icon when menu is closed -->
                    <svg x-show="!mobileOpen" class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Slide-In Fullscreen Overlay Menu -->
    <div 
        id="mobile-menu"
        x-show="mobileOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full"
        class="fixed inset-0 z-50 bg-navy text-white lg:hidden flex flex-col justify-between p-6 sm:p-8"
        role="dialog"
        aria-modal="true"
        aria-label="Mobile Navigation"
    >
        <!-- Top bar inside mobile overlay -->
        <div class="flex items-center justify-between pb-6 border-b border-navy-light">
            <a href="{{ route('home') }}" @click="closeMobile()" class="flex items-center gap-2">
                <img src="{{ asset('images/brand/logo-light.svg') }}" alt="Ventera Logo" class="h-8 w-auto">
            </a>
            <button 
                type="button" 
                @click="closeMobile()" 
                class="p-2 rounded text-cream hover:text-white hover:bg-navy-light focus:outline-none focus:ring-2 focus:ring-copper"
                aria-label="Close menu"
            >
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Links List -->
        <nav class="flex flex-col gap-4 py-8 overflow-y-auto">
            <a href="{{ route('home') }}" 
               x-ref="firstMobileLink"
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('home') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Home
            </a>
            <a href="{{ route('about') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('about') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                About
            </a>
            <a href="{{ route('services') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('services*') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Services
            </a>
            <a href="{{ route('products') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('products*') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Products
            </a>
            <a href="{{ route('process') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('process') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Our Process
            </a>
            <a href="{{ route('compliance') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('compliance') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Compliance
            </a>
            <a href="{{ route('contact') }}" 
               @click="closeMobile()" 
               class="text-2xl font-serif tracking-wide transition-colors py-1 {{ request()->routeIs('contact') ? 'text-copper font-semibold' : 'text-white hover:text-copper-light' }}">
                Contact & Inquiries
            </a>
        </nav>

        <!-- Bottom Action in Mobile Overlay -->
        <div class="pt-6 border-t border-navy-light flex flex-col gap-3">
            <x-button href="{{ route('contact') }}" variant="primary" size="lg" class="w-full text-center justify-center">
                Request a Quote
            </x-button>
            <p class="text-xs text-muted text-center">
                Direct Buyer Desk: <span class="text-cream">Dhaka, Bangladesh</span>
            </p>
        </div>
    </div>
</header>
