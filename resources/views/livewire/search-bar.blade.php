<div>
    <div class="relative flex flex-col md:flex-row justify-center lg:w-3/4 mx-auto mt-4 ">
        {{-- <div class=" relative ">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-900 " fill="currentColor" aria-hidden="false">
                    <title>Départ</title>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                        fill="#708C91"></path>
                </svg>
            </div>
            <input type="text" id="input-group-1"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-md rounded-t-lg md:rounded-l-lg md:rounded-tr-none  focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Départ">
        </div> --}}
        <input autocomplete="false" name="hidden" type="text" style="display:none;">

        <div class="relative " x-data="{ vDepart: true, vdp: '' }" @click.away="vDepart = false">
            <div class=" relative ">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" aria-hidden="false">
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
                    class=" @error('ville_depart') {{ $errorColor }} @enderror h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-t-lg md:rounded-l-lg md:rounded-tr-none   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ville de départ">
            </div>
            @if (strlen($ville_depart) >= 1)
                <div class="z-50 absolute bg-gray-100 border border-gray-300 rounded  w-full mt-2 " x-show.transition.opacity="vDepart">
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

        {{-- <div class="relative ">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" aria-hidden="false">
                    <title>Départ</title>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                        fill="#708C91"></path>
                </svg>
            </div>
            <input type="text" id="input-group-1"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Destination">
        </div> --}}

        <div class="relative " x-data="{ vDestination: true, vdt: '' }" @click.away="vDestination = false">
            <div class=" relative ">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" aria-hidden="false">
                        <title>Destination</title>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                            fill="#708C91"></path>
                    </svg>
                </div>
                <input type="text" id="input-group-1" wire:model="ville_destination" x-model="vdt" x-ref="vdt"
                    autocomplete="off"
                    @keydown.window="
                        if (event.keyCode === 191) {
                            event.preventDefault();
                            $refs.vdt.focus();
                        }
                    "
                    @keydown="vDestination = true" @keydown.escape.window="vDestination = false"
                    @keydown.shift.tab="vDestination = false" @focus="vDestination = true" required
                    class=" @error('ville_destination') {{ $errorColor }} @enderror h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-none   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ville de destination">
            </div>
            @if (strlen($ville_destination) >= 1)
                <div class="z-50 absolute bg-gray-100 border border-gray-300 rounded  w-full mt-2 " x-show.transition.opacity="vDestination">
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

        <div class="flex ">

            <div class="relative w-4/5  md:w-3/4  "> 
                <input  type="date" wire:model="date" min='{{ $audj }}' max='2099-12-31' required
                    class="@error('date') {{ $errorColor }} @enderror h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Audjourd'hui">
            </div>

            <div class="relative w-1/5 md:w-1/4 " x-data="{ open: false }">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" />
                    </svg>
                </div>
                <button type="button" @click="open = true" 
                    class="h-16 bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg font-semibold rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $count }} </button>
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
                            <h2 class="font-bold mr-2">{{ $count }} </h2>
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
        </div>

        <div class="relative ">
            <div class="flex absolute inset-y-0 right-0 items-center pr-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white " fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
                </svg>
            </div>
            <button id="input-group-1" type="button" wire:click="research"
                class="h-16 bg-blue-700 hover:bg-blue-800 border border-blue-700  text-white text-sm md:text-lg font-bold focus:ring-blue-300 focus:border-blue-500 rounded-b-lg md:rounded-r-lg md:rounded-bl-none block w-full pr-10 p-4 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                RECHERCHER </button>
        </div>
    </div>


     
    @if ($hidden == 'show')
        <div class=" mx-auto md:w-3/4 mt-8">
            @if (!empty($trajets) && $trajets->count())
                <div class="text-2xl font-bold mb-4">
                    @if ($date == $date_today) 
                        Audjourd'hui
                    @else 
                        Le {{ \Carbon\Carbon::parse($date)->locale('fr_FR')->isoFormat('LL');}}
                    @endif  
                </div>
                
                @foreach ($collectTrajets as $trajet)
                    <a href="{{url("achat_trajet/". $trajet['id']."/". $count)}}" target="_blank"
                        class="mb-2 flex flex-col bg-white rounded-lg border shadow-lg  hover:bg-gray-100 ">
                        <div class="flex justify-between p-4 ">
                            <div class="flex-col ">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">
                                    {{ $trajet['ville_depart'] }} -
                                    {{ $trajet['ville_destination'] }} à {{ $trajet['heure']   }}
                                </h5>
                                <div class="flex mt-4">
                                    <img id="avatarButton"  class=" w-10 h-10 rounded-full cursor-pointer"
                                    src="{{ $trajet['user_photo'] }}" alt="profile image">

                                    <h5 class="pt-1 pl-4 text-md font-semibold text-gray-900 "> {{ $trajet['user_name'] }}
                                    </h5>

                                </div>
                            </div>
                            <div class="">
                                <p class="mb-3 font-bold text-gray-900 ">{{ $trajet['prix'] }} FDJ</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div
                    class="flex flex-col bg-white rounded-lg border shadow-md  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <h5 class="pt-4 px-4 py-8 pl-4 text-md font-semibold text-gray-900 "> 
                        Pas de voyage pour ce trajet !!
                    </h5>

                </div>
            @endif

        </div>
    @endif


   

</div>
