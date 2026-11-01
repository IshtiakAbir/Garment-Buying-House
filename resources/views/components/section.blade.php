@props([
    'background' => 'white', // white | cream | navy
    'id' => null,
    'container' => true,
    'spacing' => 'normal', // normal | sm | none
])

@php
    $bgClasses = match ($background) {
        'cream' => 'bg-cream text-charcoal',
        'navy' => 'bg-navy text-white',
        default => 'bg-white text-charcoal',
    };

    $spacingClasses = match ($spacing) {
        'sm' => 'py-12 sm:py-16 md:py-20',
        'none' => 'py-0',
        default => 'py-16 sm:py-20 md:py-28',
    };
@endphp

<section 
    @if ($id) id="{{ $id }}" @endif 
    {{ $attributes->merge(['class' => "relative w-full {$bgClasses} {$spacingClasses}"]) }}
>
    @if ($container)
        <div class="max-w-[80rem] mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</section>
