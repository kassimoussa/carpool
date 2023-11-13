<div>
    <form wire:submit.prevent="save_user">
        <div class="@if ($currentStep != 1) hidden @endif container mx-auto w-full md:w-2/3 mb-4">
            <div class="relative ">
                <label for="email" class="block mb-2 text-sm font-medium  ">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" wire:model="email"
                    class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ex: Ali Moussa " required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('email')
                            {{ $message }}
                        @enderror 
                    </span>
                </p>
            </div>

        </div>

        <div class="@if ($currentStep != 2) hidden @endif container mx-auto w-full md:w-2/3 mb-4">
            <div class="flex ">
                <div class="relative w-2/3">
                    <label for="name" class="block mb-2 text-sm font-medium  ">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" wire:model="name"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ex: Ali Moussa " required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

                <div class="relative w-1/3">
                    <label for="sexe" class="block mb-2 text-sm font-medium  ">
                        Sexe <span class="text-red-500">*</span>
                    </label>
                    <select wire:model.defer="sexe" required
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-- Select --</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('sexe')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>
            </div>

        </div>

        <div class="@if ($currentStep != 3) hidden @endif container mx-auto w-full md:w-2/3 mb-4">
            <div class="flex ">
                <div class="relative w-1/2">
                    <label for="birthdate" class="block mb-2 text-sm font-medium  ">
                        Date de naissance <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="birthdate" wire:model="birthdate" min='1900-01-01'
                        max='{{ $audj }}'
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Date de naissance" required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('birthdate')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

                <div class="relative w-1/2">
                    <label for="phone" class="block mb-2 text-sm font-medium  ">
                        Numéro de téléphone <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="phone" wire:model="phone"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="77 12 34 56" required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>
            </div>

        </div>

        <div class="@if ($currentStep != 4) hidden @endif container mx-auto w-full md:w-2/3 mb-4">
            <div class="flex ">
                <div class="relative w-1/2">
                    <label for="password" class="block mb-2 text-sm font-medium  ">
                        Mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" wire:model="password"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>

                <div class="relative w-1/2">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium  ">
                        Confirmation de mot de passe <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="confirm_password" wire:model="confirm_password"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required="">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">
                            @error('confirm_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </p>
                </div>
            </div>
 
        </div>

        <div class="container mx-auto w-full md:w-2/3">
            <div class="flex @if ($currentStep == 1) justify-end @else justify-between @endif ">
                @if ($currentStep >= 2)
                    <button type="button" wire:click="step_decrement"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        RETOUR
                    </button>
                @endif

                @if ($currentStep != 4)
                    <button type="button" wire:click="step_increment"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        SUIVANT
                    </button>
                @endif

                @if ($currentStep == 4)
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        ENREGISTRER
                    </button>
                @endif
            </div>
        </div>
    </form>
</div>
