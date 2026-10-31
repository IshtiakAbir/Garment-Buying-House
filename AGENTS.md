# AGENTS.md — Ventera Developer Guide

## Stack
- Laravel (latest stable 12.x+), PHP 8.3+, MySQL (Hostinger)
- Filament Admin (at `/ventera-panel`)
- Blade, Tailwind CSS, Alpine.js, Vite
- Spatie Media Library, GSAP, Swiper.js, Lenis

## Core Workflow Rules
1. Always read `docs/PROJECT_STATE.md` first.
2. Read `docs/ARCHITECTURE.md` only if needed.
3. Read only the specific section of `docs/PLAN.md` needed for the current task.
4. Never scan the whole repo. Search for the exact file or symbol.
5. Never open or scan `vendor/`, `node_modules/`, `storage/`, `public/build/`.
6. Work on ONE task from `docs/TASKS.md` at a time.
7. After each finished task: update `docs/PROJECT_STATE.md` and `docs/TASKS.md`, then commit and push.

## Coding Standards
- Strict types and Form Requests for all validations.
- Blade components for reusable UI; no inline styles.
- Eloquent eager loading to prevent N+1 queries (`with()`).
- Cache public homepage and static queries (`Cache::remember`).
- Keep all secrets in `.env`; never hardcode credentials.
- Rate limit contact inquiries (5/min per IP) and admin auth.

## Git Rules
- Format: `<type>(<task-id>): <short message>` (types: feat, fix, docs, style, refactor, chore, test).
- Commit after every finished task.
- Check `git status` before commit; verify no secrets or `.env` staged.
- Never force push (`--force`), never rewrite git history.

## Useful Commands
- Dev server: `php artisan serve` & `npm run dev`
- Assets build: `npm run build`
- Cache clear: `php artisan optimize:clear`
- Cache optimize: `php artisan optimize`
- Migrations: `php artisan migrate`
- Tests: `php artisan test`
- Handoff update: run `/handoff` workflow
