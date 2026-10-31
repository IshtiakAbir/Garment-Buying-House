# Ventera — Website Implementation Plan

**Project:** Corporate website for Ventera, a garment buying house
**Stack:** Laravel + MySQL, deployed on Hostinger
**Prepared by:** Head of Design & Development
**Version:** 1.0

---

## 1. Project Goals

| # | Goal | How we measure it |
|---|------|-------------------|
| 1 | Look like a trusted, professional, international buying house | Clean design, real content, certifications shown |
| 2 | Generate buyer inquiries | Inquiry / quote form submissions per month |
| 3 | Show products and capabilities clearly | Product category pages with galleries |
| 4 | Be easy to update **without a developer** | Admin panel for all content |
| 5 | Feel smooth and fast | Lighthouse score 90+ on desktop, 80+ on mobile |
| 6 | Rank on Google for "garment buying house Bangladesh" and similar | SEO basics done right from day one |

**Target visitors:** International fashion brands, retailers, importers (Europe, USA, UK, Canada, etc.). Many will open the site on a phone, from slow connections. Design for them.

---

## 2. Important Notes Before We Start

1. **Do not copy company facts from the RS Enterprise PDF.** Their BIN number, BGMEA number, turnover, manpower, certifications and client regions belong to them. Use the PDF only as a *structure idea*. All facts on the Ventera site must be **true and belong to Ventera**.
2. **Do not show a certification logo (BSCI, OEKO-TEX, WRAP, etc.) unless your partner factories really hold it.** Buyers check this. A false claim can destroy trust.
3. Use **real photos and real video** where possible. Stock content is fine for the first launch, but replace it over time.
4. Anything marked **[TBD]** in this plan needs your decision (see Section 17).

---

## 3. Technology Decisions

### 3.1 Core stack

| Layer | Choice | Why |
|-------|--------|-----|
| Backend | **Laravel (latest stable, 12.x or newer)** | Your choice. Secure, fast to build, huge community |
| PHP | **8.3 or higher** (set in hPanel) | Required by modern Laravel |
| Database | **MySQL** (Hostinger) | Your choice |
| Admin panel | **Filament** (recommended) | Builds a full admin dashboard in days, not weeks |
| Frontend | **Blade + Tailwind CSS + Alpine.js** | Fast, SEO-friendly, no heavy JavaScript framework |
| Build tool | **Vite** (comes with Laravel) | Bundles CSS and JS |
| Animations | **GSAP + ScrollTrigger** (or AOS for simple needs) | Smooth scroll effects, premium feel |
| Sliders | **Swiper.js** | Touch-friendly carousels |
| Images | **Spatie Media Library** + WebP conversion | Auto-resize and optimize uploads |
| Email | **SMTP** (Hostinger email or Brevo / Mailgun) | Inquiry notifications |
| Spam protection | **Cloudflare Turnstile** (free) + honeypot field | Better user experience than classic CAPTCHA |
| Analytics | **Google Analytics 4** + Search Console | Traffic and SEO tracking |

### 3.2 Why Blade and not React/Vue?

- Pages are rendered on the server, so Google reads everything easily (better SEO).
- Less JavaScript means faster load on slow networks.
- Easier to maintain and cheaper to host.
- We still get smooth animations with GSAP and Alpine.js.

### 3.3 Optional packages

- `spatie/laravel-sitemap` — auto sitemap.xml
- `spatie/laravel-honeypot` — spam protection
- `artesaos/seotools` or `ralphjsmit/laravel-seo` — meta tags and Open Graph
- `barryvdh/laravel-debugbar` — development only
- `spatie/laravel-backup` — scheduled backups
- `mcamara/laravel-localization` — only if you want multiple languages

---

## 4. Sitemap (Pages)

```
Home
├── About Us
│   ├── Our Story
│   ├── Vision & Mission
│   └── Why Ventera
├── Services
│   ├── Product Development
│   ├── Sourcing & Merchandising
│   ├── Production Management
│   ├── Quality Assurance
│   └── Testing & Compliance
├── Products
│   ├── Category list (Knit, Woven, Denim, Outerwear, Sportswear, Workwear, Kids, etc.)
│   └── Category detail page (gallery + details)
├── Our Process (How We Work)
├── Partner Factories & Compliance
├── Sustainability
├── Markets We Serve
├── Gallery / Portfolio
├── News / Insights (blog) — optional but good for SEO
├── Careers — optional
├── Contact / Request a Quote
├── Privacy Policy
└── Terms of Use
```

**Navigation (top menu):** Home · About · Services · Products · Process · Compliance · Contact
**Primary button in the header:** `Request a Quote`

---

## 5. Design Direction (Head of Design)

### 5.1 Feeling we want

> Premium. Calm. Trustworthy. Modern. A little editorial, like a fashion magazine, but still clear for business.

Avoid: crowded layouts, cheap stock-photo look, too many colors, slow heavy animations.

### 5.2 Color palette (suggestion — can change)

| Role | Color | Hex |
|------|-------|-----|
| Primary (deep) | Midnight navy | `#0B1F33` |
| Secondary | Warm sand / cream | `#F5F0E8` |
| Accent | Copper / terracotta | `#C0673B` |
| Text | Charcoal | `#1E1E1E` |
| Muted text | Gray | `#6B7280` |
| Success | Green | `#2E7D5B` |

Navy + cream + copper feels like fine fabric and tailoring. Final colors should match your **Ventera logo**. If the logo has its own colors, we build the palette around them.

### 5.3 Typography

- **Headings:** a refined serif, for example *Playfair Display* or *Cormorant Garamond*
- **Body and UI:** a clean sans-serif, for example *Inter* or *DM Sans*
- Use at most 2 font families. Self-host the fonts (faster, and better for privacy).

### 5.4 Layout rules

- 12-column grid, generous white space
- Large photos, big headlines, short text blocks
- One clear call-to-action per section
- Sticky header that becomes smaller on scroll
- Mobile-first: design the phone view first, then scale up

### 5.5 Motion and "smooth" feeling

- Fade-up and slide reveal when sections enter the screen
- Smooth image hover zoom on product cards
- Counter animation for numbers (years, partner factories, countries)
- Page transitions kept very light
- Optional: smooth scrolling with **Lenis** (small library, big premium feel)
- Respect `prefers-reduced-motion` — turn animations off for users who want that

### 5.6 Hero video (10 seconds)

**Concept:** A short, silent, looping video that shows the full journey of a garment: fabric → cutting → sewing → quality check → packing → shipment.

**Storyboard (about 10 seconds):**

| Time | Shot |
|------|------|
| 0–2 s | Close-up of fabric rolls / fabric texture |
| 2–4 s | Cutting table or sewing machine detail |
| 4–6 s | Quality inspector checking a garment |
| 6–8 s | Folded garments being packed in cartons |
| 8–10 s | Container / port or a clean final garment shot |

Overlay text on top of the video (not inside it): the headline and the "Request a Quote" button.

**Technical specification:**

| Item | Value |
|------|-------|
| Length | 8–12 seconds, loops seamlessly |
| Resolution | 1920×1080 (also make a 1280×720 version for mobile) |
| Format | **MP4 (H.264)** + **WebM (VP9/AV1)** |
| File size | Desktop under **4 MB**, mobile under **2 MB** |
| Frame rate | 24–30 fps |
| Audio | **None** (remove the audio track) |
| Poster image | A WebP frame shown while the video loads, and as a fallback |

**HTML approach:**

```html
<video autoplay muted loop playsinline preload="metadata"
       poster="/images/hero-poster.webp" class="hero-video">
  <source src="/videos/hero.webm" type="video/webm">
  <source src="/videos/hero.mp4" type="video/mp4">
</video>
```

**Rules for performance and accessibility:**

- Do not autoplay video when the user has Data Saver on (`navigator.connection.saveData`) — show the poster image only.
- On small phones, load the lighter 720p file or just the poster.
- Add a dark gradient overlay so white text is always readable.
- Provide a small pause/play button (accessibility).
- Compress with HandBrake or FFmpeg:
  `ffmpeg -i source.mp4 -vcodec libx264 -crf 28 -preset slow -an -vf scale=1920:-2 hero.mp4`
- You can shoot it yourself, hire a videographer, or build it from licensed stock clips (Pexels, Pixabay, Storyblocks). Check the license.

Make hero video editable from the admin panel (upload new MP4/WebM + poster + headline text).

---

## 6. Page-by-Page Plan

### 6.1 Home

1. **Hero** — video background, headline, sub-headline, 2 buttons (`Request a Quote`, `Our Services`)
2. **Trust strip** — "Serving buyers in Europe · USA · UK · Canada" + certification logos (only real ones)
3. **About summary** — short paragraph + photo + "Learn more"
4. **Key numbers** — years of experience, partner factories, product categories, markets (animated counters). Only use real numbers.
5. **Services** — 4–5 cards with icons
6. **Product categories** — large image cards (Knit, Woven, Denim, Outerwear, Sportswear, Workwear, Kids)
7. **How we work** — 5–6 step timeline
8. **Why Ventera** — 6–8 benefit blocks
9. **Compliance and sustainability** — short block with link
10. **Testimonials / Client logos** — only if permitted by clients
11. **Latest news** (optional)
12. **Call-to-action banner** — "Ready to start your next collection?"
13. **Footer** — links, address, email, phone/WhatsApp, social media

### 6.2 About Us
Story, vision and mission, values, team (optional), office photo, why choose us.

### 6.3 Services
Overview page + one detail page per service. Each has: what we do, how it helps the buyer, steps, related products, CTA.

### 6.4 Products
- Category grid with filter
- Category page: photos, typical items, fabrics, MOQ [TBD], lead time [TBD]
- "Request a quote for this category" button that pre-fills the form

### 6.5 Our Process
Visual step-by-step: Inquiry → Sample → Approval → Lab testing → Bulk production → Final inspection → Shipment → Payment/Documentation → After-sales support.

### 6.6 Partner Factories & Compliance
Factory types, certifications (real only), audit standards, social compliance statement, downloadable compliance PDF (optional, can require email).

### 6.7 Sustainability
Eco materials, waste reduction, ethical sourcing, social responsibility. Use real facts.

### 6.8 Contact / Request a Quote
- Form fields: Name, Company, Email, Phone/WhatsApp, Country, Product category (dropdown), Estimated quantity, Message, optional file upload (tech pack, max 10 MB)
- Office address, Google Map embed (loaded only on click, for speed), email, phone, WhatsApp button, business hours (Dhaka time)
- Success message after submit + auto-reply email

### 6.9 Legal
Privacy Policy and Terms (needed if you use forms, analytics and cookies).

---

## 7. Content Bank (starter text you can adapt)

> These are draft texts written for Ventera. Please check every sentence and replace with your real facts.

**Short about (home page):**
Ventera is a Bangladesh-based garment buying house. We help international fashion brands, retailers, and importers turn design ideas into finished products, with trusted factory partners, clear pricing, and strict quality control.

**Mission (draft):**
To deliver value-driven sourcing through strong supplier relationships, strict quality control, and customer-focused service.

**Vision (draft):**
To become a globally trusted sourcing partner, known for quality, innovation, and ethical practice in the apparel industry.

**Why Ventera (draft headings):**
- Sourcing Excellence
- Quality Commitment
- Competitive Pricing
- Customer-First Approach
- Time & Action (T&A) Control
- Pre-Production Meeting (PPM) Management
- Controlled Cutting (bulk cutting only after pilot approval)
- Daily Production Monitoring
- On-Time Delivery
- Premium Fabric Sourcing
- Integrity & Ethics
- Responsive Support

**Services (draft headings):**
- Product Development: trend and design support, fabric and trim sourcing, sample development (proto / fit / PP)
- Sourcing & Merchandising: cost negotiation, supplier selection, order follow-up
- Production Management: T&A planning, factory coordination, production tracking
- Quality Assurance: inline inspection, final inspection (AQL), pre-shipment audit
- Testing: material and accessories testing through accredited labs

**Tagline ideas [TBD]:**
- "Sourcing made simple."
- "From concept to container."
- "Your trusted sourcing partner in Bangladesh."

---

## 8. Database Design (MySQL)

All tables use `id`, `created_at`, `updated_at`. Use `utf8mb4` charset.

| Table | Important columns | Purpose |
|-------|-------------------|---------|
| `users` | name, email, password, role | Admin users |
| `settings` | key, value (JSON) | Site name, logo, contact info, social links, SEO defaults |
| `pages` | title, slug, content (JSON/rich text), meta_title, meta_description, og_image, is_published | Editable static pages |
| `hero_slides` | headline, subheadline, video_path, poster_path, button_text, button_url, is_active | Home hero |
| `services` | title, slug, short_desc, body, icon, image, sort_order, is_active | Services |
| `product_categories` | name, slug, description, cover_image, sort_order, is_active, seo fields | Product categories |
| `products` (or `product_items`) | category_id, name, slug, description, specs (JSON), is_featured | Items in a category |
| `product_images` | product_id / category_id, path, alt_text, sort_order | Galleries (or use media library) |
| `process_steps` | title, description, icon, sort_order | How we work |
| `certifications` | name, logo, description, certificate_file, is_active | Compliance badges |
| `partner_factories` | name_internal, type (knit/woven/denim…), capacity_note, is_public | Optional (keep details private by default) |
| `stats` | label, value, suffix, sort_order | Animated counters |
| `markets` | name, flag/icon, sort_order | Markets served |
| `testimonials` | client_name, company, country, quote, logo, is_active | Social proof |
| `clients` | name, logo, url, is_active | Client logos (only with permission) |
| `posts` | title, slug, excerpt, body, cover_image, published_at, author_id, seo fields | News / blog |
| `post_categories` | name, slug | Blog categories |
| `inquiries` | name, company, email, phone, country, category_id, quantity, message, attachment_path, status, ip_address, user_agent | Quote requests |
| `newsletter_subscribers` | email, confirmed_at | Optional |
| `job_openings` | title, location, description, is_active | Optional careers |
| `redirects` | from_url, to_url, status_code | SEO safety when URLs change |

**Inquiry status values:** `new`, `contacted`, `quoted`, `won`, `lost`, `spam`.

---

## 9. Admin Panel (CMS) Features

Built with Filament. Admin URL should **not** be `/admin` — use something like `/ventera-panel`.

**Modules:**
- Dashboard: new inquiries, total this month, recent activity
- Settings: logo, favicon, contact details, social links, default SEO, header/footer text
- Hero manager: upload video + poster, edit headline and buttons
- Pages, Services, Product categories, Products, Process steps, Stats, Markets, Certifications, Testimonials, Clients, Blog
- Media library with image cropping
- **Inquiry manager:** list, filter by status, view details, download attachment, add internal notes, export to CSV/Excel
- User and role management (Super Admin, Editor, Sales)
- SEO fields on every page and post
- Activity log (who changed what)

**Roles:**
- *Super Admin* — everything
- *Editor* — content only
- *Sales* — inquiries only

Enable **two-factor authentication** for admin users.

---

## 10. Laravel Application Structure

```
app/
├── Filament/Resources/         # Admin resources
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── PageController.php
│   │   ├── ServiceController.php
│   │   ├── ProductController.php
│   │   ├── PostController.php
│   │   ├── InquiryController.php
│   │   └── SitemapController.php
│   ├── Middleware/
│   └── Requests/InquiryRequest.php     # Validation
├── Models/
├── Mail/
│   ├── InquiryReceivedAdmin.php
│   └── InquiryAutoReply.php
├── Notifications/
├── Services/                    # Business logic (e.g., InquiryService)
└── View/Components/             # Blade components (hero, card, section-title…)
resources/
├── views/
│   ├── layouts/app.blade.php
│   ├── components/
│   ├── pages/
│   └── emails/
├── css/app.css                  # Tailwind entry
└── js/app.js                    # Alpine, GSAP, Swiper
routes/web.php
database/{migrations,seeders,factories}
public/{build,videos,images}
```

**Key routes:**

```
GET  /                       home
GET  /about                  about
GET  /services               list
GET  /services/{slug}        detail
GET  /products               categories
GET  /products/{slug}        category detail
GET  /process
GET  /compliance
GET  /sustainability
GET  /news , /news/{slug}
GET  /contact
POST /contact                inquiry (rate limited: 5 per minute per IP)
GET  /sitemap.xml
```

**Code quality rules:**
- Use Form Requests for validation
- Use Eloquent with eager loading (avoid N+1 queries)
- Use Blade components for reusable UI
- Cache heavy queries (home data) with `Cache::remember`
- Keep secrets only in `.env`
- Write feature tests for the contact form and key pages (Pest or PHPUnit)

---

## 11. Inquiry (Quote Request) Flow

1. Visitor fills the form → client-side validation (Alpine)
2. Turnstile + honeypot check
3. Server validation (`InquiryRequest`)
4. Save to `inquiries` table
5. Send email to Ventera sales team (queued)
6. Send auto-reply to visitor ("We received your request, we reply within 24 hours")
7. Show a thank-you message (and optionally track a conversion in GA4)
8. Admin sees it in the dashboard with status `new`

Rules: file upload allowed types `pdf, jpg, png, zip, ai, xlsx`, max 10 MB, stored outside the public folder, scanned by extension and MIME.

---

## 12. SEO Plan

**Technical SEO**
- Clean, readable URLs
- Unique `title` and `meta description` per page
- Open Graph and Twitter card tags
- `sitemap.xml` and `robots.txt`
- Canonical URLs
- Structured data (JSON-LD): `Organization`, `LocalBusiness`, `BreadcrumbList`, `Article`
- Proper heading order (one `h1` per page)
- Alt text on every image
- 301 redirects table
- Custom 404 page

**Content SEO**
- Target keywords [TBD, examples]: *garment buying house Bangladesh*, *buying agent Bangladesh*, *apparel sourcing Bangladesh*, *knit and woven garment sourcing*, *workwear manufacturer Bangladesh*
- Publish 1–2 helpful articles per month (e.g., "How to choose a garment factory in Bangladesh", "What is AQL inspection?", "T&A calendar explained")

**Off-site**
- Google Business Profile
- LinkedIn company page
- Listing in relevant directories

---

## 13. Performance Plan

- Serve images as **WebP**, with responsive sizes (`srcset`), and `loading="lazy"` (not on the hero)
- Preload the hero poster and main font
- Minify and bundle CSS/JS with Vite
- Enable Laravel caches in production:
  `php artisan config:cache && php artisan route:cache && php artisan view:cache`
- Use **Cloudflare** (free plan) for CDN, caching, SSL and basic DDoS protection
- Enable Hostinger caching / LiteSpeed cache if available
- Use `Cache-Control` headers for static assets
- Avoid heavy third-party scripts; load analytics after interaction
- Target: LCP < 2.5 s, CLS < 0.1, INP < 200 ms

---

## 14. Security Plan

- HTTPS everywhere (free SSL on Hostinger) + HSTS
- `APP_DEBUG=false` in production, `APP_ENV=production`
- CSRF protection on all forms (Laravel default)
- Validate and sanitize all input; use Eloquent / query builder (no raw SQL with user input)
- Rate limit the contact form and admin login
- Strong admin passwords + 2FA
- Hidden admin URL
- File upload restrictions, no executable files
- Security headers: `X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, basic `Content-Security-Policy`
- Keep Laravel and packages updated (`composer audit` monthly)
- `.env` and `storage` must **never** be reachable from the browser
- Daily database backup + weekly file backup (Hostinger backups + `spatie/laravel-backup` to cloud storage)
- Cookie consent banner (needed for EU visitors if you use analytics)

---

## 15. Deployment on Hostinger

> Check your Hostinger plan first. **Business Web Hosting or Cloud Hosting** (SSH access, Composer, Git, PHP 8.3) is strongly recommended for Laravel. Basic "Single/Premium" shared plans can work but are harder and more limited.

### 15.1 Environments

| Environment | Where | Purpose |
|-------------|-------|---------|
| Local | Your computer (Laravel Herd / XAMPP / Docker) | Development |
| Staging | Subdomain, e.g. `staging.yourdomain.com` (password protected) | Client review and testing |
| Production | `yourdomain.com` | Live site |

Use **Git** (GitHub / GitLab, private repo). Never edit code directly on the server.

### 15.2 Recommended folder layout on Hostinger

The safest way is to keep Laravel's core **outside** `public_html`:

```
/home/uXXXX/
├── ventera/                  # entire Laravel app (app, vendor, storage, .env...)
└── domains/yourdomain.com/public_html/   # contents of Laravel's /public folder only
```

Then edit `public_html/index.php` so the paths point to `../../../ventera/...`.

*If your plan lets you change the domain's document root to `ventera/public`, do that instead. It is cleaner.*

### 15.3 Step-by-step

1. Buy / point the domain to Hostinger, enable free SSL.
2. In hPanel: set **PHP 8.3+**, enable required extensions (`mbstring`, `openssl`, `pdo_mysql`, `fileinfo`, `gd` or `imagick`, `zip`, `intl`, `bcmath`).
3. Create the MySQL database and user in hPanel; save the credentials.
4. Connect via SSH. Clone the Git repo into `/home/uXXXX/ventera`.
5. Run `composer install --no-dev --optimize-autoloader`.
6. Create `.env` from `.env.example` and set:
   `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://yourdomain.com`, DB values, mail SMTP values, `APP_KEY` (`php artisan key:generate`).
7. Run `php artisan migrate --force` and the seeders (admin user, default settings).
8. Run `php artisan storage:link` (if symlinks are blocked, copy or point uploads to `public_html/storage`, or use a custom disk).
9. **Build assets locally** with `npm run build` and upload / commit the `public/build` folder (Node may not exist on shared hosting).
10. Run the cache commands (Section 13).
11. Set up a **cron job** in hPanel (every minute) for the scheduler and queue:
    `* * * * * php /home/uXXXX/ventera/artisan schedule:run >> /dev/null 2>&1`
    Use `QUEUE_CONNECTION=database` and run `queue:work --stop-when-empty` from the scheduler.
12. Add `.htaccess` rules: force HTTPS, block access to hidden files, enable gzip/brotli and browser caching.
13. Configure email: create a mailbox (e.g., `info@yourdomain.com`), add **SPF, DKIM and DMARC** records so inquiry emails do not go to spam.
14. Add Cloudflare (optional but recommended).
15. Test everything, then switch the DNS and go live.

### 15.4 Update routine (after launch)

```
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize:clear && php artisan optimize
```

(Upload new built assets if CSS/JS changed.)

### 15.5 Big-file note for the hero video

Do not store the video in Git. Upload it via the admin panel or File Manager/SFTP to `public/videos`. Keep original source files on your own computer.

---

## 16. Project Phases and Timeline

Estimated for **one full-stack developer + one designer** (can be the same person). Adjust as needed.

| Phase | Work | Duration |
|-------|------|----------|
| **0. Discovery** | Collect logo, brand colors, content, photos, domain, hosting info; confirm sitemap | 3–5 days |
| **1. Design** | Moodboard, style guide, Figma designs for Home + 3 key pages (desktop + mobile), hero video storyboard | 1–2 weeks |
| **2. Setup** | Laravel project, Git, database design, Filament admin, Tailwind setup, layouts, components | 3–5 days |
| **3. Build — core** | Home, About, Services, Products, Contact + inquiry flow | 2 weeks |
| **4. Build — rest** | Process, Compliance, Sustainability, Blog, Legal pages, Gallery | 1 week |
| **5. Motion and polish** | Hero video integration, animations, hover states, responsive fixes | 4–6 days |
| **6. SEO and performance** | Meta, schema, sitemap, image optimization, caching, Lighthouse tuning | 3–4 days |
| **7. Content entry** | Add real text, photos, and products in the admin panel | 3–5 days |
| **8. QA and security** | Testing on devices/browsers, fix bugs, security checklist | 4–5 days |
| **9. Staging review** | You review, we fix feedback (max 2 rounds) | 1 week |
| **10. Launch** | Production deploy, DNS, SSL, email, monitoring | 1–2 days |
| **11. Support** | 30 days of bug fixes after launch | 1 month |

**Total:** about **7–9 weeks** from start to launch.

### Milestone checklist

- [ ] M1: Design approved
- [ ] M2: Admin panel and database ready
- [ ] M3: Home page complete with hero video
- [ ] M4: All pages complete
- [ ] M5: Staging approved
- [ ] M6: Live

---

## 17. Information Needed From You (Owner)

Please prepare these. Items marked ★ are needed to start.

**Brand**
- ★ Ventera logo (SVG or high-res PNG) and any brand colors
- Tagline [TBD]
- Preferred style: more *luxury/editorial* or more *corporate/industrial*?

**Company facts**
- ★ Year of establishment, office address, phone/WhatsApp, business email
- Legal and registration details to show (BIN, BGMEA, etc.) — only if you want them public
- Real numbers: partner factories, product categories, markets, years of experience
- Real certifications held by your partner factories (with proof)
- Names/photos of team members (optional)

**Media**
- ★ Photos: office, factory visits, products, quality checks, packing
- Video clips for the hero, or confirm if we should use licensed stock for now
- Product sample photos by category

**Business rules**
- MOQ and lead time to show (or hide)
- Which clients/logos you have permission to show
- Which markets you serve

**Technical**
- ★ Domain name (bought or not?)
- ★ Hostinger plan name (is SSH + Composer available?)
- Business email addresses to receive inquiries
- Do you need **multiple languages** (e.g., English only, or also Chinese/German)? Default: English only
- Do you want a **blog / news** section at launch?
- Do you want a **client login / buyer portal** later? (Not in the first version)

---

## 18. Quality Assurance Checklist

**Functional**
- [ ] All menu links and buttons work
- [ ] Contact form: success, validation errors, spam block, file upload, email delivery, auto-reply
- [ ] Admin: create/edit/delete for every module
- [ ] 404 and 500 pages look good

**Responsive and browsers**
- [ ] Phones (iPhone SE size, standard Android, large phones), tablet, laptop, large desktop
- [ ] Chrome, Safari (iOS and Mac), Firefox, Edge

**Hero video**
- [ ] Autoplays muted on desktop, Android and iOS Safari
- [ ] Poster shows if video fails or Data Saver is on
- [ ] Text is readable over the video
- [ ] Video loops without a visible jump

**Performance and SEO**
- [ ] Lighthouse: Performance, SEO, Accessibility, Best Practices all 90+ (desktop)
- [ ] Every page has a unique title and description
- [ ] `sitemap.xml` and `robots.txt` work
- [ ] Structured data validates (Google Rich Results Test)

**Accessibility**
- [ ] Keyboard navigation works
- [ ] Color contrast passes (WCAG AA)
- [ ] Alt text on images, labels on form fields
- [ ] Reduced-motion respected

**Security**
- [ ] `APP_DEBUG=false`
- [ ] `.env` not reachable by URL
- [ ] HTTPS forced
- [ ] Rate limits working
- [ ] Backups run and restore was tested once

---

## 19. Risks and How We Handle Them

| Risk | Impact | Mitigation |
|------|--------|-----------|
| Content or photos arrive late | Delays launch | Start with placeholder content; set a content deadline |
| Hostinger plan lacks SSH / Composer | Hard deployment | Confirm plan in Phase 0; upgrade if needed, or deploy the `vendor` folder built locally |
| Hero video too heavy | Slow site, high bounce | Strict file-size limits, poster fallback, mobile version |
| Emails go to spam | Lost inquiries | SPF/DKIM/DMARC, SMTP service, also store every inquiry in the database |
| Fake certification or claims | Reputation and legal risk | Show only verified facts |
| Scope creep | Cost and time grow | Freeze scope after design approval; list extras for Version 2 |
| Security attacks / spam bots | Downtime, junk data | Turnstile, rate limit, backups, updates |
| No one can update the site | Stale content | Admin training session + short video guide |

---

## 20. Version 2 Ideas (After Launch)

- Buyer portal: order status, sample tracking, documents
- Multi-language (EN / ZH / DE)
- Live chat or WhatsApp Business API
- Downloadable digital catalog with email capture
- Product search with fabric/GSM filters
- Case studies section
- CRM integration (HubSpot / Zoho)
- Virtual factory tour (360° or video)

---

## 21. Deliverables Summary

1. Figma design files (desktop + mobile) and style guide
2. Complete Laravel source code in a private Git repository
3. MySQL database structure, migrations and seeders
4. Admin panel with training video / PDF guide
5. Hero video integration (and optimized video files)
6. Live website on Hostinger with SSL, email and backups
7. SEO setup (sitemap, schema, Search Console, Analytics)
8. Documentation: README, deployment guide, `.env.example`, update routine
9. 30 days of post-launch support

---

## 22. Recommended Next Step

1. Send me the items marked ★ in Section 17.
2. I will prepare the **style guide and Home page design** first.
3. After you approve the design, we start building in Laravel.

If you want, the next documents I can write are:
- A **database migration list** (ready-to-run Laravel migrations)
- A **Figma-ready wireframe description** for every page
- A **task board** (Trello / Jira format) split into small tickets
