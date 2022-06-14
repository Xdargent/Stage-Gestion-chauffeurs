
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Vehicules') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("You're logged in!")  }}
    </div>
    
    <div class="py-6">
        <div class="grid items-center gap-4">
            <div class="grid items-start grid-cols-3 gap-4 justify-items-center">
                <x-button :variant="'black'" size="'base'" class="items-center gap-2">
                    <span>Valider</span>
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
