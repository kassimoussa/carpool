<div>
    <form wire:submit.prevent="save_user">
        <div class="grid gap-2 md:gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium  ">
                    Nom <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ex: Ali Moussa " required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('name') 
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>
            <div>
                <label for="birthdate" class="block mb-2 text-sm font-medium  ">
                    Date de naissance <span class="text-red-500">*</span>
                </label>
                <input type="date" id="birthdate" wire:model="birthdate" min='1900-01-01' max='{{ $audj }}'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Date de naissance" required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('birthdate')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium  ">
                    Numéro de téléphone <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="phone" wire:model="phone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="77 12 34 56" required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>
            <div class="">
                <label for="email" class="block mb-2 text-sm font-medium  ">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" wire:model="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john.doe@company.com" required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>
            <div class="">
                <label for="password" class="block mb-2 text-sm font-medium  ">
                    Mot de passe <span class="text-red-500">*</span>
                </label>
                <input type="password" id="password" wire:model="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="•••••••••" required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>
            <div class="">
                <label for="confirm_password" class="block mb-2 text-sm font-medium  ">
                    Confirmation de mot de passe <span class="text-red-500">*</span>
                </label>
                <input type="password" id="confirm_password" wire:model="confirm_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="•••••••••" required="">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>

            <div class="">
                <label for="image" class="block mb-2 text-sm font-medium  ">
                    Photo de profil
                </label>
                <input
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" type="file" wire:model="image">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </p>
            </div>

            @if ($image)
            <div class=" mx-auto"> 
                <img class="text-center w-20 h-20 rounded" src="{{ $image->temporaryUrl() }}" alt="Large avatar">
            </div>
            @endif

        </div> 
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mb-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Enregistrer
        </button>
    </form>
</div>
