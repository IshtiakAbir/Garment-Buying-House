@props([
    'title' => null,
    'text' => null,
    'link' => null,
    'linkText' => 'Learn more',
])

<div {{ $attributes->merge(['class' => 'group relative flex flex-col p-7 sm:p-8 bg-white rounded-[0.375rem] border border-muted-light/60 hover:border-copper/40 shadow-subtle hover:shadow-card transition-all duration-300 ease-out hover:-translate-y-1 reveal-item']) }}>
    <!-- Icon Container -->
    <div class="w-14 h-14 rounded-[0.375rem] bg-cream flex items-center justify-center text-copper group-hover:bg-copper group-hover:text-white transition-colors duration-300 mb-6 shrink-0">
        {{ $icon ?? $slot }}
    </div>

    <!-- Title -->
    @if ($title)
        <h3 class="font-serif text-xl font-bold text-navy group-hover:text-copper transition-colors duration-200 mb-3">
            {{ $title }}
        </h3>
    @endif

    <!-- Text -->
    @if ($text)
        <p class="text-sm sm:text-base text-muted leading-relaxed flex-grow">
            {{ $text }}
        </p>
    @endif

    @if ($link)
        <div class="pt-5 mt-auto">
            <a href="{{ $link }}" class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider text-copper group-hover:text-copper-dark transition-colors">
                <span>{{ $linkText }}</span>
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    @endif
</div>
