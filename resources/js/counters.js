import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initCounters() {
    const counterElements = document.querySelectorAll('.counter-number');
    if (!counterElements.length) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    counterElements.forEach((el) => {
        const targetValue = parseInt(el.getAttribute('data-target') || el.textContent.trim(), 10);
        if (isNaN(targetValue)) return;

        if (prefersReducedMotion) {
            el.textContent = targetValue;
            return;
        }

        const obj = { value: 0 };

        ScrollTrigger.create({
            trigger: el,
            start: 'top 90%',
            once: true,
            onEnter: () => {
                gsap.to(obj, {
                    value: targetValue,
                    duration: 1.8,
                    ease: 'power1.out',
                    onUpdate: () => {
                        el.textContent = Math.round(obj.value);
                    },
                    onComplete: () => {
                        el.textContent = targetValue;
                    },
                });
            },
        });
    });
}
