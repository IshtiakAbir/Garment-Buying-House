<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:description>{{ $description }}</x-slot:description>

    <!-- Stub Hero / Header Banner -->
    <x-section background="navy" spacing="sm" class="border-b border-navy-light/60">
        <div class="max-w-3xl mx-auto text-center flex flex-col items-center">
            <span class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-copper-light mb-3">
                {{ $eyebrow }}
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-white mb-4">
                {{ $title }}
            </h1>
            <p class="text-base sm:text-lg text-cream/80 max-w-xl leading-relaxed">
                {{ $description }}
            </p>
        </div>
    </x-section>

    <!-- Content Area: Coming Soon Notice with Editorial Touch -->
    <x-section background="white" spacing="normal">
        <div class="max-w-2xl mx-auto text-center flex flex-col items-center p-8 sm:p-12 rounded-[0.5rem] bg-cream-light border border-muted-light/60 shadow-subtle">
            <div class="w-16 h-16 rounded-[0.375rem] bg-cream flex items-center justify-center text-copper mb-6 shadow-sm">
                <!-- Compass / Crafting Icon -->
                <svg class="w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <span class="text-xs font-semibold uppercase tracking-widest text-muted mb-2">
                Under Development · Task Milestone
            </span>

            <h2 class="font-serif text-2xl sm:text-3xl font-bold text-navy mb-4">
                This Page is Coming Soon
            </h2>

            <p class="text-sm sm:text-base text-muted leading-relaxed mb-8 max-w-md">
                We are actively integrating verified factory credentials, photography, and interactive features for this section in upcoming project phases.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                <x-button href="{{ route('home') }}" variant="primary" size="md" class="w-full sm:w-auto">
                    Return to Homepage
                </x-button>
                <x-button href="{{ route('contact') }}" variant="light" size="md" class="w-full sm:w-auto">
                    Contact Sourcing Desk
                </x-button>
            </div>
        </div>
    </x-section>
</x-app-layout>
