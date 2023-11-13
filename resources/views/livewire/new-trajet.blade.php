<div>
    <form wire:submit.register.prevent="save" {{-- action="{{ url('/fiche/store') }}" --}} role="form" method="post">
        @csrf

        {{-- @if ($currentStep == 1) --}}
        <div class="@if ($currentStep != 1) hidden @endif container mx-auto w-full md:w-1/2 mb-4">
            <div class="text-center title mt-2 ">
                <h1 class="tracking-wider text-xl md:text-3xl font-semibold">D'ôu partez-vous ?</h1>
            </div>
            <div class="flex mt-4">
                <div class="relative w-full" x-data="{ vDepart: true, vdp: '' }" @click.away="vDepart = false">
                    <div class=" relative ">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-700 dark:text-gray-400" fill="currentColor"
                                aria-hidden="false">
                                <title>Départ</title>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                                    fill="#708C91"></path>
                            </svg>
                        </div>
                        <input type="text" id="input-group-1" wire:model="ville_depart" x-model="vdp" x-ref="vdp"
                            autocomplete="off"
                            @keydown.window="
                                if (event.keyCode === 191) {
                                    event.preventDefault();
                                    $refs.vdp.focus();
                                }
                            "
                            @keydown="vDepart = true" @keydown.escape.window="vDepart = false"
                            @keydown.shift.tab="vDepart = false" @focus="vDepart = true" required
                            class=" @error('ville_depart') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ville de départ">
                    </div>
                    @if (strlen($ville_depart) >= 1)
                        <div class="z-50 absolute bg-gray-100 border border-gray-300 rounded  w-full mt-4 "
                            x-show.transition.opacity="vDepart">
                            @if (!empty($ville_departs) && $ville_departs->count())
                                <ul>
                                    @foreach ($ville_departs as $ville)
                                        <li wire:click="select_vdp('{{ $ville->nom_ville }}')"
                                            x-on:click="vdp ='{{ $ville->nom_ville }}'" @click="vDepart=false"
                                            class="rounded text-gray-500 text-sm md:text-lg block p-2  hover:bg-gray-500 hover:text-gray-100">
                                            {{ $ville->nom_ville }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif
                </div>


              {{--   <div class="w-1/2">
                    <div class=" relative ">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-white-400" fill="currentColor"
                                aria-hidden="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z" />
                            </svg>
                        </div>
                        <input type="text" id="input-group-1" wire:model="quartier_depart" required
                            class=" @error('quartier_depart') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-r-lg   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Quartier ou lieu précis">
                    </div>
                </div> --}}
            </div>

        </div>
        {{-- @endif --}}

        {{-- @if ($currentStep == 2) --}}
        <div class="@if ($currentStep != 2) hidden @endif container mx-auto w-full md:w-1/2 mb-4">
            <div class="text-center title mt-2 ">
                <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Ôu allez-vous ?</h1>
            </div>
            <div class="flex mt-4">
                <div class="relative w-full" x-data="{ vDestination: true, vdt: '' }" @click.away="vDestination = false">
                    <div class=" relative ">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                aria-hidden="false">
                                <title>Destination</title>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                                    fill="#708C91"></path>
                            </svg>
                        </div>
                        <input type="text" id="input-group-1" wire:model="ville_destination" x-model="vdt"
                            x-ref="vdt" autocomplete="off"
                            @keydown.window="
                                if (event.keyCode === 191) {
                                    event.preventDefault();
                                    $refs.vdt.focus();
                                }
                            "
                            @keydown="vDestination = true" @keydown.escape.window="vDestination = false"
                            @keydown.shift.tab="vDestination = false" @focus="vDestination = true" required
                            class=" @error('ville_destination') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ville de destination">
                    </div>
                    @if (strlen($ville_destination) >= 1)
                        <div class="z-50 absolute bg-gray-100 rounded  w-full mt-4 "
                            x-show.transition.opacity="vDestination">
                            @if (!empty($ville_destinations) && $ville_destinations->count())
                                <ul>
                                    @foreach ($ville_destinations as $ville)
                                        <li wire:click="select_vdt('{{ $ville->nom_ville }}')"
                                            x-on:click="vdt ='{{ $ville->nom_ville }}'" @click="vDestination=false"
                                            class="rounded text-gray-500 text-sm md:text-lg block p-2  hover:bg-gray-500 hover:text-gray-100">
                                            {{ $ville->nom_ville }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif
                </div>


                {{-- <div class="w-1/2">
                    <div class=" relative ">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-white-400" fill="currentColor"
                                aria-hidden="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z" />
                            </svg>
                        </div>
                        <input type="text" id="input-group-1" wire:model="quartier_destination" required
                            class=" @error('quartier_destination') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-r-lg   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Quartier ou lieu précis">
                    </div>
                </div> --}}
            </div>


        </div>
        {{-- @endif --}}

        {{-- @if ($currentStep == 3) --}}
        <div class="@if ($currentStep != 3) hidden @endif container mx-auto w-full md:w-1/2 mb-4">
            <div class="text-center title mt-2 ">
                <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Quand partez-vous ?</h1>
            </div>
            <div class="flex mt-4">
                <div class=" relative w-1/2">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    </div>
                    <input type="date" id="input-group-1" wire:model="date" min='{{ $audj }}'
                        max='2099-12-31' required
                        class="@error('date') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4   ">
                </div>
                <div class=" relative w-1/2">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    </div>
                    <input type="time" id="input-group-1" wire:model="heure" min='{{ $hour_today }}' required
                        class="@error('heure') {{ $errorColor }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-r-lg   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4   ">
                </div>
            </div>

        </div>
        {{-- @endif --}}

        {{-- @if ($currentStep == 4) --}}
        <div class="@if ($currentStep != 4) hidden @endif container mx-auto relative w-full md:w-1/2 mb-4"
            x-data="{ open: false }">
            <div class=" text-center title mt-2 ">
                <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Nombre de passager et prix ?</h1>
            </div>

            <div class="flex mx-auto  mt-4 ">
                <div class="relative w-1/2">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" />
                        </svg>
                    </div>
                    <button type="button" @click="open = true"
                        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg font-semibold rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  ">
                        {{ $nb_passager }} </button>
                    <div x-show="open" @click.outside="open = false" id="passager_counter"
                    class=" z-50 absolute mt-4 w-44 bg-gray-300 rounded divide-y  ">
                    <div class="flex justify-between py-3 px-4 text-sm text-gray-900 ">
                        <div class="pr-4">
                            <h2 class="text-md font-semibold"> {{ $text }} </h2>
                        </div>
                        <div class="flex justify-around  px-4">
                            <button wire:click="increment" type="button" class="mr-2">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-900 "
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z" />
                                </svg>
                            </button>
                            <h2 class="font-bold mr-2">{{ $nb_passager }} </h2>
                            <button wire:click="decrement" type="button">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-900 "
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM168 232C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H168z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                </div>
                <div class=" relative w-1/2">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    </div>
                    <input type="number" id="input-group-1" wire:model="prix"
                        class="@error('prix') {{ $errorColor }} @enderror h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-r-lg   
                                        focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4 "
                        placeholder="Le prix en FDJ">
                    {{-- <div class="flex absolute inset-y-0 right-0 items-center rounded-r-lg  pointer-events-none">
                                <span class="inline-flex items-center px-1 h-16 w-10  text-gray-900 bg-gray-200 border text-sm md:text-lg font-bold ">
                                    FDJ
                                </span>
                            </div> --}}
                </div>
            </div>
        </div>

        {{-- @endif --}}

        @if ($voitures)
        <div class="@if ($currentStep != 5) hidden @endif container mx-auto relative w-full md:w-1/2 mb-4" >
            <div class=" text-center title mt-2 mb-4">
                <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Quelle voiture allez-vous prendre ? </h1>
            </div>
               
            @foreach ( $voitures as $voiture)
                <label for="{{ $voiture->id }}" class="flex justify-between hover:bg-gray-300 p-2 items-center  mb-2">
                    <div class="flex flex-col">
                        <h3 class="text-lg text-gray-800 font-semibold "> {{ $voiture->marque }} {{ $voiture->model }}</h3>
                        <h3 class="text-md text-gray-600 font-normal"> {{ $voiture->couleur }}</h3>
                    </div> 
                    <input id="{{ $voiture->id }}" type="radio" value="{{ $voiture->id }}" wire:model="voiture_id"
                    class="w-5 h-5 text-blue-600 bg-gray-100  focus:ring-blue-500  focus:ring-2">
                </label> 
            @endforeach
            
        </div>
        @else

        @endif

        <div class="container mx-auto w-full md:w-1/2">
            <div class="flex @if ($currentStep == 1) justify-end @else justify-between @endif ">
                @if ($currentStep >= 2)
                    <button type="button" wire:click="step_decrement"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        RETOUR
                    </button>
                @endif

                @if ($currentStep != $totalStep)
                    <button type="button" wire:click="step_increment"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        SUIVANT
                    </button>
                @endif

                @if ($currentStep == $totalStep)
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        ENREGISTRER
                    </button>
                @endif
            </div>
        </div>

    </form>
</div>
