import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initScrollReveal() {
    // Check if user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
        // Immediately reveal all elements without transition
        document.querySelectorAll('.reveal-item').forEach((el) => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
        return;
    }

    const items = document.querySelectorAll('.reveal-item');
    if (!items.length) return;

    items.forEach((item) => {
        gsap.fromTo(
            item,
            {
                opacity: 0,
                y: 28,
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.85,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: item,
                    start: 'top 88%',
                    toggleActions: 'play none none none',
                    once: true,
                },
            }
        );
    });
}
