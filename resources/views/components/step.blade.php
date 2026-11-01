@props([
    'number' => '01',
    'title' => null,
    'text' => null,
    'isLast' => false,
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col md:flex-row gap-5 md:gap-8 pb-10 last:pb-0 reveal-item group']) }}>
    <!-- Timeline Node (Number Badge + Connector) -->
    <div class="flex md:flex-col items-center shrink-0">
        <div class="w-12 h-12 rounded-[0.375rem] bg-navy text-copper border border-navy-light flex items-center justify-center font-serif text-lg font-bold shadow-sm group-hover:bg-copper group-hover:text-white transition-colors duration-300">
            {{ $number }}
        </div>
        @unless ($isLast)
            <div class="hidden md:block w-px h-full bg-muted-light/80 my-2 group-hover:bg-copper/40 transition-colors"></div>
        @endunless
    </div>

    <!-- Content -->
    <div class="flex flex-col flex-grow pt-1">
        @if ($title)
            <h3 class="font-serif text-xl font-bold text-navy mb-2 group-hover:text-copper transition-colors duration-200">
                {{ $title }}
            </h3>
        @endif

        @if ($text)
            <p class="text-sm sm:text-base text-muted leading-relaxed max-w-2xl">
                {{ $text }}
            </p>
        @endif

        {{ $slot }}
    </div>
</div>
