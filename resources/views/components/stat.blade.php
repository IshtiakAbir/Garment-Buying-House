@props([
    'number' => '0',
    'suffix' => '+',
    'prefix' => '',
    'label' => '',
    'comment' => '[TBD]',
    'inverted' => false, // For dark background
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center text-center p-6 rounded-[0.375rem] reveal-item']) }}>
    <!-- {{ $comment }}: Metric placeholder number will be updated with verified company claim -->
    <div class="flex items-baseline gap-0.5">
        @if ($prefix)
            <span class="font-serif text-2xl sm:text-3xl font-bold {{ $inverted ? 'text-copper-light' : 'text-copper' }}">
                {{ $prefix }}
            </span>
        @endif
        
        <span class="font-serif text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight counter-number {{ $inverted ? 'text-white' : 'text-navy' }}"
              data-target="{{ (int) $number }}"
              data-prefix="{{ $prefix }}"
              data-suffix="{{ $suffix }}">
            {{ $number }}
        </span>

        @if ($suffix)
            <span class="font-serif text-3xl sm:text-4xl font-bold {{ $inverted ? 'text-copper-light' : 'text-copper' }}">
                {{ $suffix }}
            </span>
        @endif
    </div>

    <span class="mt-2 text-xs sm:text-sm font-semibold uppercase tracking-wider max-w-[14rem] {{ $inverted ? 'text-cream/80' : 'text-muted' }}">
        {{ $label }}
    </span>
</div>
