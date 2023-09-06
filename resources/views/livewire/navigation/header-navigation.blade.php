<div>
    <section id="hola">
        <div x-data="{ open: false }">
            <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="#">
                                <span class="sr-only">Workflow</span>
                                <img alt="Workflow" class="h-10 w-auto sm:h-12" src="{{ asset('/hero/coding.png') }}">
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" 
                                @click="open = ! open" >
                                    <span class="sr-only">Open main menu</span>
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--Navigation Items for Desktop-->
                    <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8 text-lg">
                        <x-navigation.links class="text-gray-200 hover:text-red-300" :items="$items"/>
                    </div>
                    <!--Navigation Actions for Desktop-->
                    {{-- @auth --}}{{-- @endauth --}}
                    <div class="hidden md:flex items-center justify-between space-x-2 ml-4 pb-1">
                        <x-action 
                            class="text-yellow-300 hover:text-blue-300" title="{{ __('Edit') }}"
                            wire:click.prevent="openSlide" 
                        >
                            <x-icons.edit/>
                        </x-action>
                        <x-action 
                            class="text-yellow-300 hover:text-blue-300" title="{{ __('Add') }}"
                            wire:click.prevent="openSlide(true)" 
                        >
                            <x-icons.add/>
                        </x-action>
                    </div>
                    
                </nav>
            </div>

            <div x-show="open" 
                class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" 
                @click.away="open = false" style="display: none;">
                <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="px-5 pt-4 flex items-center justify-between">
                        <div>
                            <img class="h-8 w-auto" src="{{ asset('/hero/coding.png') }}" alt="Logo">
                        </div>
                        <div class="-mr-2">
                            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = !open">
                                <span class="sr-only">Close main menu</span>
                                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <!--Navigation Items for Mobile-->
                        <x-navigation.links class="block px-3 py-2 rounded-md text-base text-gray-700 hover:text-gray-900 hover:bg-gray-50" :items="$items"/>
                        <!--Navigation Actions for Mobile-->
                        {{-- @auth --}}{{-- @endauth --}}
                        <x-action 
                            class="block px-2 text-yellow-500 hover:text-blue-500" title="{{ __('Edit') }}"
                            wire:click.prevent="openSlide" 
                        >
                            <x-icons.edit/>
                        </x-action>

                        <x-action 
                            class="block px-2 text-yellow-500 hover:text-blue-500" title="{{ __('Add') }}"
                            wire:click.prevent="openSlide(true)"
                        >
                            <x-icons.add/>
                        </x-action>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- slideover add/edit -->
            <x-modals.slideover>
                @if($addNewItem)
                    Crear Item
                @else
                    <x-forms.edit-items :items="$items"/>
                @endif
            </x-modals.slideover>
    </section>
</div>