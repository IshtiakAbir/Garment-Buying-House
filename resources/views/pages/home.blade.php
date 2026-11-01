<x-app-layout>
    <x-slot:title>Ventera — Garment Buying House & Apparel Sourcing Partner</x-slot:title>
    <x-slot:description>Ventera connects international fashion brands and retailers with vetted Bangladesh garment manufacturers, strict QA, and transparent sourcing.</x-slot:description>

    {{-- =========================================================================
         1. HERO SECTION (Full Screen with Dark Navy Gradient + Video Architecture)
         ========================================================================= --}}
    <section class="relative min-h-[92vh] flex items-center justify-center bg-navy text-white overflow-hidden py-20 px-4 sm:px-6 lg:px-8"
             x-data="{ 
                 videoPlaying: true,
                 toggleVideo() {
                     const video = this.$refs.heroVideo;
                     if (!video) return;
                     if (video.paused) {
                         video.play();
                         this.videoPlaying = true;
                     } else {
                         video.pause();
                         this.videoPlaying = false;
                     }
                 }
             }">
        <!-- Video Background Architecture (Controlled via config; fallback CSS poster gradient) -->
        <div class="absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
            {{-- [TBD]: Once real 10s hero video (fabric -> cutting -> sewing -> packing) is produced, enable config('ventera.hero_video_enabled') --}}
            @if(config('ventera.hero_video_enabled', false))
                <video x-ref="heroVideo" 
                       autoplay muted loop playsinline preload="metadata" 
                       class="absolute inset-0 w-full h-full object-cover">
                    <source src="{{ asset('videos/hero.webm') }}" type="video/webm">
                    <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
                </video>
            @else
                <!-- High-Fidelity Editorial CSS Fallback Poster with Luxury Fabric Texture Simulation -->
                <div class="absolute inset-0 bg-gradient-to-br from-navy-dark via-navy to-navy-light opacity-95"></div>
                <div class="absolute inset-0 bg-[radial-gradient(#C0673B_1px,transparent_1px)] [background-size:32px_32px] opacity-10"></div>
            @endif

            <!-- Dark Gradient Vignette for Readability (WCAG AA Compliance) -->
            <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/70 to-navy/50"></div>
        </div>

        <!-- Hero Content Box -->
        <div class="relative z-10 max-w-4xl mx-auto text-center flex flex-col items-center pt-8 pb-12 reveal-item">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-light/80 border border-copper/30 text-xs sm:text-sm font-semibold uppercase tracking-widest text-copper-light mb-6 backdrop-blur-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-copper animate-pulse"></span>
                International Garment Sourcing Partner · Bangladesh
            </span>

            <h1 class="font-serif text-3xl sm:text-5xl md:text-6xl lg:text-[4.25rem] font-bold tracking-tight text-white leading-[1.12] mb-6">
                From Concept to Container. <br class="hidden sm:inline">
                <span class="text-cream italic font-normal">Trusted Apparel Sourcing.</span>
            </h1>

            <p class="text-base sm:text-lg md:text-xl text-cream/85 font-normal max-w-2xl leading-relaxed mb-10">
                Ventera helps global fashion brands, retailers, and importers manufacture high-quality knitwear, woven garments, and denim with verified factory partners, clear pricing, and strict QA.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 justify-center w-full sm:w-auto">
                <x-button href="{{ route('contact') }}" variant="primary" size="lg" class="w-full sm:w-auto">
                    Request a Quote
                </x-button>
                <x-button href="#services" variant="outline" size="lg" class="w-full sm:w-auto border-cream/30 text-cream hover:bg-cream hover:text-navy">
                    Explore Sourcing Services
                </x-button>
            </div>
        </div>

        <!-- Video Play/Pause Control (Accessibility requirement) -->
        @if(config('ventera.hero_video_enabled', false))
            <button type="button" 
                    @click="toggleVideo()" 
                    class="absolute bottom-6 right-6 z-20 p-2.5 rounded-full bg-navy/80 hover:bg-copper text-white/80 hover:text-white border border-navy-light backdrop-blur-sm transition-colors"
                    :aria-label="videoPlaying ? 'Pause background video' : 'Play background video'">
                <svg x-show="videoPlaying" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                </svg>
                <svg x-show="!videoPlaying" x-cloak class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </button>
        @endif

        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 hidden sm:flex flex-col items-center gap-2 opacity-70 hover:opacity-100 transition-opacity">
            <span class="text-[10px] uppercase tracking-widest text-cream/70 font-semibold">Scroll</span>
            <svg class="w-4 h-4 text-copper animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </section>

    {{-- =========================================================================
         2. TRUST STRIP (Serving buyers text only; No unverified logos)
         ========================================================================= --}}
    <section class="bg-cream-light border-y border-muted-light/60 py-6 sm:py-8" aria-label="Global markets served">
        <div class="max-w-[80rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-8 text-center">
                <span class="text-xs font-semibold uppercase tracking-widest text-muted">Global Sourcing Desk</span>
                <span class="hidden sm:inline text-copper font-serif font-bold">•</span>
                <p class="text-sm sm:text-base font-serif font-medium text-navy tracking-wide">
                    Serving Buyers in Europe &nbsp;·&nbsp; United States &nbsp;·&nbsp; United Kingdom &nbsp;·&nbsp; Canada
                </p>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         3. ABOUT SUMMARY
         ========================================================================= --}}
    <x-section id="about" background="white" spacing="normal">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left Editorial Text -->
            <div class="lg:col-span-7 flex flex-col items-start reveal-item">
                <span class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-copper mb-3">
                    About Ventera
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-bold text-navy tracking-tight leading-snug mb-6">
                    A Dependable Buying House Connecting Global Retailers With Bangladesh’s Finest Apparel Mills.
                </h2>
                <div class="space-y-4 text-muted text-base leading-relaxed mb-8">
                    <p>
                        Ventera is a Bangladesh-based garment buying house. We help international fashion brands, retailers, and importers turn design ideas into finished products, with trusted factory partners, clear pricing, and strict quality control.
                    </p>
                    <p>
                        Our mission is to deliver value-driven sourcing through strong supplier relationships, rigorous technical supervision, and transparent customer-first service from yarn selection to vessel loading.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <x-button href="{{ route('about') }}" variant="primary" size="md">
                        Learn More About Us
                    </x-button>
                    <x-button href="{{ route('process') }}" variant="light" size="md">
                        View Sourcing Workflow
                    </x-button>
                </div>
            </div>

            <!-- Right Image Placeholder Frame -->
            <div class="lg:col-span-5 reveal-item">
                <div class="relative rounded-[0.5rem] bg-cream border border-muted-light overflow-hidden p-3 shadow-card">
                    <div class="aspect-[4/5] rounded-[0.375rem] bg-gradient-to-br from-navy via-navy-light to-copper/30 flex flex-col justify-end p-8 text-white relative">
                        <div class="absolute inset-0 bg-navy/30 backdrop-blur-[1px]"></div>
                        <div class="relative z-10">
                            <span class="text-xs font-semibold uppercase tracking-widest text-copper-light mb-2 block">
                                Technical Precision
                            </span>
                            <p class="font-serif text-xl font-bold leading-tight mb-2">
                                Daily In-Line Inspections & Pre-Production Pilot Runs
                            </p>
                            <p class="text-xs text-cream/75">
                                Factory coordination desk, Dhaka, Bangladesh
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-section>

    {{-- =========================================================================
         4. KEY NUMBERS (Animated Counters with [TBD] Obvious Placeholders)
         ========================================================================= --}}
    <x-section background="navy" spacing="sm" class="border-y border-navy-light/50">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-6 divide-y sm:divide-y-0 sm:divide-x divide-navy-light/50">
            <!-- Stat 1: Years experience [TBD placeholder] -->
            <x-stat 
                number="12" 
                suffix="+" 
                label="Years Industry Experience" 
                comment="[TBD: replace with verified founding/leadership years]"
                :inverted="true" 
            />

            <!-- Stat 2: Partner factories [TBD placeholder] -->
            <x-stat 
                number="25" 
                suffix="+" 
                label="Compliant Partner Factories" 
                comment="[TBD: replace with verified partner mill count]"
                :inverted="true" 
            />

            <!-- Stat 3: Product Categories -->
            <x-stat 
                number="7" 
                suffix="" 
                label="Core Garment Categories" 
                comment="[Verified: Knit, Woven, Denim, Outerwear, Sportswear, Workwear, Kids]"
                :inverted="true" 
            />

            <!-- Stat 4: Target Export Regions -->
            <x-stat 
                number="4" 
                suffix="" 
                label="Primary Buyer Continents & Regions" 
                comment="[Verified: Europe, USA, UK, Canada]"
                :inverted="true" 
            />
        </div>
    </x-section>

    {{-- =========================================================================
         5. SERVICES (5 Icon Cards from Content Bank)
         ========================================================================= --}}
    <x-section id="services" background="cream" spacing="normal">
        <x-section-title 
            eyebrow="What We Do"
            heading="End-to-End Sourcing & Manufacturing Solutions"
            intro="We take full ownership of the production journey, protecting your brand reputation with meticulous on-the-ground management in Bangladesh."
            align="center"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- 1. Product Development -->
            <x-icon-card 
                title="Product Development"
                text="Trend and design adaptation, comprehensive fabric and trim sourcing, proto sample development, fit alterations, and pre-production (PP) approvals."
                link="{{ route('services') }}#development"
            >
                <x-slot:icon>
                    <!-- Drafting Compass / Ruler Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>

            <!-- 2. Sourcing & Merchandising -->
            <x-icon-card 
                title="Sourcing & Merchandising"
                text="Strategic factory matching based on machinery and capacity, direct cost negotiations, open-cost BOM breakdowns, and transparent order tracking."
                link="{{ route('services') }}#sourcing"
            >
                <x-slot:icon>
                    <!-- Factory / Network Sourcing Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>

            <!-- 3. Production Management -->
            <x-icon-card 
                title="Production Management"
                text="Disciplined Time & Action (T&A) calendar controls, daily sewing line inspections, bottlenecks prevention, and accurate WIP milestone reporting."
                link="{{ route('services') }}#production"
            >
                <x-slot:icon>
                    <!-- Calendar / T&A Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.253M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>

            <!-- 4. Quality Assurance -->
            <x-icon-card 
                title="Quality Assurance & AQL"
                text="Pre-production audits, in-line quality checkpoints, initial cutting approvals, and final random inspections adhering strictly to AQL 1.5/2.5 standards."
                link="{{ route('services') }}#quality"
            >
                <x-slot:icon>
                    <!-- Shield / QA Check Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>

            <!-- 5. Lab Testing & Compliance -->
            <x-icon-card 
                title="Lab & Compliance Testing"
                text="Material testing through accredited labs (SGS, Intertek, Bureau Veritas): colorfastness, shrinkage, tensile strength, and eco-chemical safety."
                link="{{ route('services') }}#testing"
            >
                <x-slot:icon>
                    <!-- Flask / Beaker Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.942A4.5 4.5 0 0115.89 16.5H8.11a4.5 4.5 0 01-2.34-.658L4.2 14.9" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>

            <!-- Bonus 6th Box for 3x2 Grid Balance: Dedicated Buyer Support -->
            <x-icon-card 
                title="Export Logistics & Support"
                text="Packing list verification, carton drop tests, export customs clearance in Chittagong port, and prompt documentation delivery to your consignee bank."
                link="{{ route('services') }}"
            >
                <x-slot:icon>
                    <!-- Globe / Shipping Box Icon -->
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.25h1.5a1.5 1.5 0 011.5 1.5v3.75m-3-5.25H9.75M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V14.25" />
                    </svg>
                </x-slot:icon>
            </x-icon-card>
        </div>
    </x-section>

    {{-- =========================================================================
         6. PRODUCT CATEGORIES (7 Image Cards with Placeholder Gradients)
         ========================================================================= --}}
    <x-section id="products" background="white" spacing="normal">
        <x-section-title 
            eyebrow="Our Apparel Range"
            heading="Specialized Manufacturing Capabilities"
            intro="Explore our manufacturing categories tailored for retail fashion, private labels, and promotional apparel."
            align="center"
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- 1. Knitwear -->
            <x-card 
                title="Knitwear"
                text="T-shirts, polo shirts, henleys, hoodies, sweatshirts, and blended cotton fleece essentials."
                badge="High Volume"
                gradient="from-navy via-navy-light to-copper/40"
                link="{{ route('products') }}#knit"
            />

            <!-- 2. Woven Apparel -->
            <x-card 
                title="Woven Apparel"
                text="Casual button-downs, formal business shirts, lightweight poplin dresses, and tailored trousers."
                badge="Tailored"
                gradient="from-navy-dark via-navy to-charcoal"
                link="{{ route('products') }}#woven"
            />

            <!-- 3. Denim & Bottoms -->
            <x-card 
                title="Denim & Bottoms"
                text="Vintage wash jeans, stretch denim, chino pants, cargo trousers, and garment-dyed twills."
                badge="Specialty Wash"
                gradient="from-navy via-navy-soft to-copper/30"
                link="{{ route('products') }}#denim"
            />

            <!-- 4. Outerwear -->
            <x-card 
                title="Outerwear"
                text="Quilted puffers, water-repellent windbreakers, bomber jackets, softshell vests, and sherpa coats."
                badge="Performance"
                gradient="from-charcoal via-navy to-navy-dark"
                link="{{ route('products') }}#outerwear"
            />

            <!-- 5. Sportswear -->
            <x-card 
                title="Sportswear"
                text="Moisture-wicking activewear tees, compression leggings, athletic shorts, and seamless tracksuits."
                badge="Active"
                gradient="from-navy via-copper/40 to-navy-light"
                link="{{ route('products') }}#sportswear"
            />

            <!-- 6. Workwear -->
            <x-card 
                title="Workwear"
                text="High-durability coveralls, industrial pants, EN ISO reflective safety vests, and chef uniforms."
                badge="Industrial"
                gradient="from-navy-dark via-charcoal to-copper/50"
                link="{{ route('products') }}#workwear"
            />

            <!-- 7. Kids & Babywear -->
            <x-card 
                title="Kids & Babywear"
                text="GOTS-standard organic cotton baby bodysuits, rompers, pyjama sets, and comfortable playwear."
                badge="OEKO-TEX Ready"
                gradient="from-cream-dark via-navy-soft to-navy"
                link="{{ route('products') }}#kids"
            />

            <!-- 8. Custom Developments Promo Card -->
            <div class="relative flex flex-col justify-between p-7 rounded-[0.375rem] bg-navy text-white border border-copper/30 shadow-card reveal-item">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-widest text-copper-light mb-2 block">
                        Custom Tech Packs
                    </span>
                    <h3 class="font-serif text-2xl font-bold mb-3 text-white">
                        Have a Custom Apparel Concept?
                    </h3>
                    <p class="text-sm text-cream/80 leading-relaxed mb-6">
                        Send your tech pack or reference sample. Our merchandising team will respond with a preliminary costing within 24 hours.
                    </p>
                </div>
                <x-button href="{{ route('contact') }}" variant="primary" size="md" class="w-full text-center">
                    Request Fast Quote
                </x-button>
            </div>
        </div>
    </x-section>

    {{-- =========================================================================
         7. HOW WE WORK (6-Step Timeline)
         ========================================================================= --}}
    <x-section id="process" background="cream" spacing="normal">
        <x-section-title 
            eyebrow="Our Methodology"
            heading="The 6-Step Sourcing Workflow"
            intro="A structured, transparent roadmap from initial tech pack evaluation to final warehouse delivery."
            align="center"
        />

        <div class="max-w-3xl mx-auto">
            <!-- Step 1 -->
            <x-step 
                number="01" 
                title="Inquiry & Tech Pack Analysis"
                text="We evaluate fabric composition, GSM, target price points, order volume, and delivery schedules to identify the ideal certified manufacturing mill."
            />

            <!-- Step 2 -->
            <x-step 
                number="02" 
                title="Costing & Rapid Prototyping"
                text="Detailed open-cost quotation followed by fit, proto, and salesman samples created with exact trims and approved lab dips."
            />

            <!-- Step 3 -->
            <x-step 
                number="03" 
                title="Pre-Production Meeting (PPM)"
                text="A mandatory pre-production review with factory floor managers, technical heads, and QC supervisors prior to fabric bulk cutting."
            />

            <!-- Step 4 -->
            <x-step 
                number="04" 
                title="Controlled Bulk Production"
                text="Fabric inspection using the 4-Point System. Continuous in-line monitoring during cutting, sewing, washing, and finishing with daily milestone updates."
            />

            <!-- Step 5 -->
            <x-step 
                number="05" 
                title="Final AQL Inspection"
                text="Full audit according to internationally recognized ANSI/ASQ Z1.4 (AQL 2.5/1.5) guidelines before authorizing carton sealing and container dispatch."
            />

            <!-- Step 6 (Last) -->
            <x-step 
                number="06" 
                title="Port Dispatch & Export Documentation"
                text="Container stuffing supervision, transport to Chittagong port, bill of lading issuance, and clean banking paperwork dispatched directly to you."
                :isLast="true"
            />
        </div>
    </x-section>

    {{-- =========================================================================
         8. WHY VENTERA (6 Benefit Blocks from Plan Section 7)
         ========================================================================= --}}
    <x-section background="white" spacing="normal">
        <x-section-title 
            eyebrow="Why Ventera"
            heading="Why International Buyers Choose Our Desk"
            intro="We blend local Bangladeshi manufacturing power with European business communication and uncompromising standards."
            align="center"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">01. Sourcing Excellence</span>
                <p class="text-sm text-muted leading-relaxed">
                    Direct access to specialized, audit-approved production facilities matched precisely to your garment category and volume requirements.
                </p>
            </div>

            <!-- Benefit 2 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">02. Strict Quality Control</span>
                <p class="text-sm text-muted leading-relaxed">
                    Multi-tier in-line and final AQL 2.5 inspections conducted by our in-house quality assurance team — never left solely to factory self-audits.
                </p>
            </div>

            <!-- Benefit 3 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">03. Transparent Costing</span>
                <p class="text-sm text-muted leading-relaxed">
                    Competitive, open-book cost sheets with clear fabric, trim, and labor breakdowns so you can optimize collections without surprise fees.
                </p>
            </div>

            <!-- Benefit 4 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">04. Time & Action (T&A) Control</span>
                <p class="text-sm text-muted leading-relaxed">
                    Granular production calendar management with weekly visual WIP reports to ensure critical vessel shipping dates are met without delay.
                </p>
            </div>

            <!-- Benefit 5 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">05. Controlled Cutting Protocol</span>
                <p class="text-sm text-muted leading-relaxed">
                    Zero fabric cutting without signed pilot sample approval, fabric shrinkage tests, and pre-production meeting compliance.
                </p>
            </div>

            <!-- Benefit 6 -->
            <div class="flex flex-col p-6 rounded-[0.375rem] border border-muted-light/70 bg-cream-light/40 reveal-item">
                <span class="text-copper font-serif font-bold text-lg mb-2">06. Responsive Support</span>
                <p class="text-sm text-muted leading-relaxed">
                    Fluent English merchandising team accessible via WhatsApp and email with rapid turnaround on technical queries and sample updates.
                </p>
            </div>
        </div>
    </x-section>

    {{-- =========================================================================
         9. COMPLIANCE & SUSTAINABILITY (Text Block Only; No Unverified Logos)
         ========================================================================= --}}
    <x-section id="compliance" background="cream" spacing="sm">
        <div class="max-w-4xl mx-auto text-center flex flex-col items-center reveal-item">
            <span class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-copper mb-3">
                Factory Standards & Ethical Sourcing
            </span>
            <h2 class="font-serif text-2xl sm:text-3xl font-bold text-navy mb-4">
                Verified Social & Environmental Compliance
            </h2>
            <p class="text-sm sm:text-base text-muted leading-relaxed mb-6 max-w-2xl">
                We believe in ethical fashion manufacturing. Ventera works exclusively with partner mills that maintain verified social compliance, fair living wages, safe working environments, and responsible effluent treatment. Real certificate documentation (BSCI, OEKO-TEX, SEDEX) is verified order-by-order.
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ route('compliance') }}" class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-copper hover:text-copper-dark transition-colors inline-flex items-center gap-1.5">
                    <span>Read our full compliance framework</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </x-section>

    {{-- =========================================================================
         10. CALL TO ACTION BANNER
         ========================================================================= --}}
    <x-section background="white" spacing="normal">
        <x-cta-banner 
            headline="Ready to Manufacture Your Next Apparel Collection?"
            subline="Send us your tech pack or style reference for immediate review and competitive fabric costing from Dhaka."
            buttonText="Request a Quote"
            buttonLink="{{ route('contact') }}"
            secondaryText="Our Sourcing Process"
            secondaryLink="{{ route('process') }}"
        />
    </x-section>
</x-app-layout>
