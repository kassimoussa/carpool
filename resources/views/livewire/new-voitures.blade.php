<div>
    <div class="mx-auto px-3 w-2/3" x-data="{ discussion: false, musique: false, cigarette: false }">

        <a href="/profil"
            class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">

            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                    d="M512 256C512 273.7 497.7 288 480 288H160.1l0 72c0 9.547-5.66 18.19-14.42 22c-8.754 3.812-18.95 2.077-25.94-4.407l-112.1-104c-10.24-9.5-10.24-25.69 0-35.19l112.1-104c6.992-6.484 17.18-8.218 25.94-4.406C154.4 133.8 160.1 142.5 160.1 151.1L160.1 224H480C497.7 224 512 238.3 512 256z" />
            </svg>
        </a>

        <h2 class="text-center text-xl md:text-3xl font-bold mt-4 mb-8">
            Ajout d'une voiture
        </h2>



        <form wire:submit.prevent="add_car">

            <div class="@if ($currentStep != 1) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="marque" class="block mb-2 text-sm font-medium  ">
                        Marque <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="marque" wire:model="marque"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ex: Nissan " required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('marque')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>

            <div class="@if ($currentStep != 2) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="model" class="block mb-2 text-sm font-medium  ">
                        Model <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="model" wire:model="model"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ex: Alto " required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('model')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>

            <div class="@if ($currentStep != 3) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="type" class="block mb-2 text-sm font-medium  ">
                        Type <span class="text-red-500">*</span>
                    </label>
                    <div class=" overflow-y-auto h-64">
                        @foreach ($types as $typ)
                            <label for="{{ $typ->id }}"
                                class="flex justify-between hover:bg-gray-300 p-2 items-center cursor-pointer mb-2">
                                <div class="flex flex-col">
                                    <h3 class="text-lg text-gray-800 font-semibold "> {{ $typ->nom }} </h3>
                                </div>
                                <input id="{{ $typ->id }}" type="radio" value="{{ $typ->nom }}"
                                    wire:model="type"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </label>
                        @endforeach
                    </div>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('type')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>

            <div class="@if ($currentStep != 4) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="type" class="block mb-2 text-sm font-medium  ">
                        Couleur <span class="text-red-500">*</span>
                    </label>
                    <div class=" overflow-y-auto h-64">
                        @foreach ($colors as $color)
                            <div type="button" class="flex justify-between mb-2  hover:bg-gray-100   p-2 " 
                            wire:click="change_hexcode('{{ $color->hexcode }}')" >

                                <div class="flex">
                                    <div
                                        class="w-5 h-5 rounded-full @if ($color->nom == 'Blanc') ring ring-1 ring-black @endif bg-[#{{ $color->hexcode }}] mr-2">
                                    </div>
                                    <label for="{{ $color->nom }}"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">
                                        {{ $color->nom }}
                                    </label>
                                </div>
                                <input id="{{ $color->nom }}" type="radio" value="{{ $color->nom }}"
                                    wire:model="couleur"
                                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('couleur')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>

            <div class="@if ($currentStep != 5) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="annee" class="block mb-2 text-sm font-medium  ">
                        Annee <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="annee" wire:model="annee" min="1990" max="2022" step="1"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ex: 2015 " required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('annee')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>

            <div class="@if ($currentStep != 6) hidden @endif container mx-auto w-full  mb-4">
                <div class="relative ">
                    <label for="plaque" class="block mb-2 text-sm font-medium  ">
                        Plaque d'immatriculation <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="plaque" wire:model="plaque"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ex: 123D45 " required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('plaque')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

            </div>



            <div class="container mx-auto w-full ">
                <div class="flex @if ($currentStep == 1) justify-end @else justify-between @endif ">
                    @if ($currentStep >= 2)
                        <button type="button" wire:click="step_decrement"
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                            RETOUR
                        </button>
                    @endif

                    @if ($currentStep != 6)
                        <button type="button" wire:click="step_increment"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            SUIVANT
                        </button>
                    @endif

                    @if ($currentStep == 6)
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            ENREGISTRER
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
