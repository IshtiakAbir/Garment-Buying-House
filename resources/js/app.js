import Alpine from 'alpinejs';
import Lenis from 'lenis';
import { initScrollReveal } from './reveal.js';
import { initCounters } from './counters.js';
import { initHeader } from './header.js';

// 1. Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// 2. DOM Ready Orchestration
document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initScrollReveal();
    initCounters();

    // 3. Smooth scrolling with Lenis (respects reduced motion)
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!prefersReducedMotion && typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.1,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            touchMultiplier: 1.5,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
    }
});
