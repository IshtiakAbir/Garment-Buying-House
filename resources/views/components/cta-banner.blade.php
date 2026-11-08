@props([
    'headline' => 'Ready to Start Your Next Apparel Collection?',
    'subline' => 'Partner with Trivant for transparent pricing, vetted compliant factories, and dedicated merchandising in Bangladesh.',
    'buttonText' => 'Request a Quote',
    'buttonLink' => null,
    'secondaryText' => 'Explore Sourcing Process',
    'secondaryLink' => null,
])

@php
    $buttonLink = $buttonLink ?: route('contact');
    $secondaryLink = $secondaryLink ?: route('process');
@endphp

<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-[0.5rem] bg-navy text-white p-8 sm:p-12 md:p-16 border border-navy-light/60 shadow-elevated reveal-item']) }}>
    <!-- Decorative Ambient Glows -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-copper/15 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-navy-light/40 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10 max-w-3xl mx-auto text-center flex flex-col items-center">
        <span class="text-xs sm:text-sm font-semibold uppercase tracking-widest text-copper-light mb-4">
            Connect With Trivant
        </span>

        <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-white mb-5 leading-tight">
            {{ $headline }}
        </h2>

        <p class="text-base sm:text-lg text-cream/80 leading-relaxed max-w-2xl mb-8">
            {{ $subline }}
        </p>

        <div class="flex flex-col sm:flex-row items-center gap-4 justify-center w-full sm:w-auto">
            <x-button href="{{ $buttonLink }}" variant="primary" size="lg" class="w-full sm:w-auto">
                {{ $buttonText }}
            </x-button>

            @if ($secondaryText && $secondaryLink)
                <x-button href="{{ $secondaryLink }}" variant="outline" size="lg" class="w-full sm:w-auto border-cream/30 text-cream hover:bg-cream hover:text-navy">
                    {{ $secondaryText }}
                </x-button>
            @endif
        </div>
    </div>
</div>
