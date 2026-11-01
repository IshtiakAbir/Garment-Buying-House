@props([
    'variant' => 'primary', // primary | outline | light | navy
    'size' => 'md',        // md | lg
    'href' => null,
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium tracking-wide transition-all duration-200 ease-out focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 select-none group';

    $sizeClasses = match ($size) {
        'lg' => 'px-7 py-3.5 text-base rounded-[0.375rem] gap-2.5',
        default => 'px-5 py-2.5 text-sm rounded-[0.375rem] gap-2',
    };

    $variantClasses = match ($variant) {
        'outline' => 'border-2 border-copper text-copper hover:bg-copper hover:text-white focus-visible:ring-copper bg-transparent active:bg-copper-dark',
        'light' => 'bg-cream text-navy hover:bg-cream-dark focus-visible:ring-navy border border-cream-dark/60 shadow-subtle active:translate-y-0',
        'navy' => 'bg-navy text-white hover:bg-navy-light focus-visible:ring-navy-light shadow-subtle hover:-translate-y-0.5 active:translate-y-0',
        default => 'bg-copper text-white hover:bg-copper-dark focus-visible:ring-copper shadow-subtle hover:-translate-y-0.5 active:translate-y-0 hover:shadow-card',
    };

    $classes = "{$baseClasses} {$sizeClasses} {$variantClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
