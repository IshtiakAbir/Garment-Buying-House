<x-app-layout>
    <x-slot:title>Page Not Found (404)</x-slot:title>
    <x-slot:description>The page you are looking for does not exist or has been relocated.</x-slot:description>

    <x-section background="cream" spacing="normal" class="min-h-[70vh] flex items-center justify-center">
        <div class="max-w-2xl mx-auto text-center flex flex-col items-center py-12">
            <span class="font-serif text-7xl sm:text-8xl font-bold text-copper/60 tracking-tight mb-2">
                404
            </span>

            <span class="text-xs sm:text-sm font-semibold tracking-widest uppercase text-muted mb-4">
                Page Not Found
            </span>

            <h1 class="font-serif text-2xl sm:text-4xl font-bold text-navy mb-4">
                The Requested Page Could Not Be Found
            </h1>

            <p class="text-base text-muted max-w-md leading-relaxed mb-8">
                The URL you accessed might have been moved or is currently unavailable. Please use the navigation menu or return to our homepage.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4">
                <x-button href="{{ route('home') }}" variant="primary" size="lg">
                    Back to Homepage
                </x-button>
                <x-button href="{{ route('contact') }}" variant="outline" size="lg">
                    Contact Buyer Support
                </x-button>
            </div>
        </div>
    </x-section>
</x-app-layout>
