# Project Tasks — Ventera

## Phase 0: Discovery & Brand Assets
- [ ] **T-01**: Collect Ventera official logo (SVG/PNG) and brand colors.
- [ ] **T-02**: Collect verified company credentials, address, contact info, and legal facts.
- [ ] **T-03**: Gather initial media assets (factory photos, product samples, hero video clips).
- [ ] **T-04**: Verify Hostinger hosting plan requirements (PHP 8.3+, SSH, Composer, MySQL, SSL).

## Phase 1: Design & Style Guide
- [ ] **T-05**: Define color palette (Midnight navy `#0B1F33`, Warm sand `#F5F0E8`, Copper `#C0673B`) and typography.
- [ ] **T-06**: Create wireframes/specifications for Home page and navigation.
- [ ] **T-07**: Create wireframes/specifications for Services, Products, and Contact pages.
- [ ] **T-08**: Define hero video storyboard and generate/optimize fallback poster image.

## Phase 2: Setup & Baseline
- [ ] **T-09**: Initialize Laravel project with PHP 8.3+ and Git version control.
- [ ] **T-10**: Configure Tailwind CSS, Vite bundling, and font imports (Playfair Display / Inter).
- [ ] **T-11**: Set up MySQL database connection and baseline migration files.
- [ ] **T-12**: Install and configure Filament Admin at custom path `/ventera-panel`.
- [ ] **T-13**: Build reusable base Blade layout (`layouts/app.blade.php`), header, and footer.

## Phase 3: Build — Core Pages & Inquiry Flow
- [ ] **T-14**: Create database migrations and Eloquent models for core entities (Settings, Services, Categories, Products, Inquiries).
- [ ] **T-15**: Build Home page view with video hero section, trust strip, stats counters, and category cards.
- [ ] **T-16**: Build About Us page (Company Story, Vision/Mission, Why Ventera).
- [ ] **T-17**: Build Services listing and dynamic service detail pages.
- [ ] **T-18**: Build Products category grid and category detail gallery views.
- [ ] **T-19**: Build Contact & Request Quote form with Alpine.js validation, Honeypot, and Turnstile.
- [ ] **T-20**: Implement `InquiryController`, Form Request validation, file uploads, and notification mailables.
- [ ] **T-21**: Implement Filament Admin resources for managing Inquiries, Services, Products, and Site Settings.

## Phase 4: Build — Supporting Pages
- [ ] **T-22**: Build Our Process page (8-step interactive sourcing timeline).
- [ ] **T-23**: Build Partner Factories & Compliance page (verified certification badges).
- [ ] **T-24**: Build Sustainability & Social Responsibility page.
- [ ] **T-25**: Build News / Insights (Blog) listing and post detail pages.
- [ ] **T-26**: Build Legal pages (Privacy Policy and Terms of Use).

## Phase 5: Motion, Polish & Interactions
- [ ] **T-27**: Integrate responsive hero background video (WebM/MP4, Data Saver detection, pause/play toggle).
- [ ] **T-28**: Integrate GSAP / ScrollTrigger for reveal animations and animated stat counters.
- [ ] **T-29**: Integrate Swiper.js for responsive touch-friendly image carousels.
- [ ] **T-30**: Integrate Lenis smooth scrolling with reduced-motion accessibility support.

## Phase 6: SEO & Performance
- [ ] **T-31**: Configure dynamic meta tags, Open Graph, Twitter cards, and JSON-LD structured data.
- [ ] **T-32**: Implement dynamic `sitemap.xml` and `robots.txt`.
- [ ] **T-33**: Optimize image loading pipeline (WebP format, responsive sizes, lazy loading).
- [ ] **T-34**: Configure static asset caching headers and Laravel production optimization caches.

## Phase 7: Content Entry & Admin Polish
- [ ] **T-35**: Seed database with authentic Ventera content, services, categories, and sample products.
- [ ] **T-36**: Configure Filament user roles (Super Admin, Editor, Sales) and two-factor authentication.

## Phase 8: QA, Accessibility & Security
- [ ] **T-37**: Write automated tests for contact inquiry submission, validation, and core routes.
- [ ] **T-38**: Cross-browser and responsive testing across mobile, tablet, and desktop devices.
- [ ] **T-39**: Security audit (rate limiting, file upload MIME checks, HTTP security headers, debug disabled).
- [ ] **T-40**: Run Lighthouse audit to achieve 90+ desktop and 80+ mobile performance scores.

## Phase 9: Staging Review
- [ ] **T-41**: Deploy application to Hostinger staging environment.
- [ ] **T-42**: Execute client review feedback rounds and issue fixes.

## Phase 10: Production Launch
- [ ] **T-43**: Configure Hostinger production environment, SSL certificate, MySQL, and SMTP email (SPF/DKIM/DMARC).
- [ ] **T-44**: Set up Hostinger cron job (`schedule:run`) and queue worker configuration.
- [ ] **T-45**: Execute production DNS switch, launch checklist, and live verification.

## Phase 11: Post-Launch Support
- [ ] **T-46**: 30-day post-launch monitoring, database backup checks, and operational bug fixes.
