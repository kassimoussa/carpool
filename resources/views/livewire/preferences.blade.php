<div>
    {{-- In work, do what you enjoy. Préférences de voyage --}}

    <div class="mx-auto px-3 md:w-2/3" x-data="{ discussion: false, musique: false, cigarette: false }">

        <a href="/profil"
            class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
             
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                    d="M512 256C512 273.7 497.7 288 480 288H160.1l0 72c0 9.547-5.66 18.19-14.42 22c-8.754 3.812-18.95 2.077-25.94-4.407l-112.1-104c-10.24-9.5-10.24-25.69 0-35.19l112.1-104c6.992-6.484 17.18-8.218 25.94-4.406C154.4 133.8 160.1 142.5 160.1 151.1L160.1 224H480C497.7 224 512 238.3 512 256z" />
            </svg> 
        </a>

        <h2 class="text-center text-xl md:text-3xl font-bold  mt-4 mb-8">
            Préférences de voyage
        </h2>

        <div class="flex flex-col hover:bg-gray-200 px-4 py-2 cursor-pointer mb-4" type="button"
            x-on:click="discussion = true" wire:click="edit">
            <h3 class="text-md text-gray-400 font-semibold">Discussion</h3>
            <h3 class="text-lg text-gray-600 font-bold">
                @if ($discussion)
                    {{ $discussion }}
                @else
                    Pas de préférences
                @endif
            </h3>
        </div>

        <div x-show="discussion" x-on:keydown.escape.window="discussion = false" x-show.delay.500ms="discussion"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="discussion = false">
                <div x-show="discussion" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="discussion = false">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Discussion</h3>
                    <div class="space-y-6">
                        <div>
                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radio1"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    J'aime bien discuter avec mes passagers
                                </label>
                                <input id="radio1" type="radio" value="J'aime bien discuter avec mes passagers"
                                    wire:model="discussion2"
                                    class="w-5 h-5 text-blue-600 bg-gray-300  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radio2"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Ca ne me gêne pas de discuter avec mes passagers
                                </label>
                                <input id="radio2" type="radio"
                                    value="Ca ne me gêne pas de discuter avec mes passagers" wire:model="discussion2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radio3"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Je roule en silence
                                </label>
                                <input id="radio3" type="radio" value="Je roule en silence"
                                    wire:model="discussion2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                        </div>
                        <button wire:click="save" x-on:click="discussion = false"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Enregistrer
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col hover:bg-gray-200 px-4 py-2 cursor-pointer mb-4" type="button"
            x-on:click="musique = true" wire:click="edit">
            <h3 class="text-md text-gray-400 font-semibold">Musique</h3>
            <h3 class="text-lg text-gray-600 font-bold">
                @if ($musique)
                    {{ $musique }}
                @else
                    Pas de préférences
                @endif
            </h3>
        </div>

        <div x-show="musique" x-on:keydown.escape.window="musique = false"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="musique = false">
                <div x-show="musique" class="absolute inset-0 bg-gray-500 opacity-75 "></div>
            </div>
            <div class="relative bg-white rounded-lg  ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="musique = false">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Musique</h3>
                    <div class="space-y-6">
                        <div>
                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiom1"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    J'aime bien écouter de la musique
                                </label>
                                <input id="radiom1" type="radio" value="J'aime bien écouter de la musique"
                                    wire:model="musique2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiom2"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    La musique ne me gêne pas
                                </label>
                                <input id="radiom2" type="radio" value="La musique ne me gêne pas"
                                    wire:model="musique2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiom3"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Je roule en silence
                                </label>
                                <input id="radiom3" type="radio" value="Je roule en silence"
                                    wire:model="musique2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                        </div>
                        <button wire:click="save" x-on:click="musique = false"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Enregistrer
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col hover:bg-gray-200 px-4 py-2 cursor-pointer mb-4" type="button"
            x-on:click="cigarette = true" wire:click="edit">
            <h3 class="text-md text-gray-400 font-semibold">Cigarette</h3>
            <h3 class="text-lg text-gray-600 font-bold">
                @if ($cigarette)
                    {{ $cigarette }}
                @else
                    Pas de préférences
                @endif
            </h3>
        </div>

        <div x-show="cigarette" x-on:keydown.escape.window="cigarette = false"
            class="fixed inset-0 overflow-y-auto overflow-x-hidden px-4 py-6 md:py-24 mx-auto z-40 w-1/2 h-full md:h-auto">
            <div class="fixed inset-0 transform" x-on:click="cigarette = false">
                <div x-show="cigarette" class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="relative bg-white rounded-lg  ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    x-on:click="cigarette = false">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8 ">
                    <h3 class="mb-4 text-xl font-medium text-blue-900 dark:text-white">Cigarette</h3>
                    <div class="space-y-6">
                        <div>
                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiof1"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Ca ne me gêne pas de voyager avec des fumeurs
                                </label>
                                <input id="radiof1" type="radio"
                                    value="Ca ne me gêne pas de voyager avec des fumeurs" wire:model="cigarette2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiof2"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Ca ne me gêne pas une pause cigarette
                                </label>
                                <input id="radiof2" type="radio" value="Ca ne me gêne pas une pause cigarette"
                                    wire:model="cigarette2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-200   p-6">
                                <label for="radiof3"
                                    class="ml-2 text-sm font-medium text-gray-900  cursor-pointer">
                                    Je ne roule pas avec des fumeurs
                                </label>
                                <input id="radiof3" type="radio" value="Je ne roule pas avec des fumeurs"
                                    wire:model="cigarette2"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>

                        </div>
                        <button wire:click="save" x-on:click="cigarette = false"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Enregistrer
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
