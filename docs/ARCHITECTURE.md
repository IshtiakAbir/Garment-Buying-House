# Architecture — Ventera

## Folder Map
```
Ventera/
├── app/
│   ├── Filament/Resources/       # Admin panel resources (/ventera-panel)
│   ├── Http/Controllers/        # Public web controllers (Home, Service, Product, Inquiry)
│   ├── Http/Requests/           # Form validation (InquiryRequest)
│   ├── Mail/                    # InquiryReceivedAdmin, InquiryAutoReply
│   ├── Models/                  # Eloquent models
│   └── Services/                # InquiryService and business logic
├── database/
│   ├── migrations/              # Schema definitions
│   └── seeders/                 # Default admin, settings, sample content
├── docs/                        # Project memory (PLAN, ARCHITECTURE, TASKS, STATE, DECISIONS)
├── public/                      # Entrypoint (index.php), videos/, images/
├── resources/
│   ├── css/                     # Tailwind styling (app.css)
│   ├── js/                      # Alpine.js, GSAP, Swiper (app.js)
│   └── views/                   # Blade templates (layouts, components, pages)
└── routes/
    └── web.php                  # Web and admin routing
```

## Core Models
- `User`: Admin users with Filament roles (`Super Admin`, `Editor`, `Sales`).
- `Setting`: Key-value JSON storage for site identity, contact info, SEO.
- `Page`: Static editable pages (title, slug, rich text content, SEO).
- `HeroSlide`: Home video/poster hero with headline and CTA buttons.
- `Service`: Garment services (development, sourcing, QA, testing).
- `ProductCategory`: Knit, Woven, Denim, Outerwear, Sportswear, etc.
- `Product`: Items/styles under categories with gallery images.
- `ProcessStep`: 8-step production and sourcing workflow.
- `Certification`: Partner factory compliance badges (BSCI, OEKO-TEX, etc.).
- `Stat`: Animated homepage counter metrics.
- `Market`: Regions served (Europe, USA, UK, Canada).
- `Testimonial`: Verified buyer quotes and logos.
- `Post` / `PostCategory`: News and industry insights for SEO.
- `Inquiry`: Buyer quote requests with status pipeline and file attachments.

## Public Routes
- `GET /` : Home
- `GET /about` : About Us
- `GET /services`, `GET /services/{slug}` : Services list & detail
- `GET /products`, `GET /products/{slug}` : Products categories & detail
- `GET /process` : Production workflow
- `GET /compliance` : Compliance & factory standards
- `GET /sustainability` : Sustainability practices
- `GET /news`, `GET /news/{slug}` : Industry news/blog
- `GET /contact` : Contact & quote request form
- `POST /contact` : Submit inquiry (rate limit 5/min per IP)
- `GET /sitemap.xml` : Dynamic XML sitemap
- `GET /ventera-panel` : Filament Admin panel

## Key Flows
### Inquiry (Quote Request) Flow
1. Buyer submits form on `/contact` or pre-filled from `/products/{slug}`.
2. Alpine.js client validation -> Cloudflare Turnstile & Honeypot check.
3. Server validates via `InquiryRequest` (max 10MB tech pack: pdf, jpg, png, zip).
4. Record created in `inquiries` table with status `new`.
5. Queued `InquiryReceivedAdmin` sent to Ventera sales team.
6. Queued `InquiryAutoReply` sent to buyer.
7. Admin manages inquiry status (`new` -> `contacted` -> `quoted` -> `won`/`lost`/`spam`) in Filament.
