@props([
    'eyebrow' => null,
    'heading' => null,
    'intro' => null,
    'align' => 'center', // center | left
    'inverted' => false, // for dark backgrounds
])

@php
    $alignClasses = $align === 'left' ? 'text-left items-start' : 'text-center items-center mx-auto';
    $eyebrowColor = $inverted ? 'text-copper-light' : 'text-copper';
    $headingColor = $inverted ? 'text-white' : 'text-navy';
    $introColor = $inverted ? 'text-cream/80' : 'text-muted';
@endphp

<div {{ $attributes->merge(['class' => "flex flex-col {$alignClasses} max-w-3xl mb-12 sm:mb-16 reveal-item"]) }}>
    @if ($eyebrow)
        <span class="text-xs sm:text-sm font-semibold tracking-widest uppercase mb-3 {{ $eyebrowColor }}">
            {{ $eyebrow }}
        </span>
    @endif

    @if ($heading)
        <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-bold tracking-tight leading-tight mb-4 {{ $headingColor }}">
            {{ $heading }}
        </h2>
    @endif

    @if ($intro)
        <p class="text-base sm:text-lg leading-relaxed font-normal {{ $introColor }}">
            {{ $intro }}
        </p>
    @endif

    {{ $slot }}
</div>
