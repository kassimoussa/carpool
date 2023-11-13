<div>
    <div class="mx-auto px-3 w-2/3" x-data="{ marquem: false, modelm: false, typem: false, couleurm: false, anneem: false, plaquem: false }">

        <a href="/profil"
            class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">

            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                    d="M512 256C512 273.7 497.7 288 480 288H160.1l0 72c0 9.547-5.66 18.19-14.42 22c-8.754 3.812-18.95 2.077-25.94-4.407l-112.1-104c-10.24-9.5-10.24-25.69 0-35.19l112.1-104c6.992-6.484 17.18-8.218 25.94-4.406C154.4 133.8 160.1 142.5 160.1 151.1L160.1 224H480C497.7 224 512 238.3 512 256z" />
            </svg>
        </a>

        <h2 class="text-center text-xl md:text-3xl font-bold  mt-2 mb-4">
            Information de la voiture
        </h2>


        <div class="flex flex-col hover:bg-gray-300 px-4 py-2  cursor-pointer mb-2" type="button"
            x-on:click="marquem = true">
            <h3 class="text-md text-gray-600 font-semibold">Marque</h3>
            <h3 class="text-lg text-blue-600 font-bold"> {{ $marque }} </h3>
        </div>

        <div x-show="marquem" x-on:keydown.escape.window="marquem = false" x-show.delay.500ms="marquem"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="marquem = false">
                <div x-show="marquem" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="marquem = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Marque</h3>
                    <div class="space-y-6">
                        <div class="space-y-6">
                            <div>
                                <input type="text" wire:model="marque2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <button wire:click="save" x-on:click="marquem = false"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-300 px-4 py-2 cursor-pointer mb-2" type="button"
            x-on:click="modelm = true">
            <h3 class="text-md text-gray-600 font-semibold">Model</h3>
            <h3 class="text-lg text-blue-600 font-bold"> {{ $model }} </h3>
        </div>

        <div x-show="modelm" x-on:keydown.escape.window="modelm = false" x-show.delay.500ms="modelm"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="modelm = false">
                <div x-show="modelm" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="modelm = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Model</h3>
                    <div class="space-y-6">
                        <div class="space-y-6">
                            <div>
                                <input type="text" wire:model="model2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <button wire:click="save" x-on:click="modelm = false"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-300 px-4 py-2 cursor-pointer mb-2" type="button"
            x-on:click="typem = true">
            <h3 class="text-md text-gray-600 font-semibold">Type</h3>
            <h3 class="text-lg text-blue-600 font-bold"> {{ $type }} </h3>
        </div>

        <div x-show="typem" x-on:keydown.escape.window="typem = false" x-show.delay.500ms="typem"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="typem = false">
                <div x-show="typem" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="typem = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Type</h3>
                    <div class="space-y-6">
                        <div class="space-y-6">
                            <div class="" x-data="{ typ: false }">
                                <label x-on:click="typ = true"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer">
                                    {{ $type2 }}
                                </label>

                                <div x-show="typ" x-on:keydown.escape.window="typ = false"
                                    x-show.delay.500ms="typ"
                                    class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
                                    <div class="fixed inset-0 transform" x-on:click="typ = false">
                                        <div x-show="typ" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
                                    </div>
                                    <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            x-on:click="typ = false" wire:click="close_modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="py-6 px-6 lg:px-8 ">
                                            <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Type
                                            </h3>
                                            <div class="space-y-6">
                                                <div class=" overflow-y-auto h-64">
                                                    @foreach ($types as $typ)
                                                        <div type="button"
                                                            class="flex justify-between mb-2  hover:bg-gray-100   p-2 @if ($typ->nom == $type2) border border-2 border-blue-500 @endif">
                                                            <div class="flex">
                                                                <label for="{{ $typ->nom }}"
                                                                    x-on:click="typ = false"
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">
                                                                    {{ $typ->nom }}
                                                                </label>
                                                            </div>
                                                            <input id="{{ $typ->nom }}" type="radio"
                                                                value="{{ $typ->nom }}" wire:model="type2"
                                                                class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button wire:click="save" x-on:click="typem = false"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-300 px-4 py-2 cursor-pointer mb-2" type="button"
            x-on:click="couleurm = true">
            <h3 class="text-md text-gray-600 font-semibold">Couleur</h3>
            <h3 class="text-lg text-blue-600 font-bold"> {{ $couleur }} </h3>
        </div>

        <div x-show="couleurm" x-on:keydown.escape.window="couleurm = false" x-show.delay.500ms="couleurm"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="couleurm = false">
                <div x-show="couleurm" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="couleurm = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Couleur</h3>
                    <div class="space-y-6">
                        <div class=" overflow-y-auto" x-data="{ color: false }">
                            <div type="button" x-on:click="color = true"
                                class="flex  mb-2  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer ">
                                <div
                                    class="w-5 h-5 rounded-full @if ($couleur2 == 'Blanc') ring ring-1 ring-black @endif bg-[#{{ $hexcode2 }}] mr-2">
                                </div>
                                <label
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">
                                    {{ $couleur2 }}
                                </label>
                            </div>
                            <div x-show="color" x-on:keydown.escape.window="color = false"
                                x-show.delay.500ms="color"
                                class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
                                <div class="fixed inset-0 transform" x-on:click="color = false">
                                    <div x-show="color" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
                                </div>
                                <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        x-on:click="color = false" wire:click="close_modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="py-6 px-6 lg:px-8 ">
                                        <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Couleur
                                        </h3>
                                        <div class="space-y-6">
                                            <div class=" overflow-y-auto h-64">
                                                @foreach ($colors as $color)
                                                    <div type="button"
                                                        class="flex justify-between mb-2  hover:bg-gray-100   p-2 @if ($color->nom == $couleur2) border border-2 border-blue-500 @endif">
                                                        <div class="flex">
                                                            <div
                                                                class="w-5 h-5 rounded-full @if ($color->nom == 'Blanc') ring ring-1 ring-black @endif bg-[#{{ $color->hexcode }}] mr-2">
                                                            </div>
                                                            <label for="{{ $color->nom }}"
                                                                wire:click="change_hexcode('{{ $color->hexcode }}')"
                                                                x-on:click="color = false"
                                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">
                                                                {{ $color->nom }}
                                                            </label>
                                                        </div>
                                                        <input id="{{ $color->nom }}" type="radio"
                                                            value="{{ $color->nom }}" wire:model="couleur2"
                                                            class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button wire:click="save" x-on:click="couleurm = false"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Enregistrer
                        </button>

                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-300 px-4 py-2 cursor-pointer mb-2" type="button"
            x-on:click="anneem = true">
            <h3 class="text-md text-gray-600 font-semibold">Année</h3>
            <h3 class="text-lg text-blue-600 font-bold"> {{ $annee }} </h3>
        </div>

        <div x-show="anneem" x-on:keydown.escape.window="anneem = false" x-show.delay.500ms="anneem"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="anneem = false">
                <div x-show="anneem" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="anneem = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Année</h3>
                    <div class="space-y-6">
                        <div class="space-y-6">
                            <div>
                                <input type="number" wire:model="annee2" min="1990" max="2022"
                                    step="1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <button wire:click="save" x-on:click="anneem = false"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-300 px-4 py-2 cursor-pointer mb-2" type="button"
            x-on:click="plaquem = true">
            <h3 class="text-md text-gray-600 font-semibold">Plaque</h3>
            <h3 class="text-lg text-blue-600 font-bold mb-2"> {{ $plaque }} </h3>
        </div>

        <div x-show="plaquem" x-on:keydown.escape.window="plaquem = false" x-show.delay.500ms="plaquem"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="plaquem = false">
                <div x-show="plaquem" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  dark:bg-gray-700 ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="plaquem = false" wire:click="close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Plaque</h3>
                    <div class="space-y-6">
                        <div class="space-y-6">
                            <div>
                                <input type="text" wire:model="plaque2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <button wire:click="save" x-on:click="plaquem = false"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-2 border-b border-gray-400"></div>

        <div class=" p-2 hover:bg-gray-300 mb-4 cursor-pointer">
            <a wire:click="delete_car" class="flex  hover:text-blue-700 hover:underline">
                <svg aria-hidden="true" class="w-5 h-5 text-red-500" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z" />
                </svg>
                <h3 class="pl-3 text-md text-blue-500  font-semibold"> Supprimer la voiture</h3>
            </a>
        </div>

    </div>

</div>
