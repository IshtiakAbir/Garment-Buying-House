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

## Design Tokens (Tailwind & CSS Variables)
| Category | Token Names | Values / Definitions |
|---|---|---|
| Primary Colors | `navy-dark`, `navy`, `navy-light`, `navy-soft` | `#071421`, `#0B1F33`, `#16324F`, `#1F4063` |
| Accent Colors | `copper-dark`, `copper`, `copper-light`, `copper-soft` | `#A45229`, `#C0673B`, `#D87B4E`, `#FDF4ED` |
| Neutral Colors | `cream-light`, `cream`, `cream-dark` | `#FAF7F2`, `#F5F0E8`, `#EAE2D5` |
| Text & Status | `charcoal`, `muted`, `muted-light`, `success` | `#1E1E1E`, `#6B7280`, `#E5E7EB`, `#2E7D5B` |
| Typography | `font-serif`, `font-sans` | Self-hosted *Playfair Display* & *Inter* |
| Fluid Type | `text-hero`, `text-h1`, `text-h2`, `text-h3`, `text-body` | `clamp()` fluid scales (2.5-4.25rem, 2-3.25rem, etc.) |
| Spacing & Grid | `spacing-container` (1280px), `spacing-section` | `clamp(4rem, 8vw, 7.5rem)` vertical rhythm |
| Elevation & Shape | `shadow-subtle`, `shadow-card`, `shadow-header` | Soft navy ambient shadows; `rounded-luxury` (6px) |

## Blade UI Components (`resources/views/components/`)
- `x-header`: Sticky navigation with scroll reduction, desktop nav, and Alpine.js accessible mobile slide-in menu.
- `x-footer`: Luxury footer with brand story, capabilities, office address, and social links.
- `x-button`: Versatile CTA button with `primary`, `outline`, `light`, and `navy` variants.
- `x-section`: Section wrapper with fluid spacing (`normal`, `sm`, `none`) and `white`, `cream`, or `navy` backgrounds.
- `x-section-title`: Eyebrow, serif heading, and descriptive subtitle wrapper.
- `x-card`: Image-topped luxury category card with hover zoom and action link.
- `x-icon-card`: Rounded icon box with title and description for services.
- `x-stat`: Big serif counter metric with data attributes for GSAP count-up animation.
- `x-step`: Numbered timeline node for the 8-step sourcing process.
- `x-cta-banner`: High-contrast navy banner with dual action buttons and ambient lighting glows.

## Frontend JS Modules (`resources/js/`)
- `app.js`: Root entrypoint orchestrating Alpine.js initialization and Lenis smooth scrolling.
- `reveal.js`: GSAP & ScrollTrigger scroll reveal animations with `prefers-reduced-motion` detection.
- `counters.js`: Single-fire GSAP ScrollTrigger numeric count-up animations for key statistics.
- `header.js`: Header state tracking on scroll for elevation shadow application.


