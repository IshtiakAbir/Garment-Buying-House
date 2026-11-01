@props([
    'title' => null,
    'text' => null,
    'link' => '#',
    'linkText' => 'Explore category',
    'badge' => null,
    'gradient' => 'from-navy to-navy-light', // fallback placeholder gradient
    'image' => null,
    'alt' => '',
])

<div {{ $attributes->merge(['class' => 'group relative flex flex-col bg-white rounded-[0.375rem] border border-muted-light/60 overflow-hidden shadow-subtle hover:shadow-card transition-all duration-300 ease-out hover:-translate-y-1 reveal-item']) }}>
    <!-- Top Image Container with Hover Zoom -->
    <div class="relative aspect-[4/3] w-full overflow-hidden bg-cream-dark/40">
        @if ($image)
            <img src="{{ $image }}" 
                 alt="{{ $alt ?: $title }}" 
                 loading="lazy" 
                 class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
        @else
            <!-- Luxury placeholder styling with fabric weave subtle gradient -->
            <div class="w-full h-full bg-gradient-to-br {{ $gradient }} flex items-center justify-center p-6 text-center transition-transform duration-500 ease-out group-hover:scale-105">
                <span class="font-serif text-lg font-medium text-cream tracking-wide opacity-90">
                    {{ $title }}
                </span>
            </div>
        @endif

        @if ($badge)
            <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-navy text-xs font-semibold px-2.5 py-1 rounded-[0.25rem] shadow-sm uppercase tracking-wider">
                {{ $badge }}
            </span>
        @endif
    </div>

    <!-- Body Information -->
    <div class="flex flex-col flex-grow p-6 sm:p-7">
        @if ($title)
            <h3 class="font-serif text-xl font-bold text-navy group-hover:text-copper transition-colors duration-200 mb-2">
                {{ $title }}
            </h3>
        @endif

        @if ($text)
            <p class="text-sm text-muted leading-relaxed mb-5 flex-grow">
                {{ $text }}
            </p>
        @endif

        {{ $slot }}

        @if ($link)
            <div class="pt-2">
                <a href="{{ $link }}" 
                   class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider text-copper group-hover:text-copper-dark transition-colors">
                    <span>{{ $linkText }}</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>
