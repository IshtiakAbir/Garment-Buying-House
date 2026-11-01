<footer class="bg-navy text-cream pt-16 pb-12 border-t border-navy-light/50" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-[80rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 pb-12 border-b border-navy-light/60">
            <!-- Col 1 & 2: Brand Information -->
            <div class="lg:col-span-2 flex flex-col gap-5">
                <a href="{{ route('home') }}" class="inline-block" aria-label="Ventera Home">
                    <img src="{{ asset('images/brand/logo-light.svg') }}" alt="Ventera Logo" class="h-10 w-auto">
                </a>
                <p class="text-sm text-cream/80 leading-relaxed max-w-sm">
                    Ventera is a premier Bangladesh garment buying house. We partner with global fashion brands, retailers, and importers to deliver reliable sourcing, strict quality control, and ethical manufacturing.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <!-- LinkedIn Placeholder Icon -->
                    <a href="#" class="w-9 h-9 rounded bg-navy-light/80 hover:bg-copper text-cream hover:text-white flex items-center justify-center transition-colors" aria-label="LinkedIn">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9h2.77v8.37H6.46v-8.37M7.84 6.75a1.61 1.61 0 1 0 0 3.22 1.61 1.61 0 0 0 0-3.22Z"/>
                        </svg>
                    </a>
                    <!-- WhatsApp Placeholder Icon -->
                    <a href="https://wa.me/8801700000000" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded bg-navy-light/80 hover:bg-success text-cream hover:text-white flex items-center justify-center transition-colors" aria-label="WhatsApp">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.48-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.44.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.17-.48-.29Z"/>
                        </svg>
                    </a>
                    <!-- Email Direct Icon -->
                    <a href="mailto:contact@ventera.com" class="w-9 h-9 rounded bg-navy-light/80 hover:bg-copper text-cream hover:text-white flex items-center justify-center transition-colors" aria-label="Email Inquiry">
                        <svg class="w-4 h-4 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Col 3: Quick Links -->
            <div class="flex flex-col gap-3">
                <h3 class="text-sm font-semibold tracking-wider text-copper-light uppercase">Quick Links</h3>
                <ul class="flex flex-col gap-2.5 text-sm text-cream/75">
                    <li><a href="{{ route('home') }}" class="hover:text-copper transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-copper transition-colors">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-copper transition-colors">Sourcing Services</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-copper transition-colors">Product Categories</a></li>
                    <li><a href="{{ route('process') }}" class="hover:text-copper transition-colors">Our 8-Step Process</a></li>
                    <li><a href="{{ route('compliance') }}" class="hover:text-copper transition-colors">Compliance & Standards</a></li>
                </ul>
            </div>

            <!-- Col 4: Garment Capabilities -->
            <div class="flex flex-col gap-3">
                <h3 class="text-sm font-semibold tracking-wider text-copper-light uppercase">Capabilities</h3>
                <ul class="flex flex-col gap-2.5 text-sm text-cream/75">
                    <li><a href="{{ route('products') }}#knit" class="hover:text-copper transition-colors">Knitwear</a></li>
                    <li><a href="{{ route('products') }}#woven" class="hover:text-copper transition-colors">Woven Apparel</a></li>
                    <li><a href="{{ route('products') }}#denim" class="hover:text-copper transition-colors">Denim & Bottoms</a></li>
                    <li><a href="{{ route('products') }}#outerwear" class="hover:text-copper transition-colors">Outerwear & Jackets</a></li>
                    <li><a href="{{ route('products') }}#sportswear" class="hover:text-copper transition-colors">Sportswear & Activewear</a></li>
                    <li><a href="{{ route('products') }}#kids" class="hover:text-copper transition-colors">Kids & Babywear</a></li>
                </ul>
            </div>

            <!-- Col 5: Contact Placeholders -->
            <div class="flex flex-col gap-3">
                <h3 class="text-sm font-semibold tracking-wider text-copper-light uppercase">Dhaka Office</h3>
                <div class="flex flex-col gap-2.5 text-sm text-cream/75">
                    <p class="leading-relaxed">
                        House #00, Road #00, Sector #0, Uttara, Dhaka-1230, Bangladesh
                        <!-- [TBD]: Replace with official Ventera verified office address -->
                    </p>
                    <p class="pt-1">
                        <span class="block text-xs uppercase tracking-wider text-muted">Email</span>
                        <a href="mailto:info@ventera-sourcing.com" class="text-cream hover:text-copper transition-colors">info@ventera-sourcing.com</a>
                    </p>
                    <p>
                        <span class="block text-xs uppercase tracking-wider text-muted">Phone / WhatsApp</span>
                        <a href="tel:+8801700000000" class="text-cream hover:text-copper transition-colors">+880 1700 000000</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright & Meta Bar -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-cream/60">
            <p>&copy; {{ date('Y') }} Ventera. All rights reserved. Registered Garment Buying House, Bangladesh.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-cream transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-cream transition-colors">Terms of Service</a>
                <a href="{{ route('contact') }}" class="hover:text-copper transition-colors font-medium">Buyer Support</a>
            </div>
        </div>
    </div>
</footer>
