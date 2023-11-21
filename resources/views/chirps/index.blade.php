<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{route('chirps.store')}}">
                        @csrf
                        <textarea name="message" class="block w-full border-indigo-300 shadow-sm bg-transparent"
                        placeholder="{{__("What's on your mind?")}}"></textarea>
                        @error('message')
                            <div class="text-red-700 font-bold mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </br>
                        <x-primary-button class='mt-4' type="submit">
                            {{__('Chirp')}}
                        </x-primary-button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
