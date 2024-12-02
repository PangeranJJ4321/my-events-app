<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Widget content --}}
        <x-filament::button 
            icon="heroicon-s-home" 
            color="primary" 
            class="mt-4" 
            onclick="window.location.href='{{ url('/home') }}'">
            Back to Home Page
        </x-filament::button>
    </x-filament::section>
</x-filament-widgets::widget>
