<div>
    <div class=" hidden">
        <img src="{{ asset('images/clip-989.png') }}" class="mx-auto  " alt="">
        <div class=" text-center title mt-2 ">
            <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Vous n'avez aucun trajet pour le moment </h1>
        </div>
    </div>

    <div class="flex justify-around">

        <div wire:click="focus('1')" class="w-1/2 py-4 border-b-4 {{ $focus1 }} cursor-pointer text-center">
            Trajets publiés
        </div>

        <div wire:click="focus('2')" class="w-1/2 py-4 border-b-4 {{ $focus2 }} cursor-pointer text-center">
            Voyages achetés
        </div> 

    </div>

    <div class="@if ($focus_div != 1) hidden @endif">
        <h3 class="text-xl font-semibold text-white mt-4 mb-4">
            Les trajets publiés
        </h3>

        @if ($trajets)
            @foreach ($publies as $trajet)
                <a href="# "
                    class="mb-2 flex flex-col bg-white rounded-lg border-2 boder-gray-200 shadow-md  hover:bg-gray-300 ">
                    <div class="flex justify-between items-center p-4">
                        <h3 class="text-xl italic text-gray-700">
                            Publié le {{ $trajet['created_at'] }}
                        </h3>
                        <div class="flex">
                            <h3 class="pr-3 text-xl font-semibold text-gray-700"> {{ $trajet['ville_depart'] }} </h3>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-700 font-semibold  " fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    d="M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75 0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32 224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9 515.1 266.1 502.6 278.6z" />
                            </svg>
                            <h3 class="pl-3 text-xl font-semibold text-gray-700"> {{ $trajet['ville_destination'] }}
                                <span class="pl-2">pour le {{ $trajet['date'] }} à </span> <span class="pl-2">
                                    {{ $trajet['heure'] }} </span>
                            </h3>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class=" ">
                <img src="{{ asset('images/clip-989.png') }}" class="mx-auto  " alt="">
                <div class=" text-center title mt-2 ">
                    <h1 class="tracking-wider text-xl md:text-3xl font-semibold">Vous n'avez aucun trajet publié pour le
                        moment
                    </h1>
                </div>
            </div>
        @endif

    </div>

    <div class="@if ($focus_div != 2) hidden @endif">
        <h3 class="text-xl font-semibold text-white mt-4">
            Mes voyages achetés
        </h3>

        @if ($voyages)
            @foreach ($voyages as $trajet)
                <a href="{{url("trajet_achete/". $trajet['id']."/". $trajet['V_id']."/")}}"
                    class="mb-2 flex flex-col bg-white rounded-lg border shadow-lg  hover:bg-gray-100 ">
                   {{--  <div class="flex justify-between p-4 ">
                        <div class="flex-col ">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">
                                {{ $trajet['ville_depart'] }} -
                                {{ $trajet['ville_destination'] }} &nbsp; pour le {{ $trajet['date'] }}  à {{ $trajet['heure'] }}
                            </h5>
                            <div class="flex mt-4">
                                <img id="avatarButton" class=" w-10 h-10 rounded-full cursor-pointer"
                                    src="{{ $trajet['user_photo'] }}" alt="profile image">

                                <h5 class="pt-1 pl-4 text-md font-semibold text-gray-900 "> {{ $trajet['user_name'] }}
                                </h5>

                            </div>
                        </div>
                        <div class="">
                            <p class="mb-3 font-bold text-gray-900 ">{{ $trajet['prix'] }} FDJ</p>
                        </div>
                    </div> --}}

                    <div class="flex justify-between items-center p-4">
                        <h3 class="text-xl italic text-gray-700">
                            Achété le {{ $trajet['date_achat'] }}
                        </h3>
                        <div class="flex">
                            <h3 class="pr-3 text-xl font-semibold text-gray-700"> {{ $trajet['ville_depart'] }} </h3>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-700 font-semibold  " fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    d="M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75 0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32 224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9 515.1 266.1 502.6 278.6z" />
                            </svg>
                            <h3 class="pl-3 text-xl font-semibold text-gray-700"> {{ $trajet['ville_destination'] }}
                                <span class="pl-2">pour le {{ $trajet['date'] }} à </span> <span class="pl-2">
                                    {{ $trajet['heure'] }} </span>
                            </h3>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class=" ">
                <img src="{{ asset('images/clip-989.png') }}" class="mx-auto  " alt="">
                <div class=" text-center title mt-2 ">
                    <h1 class="tracking-wider text-xl md:text-3xl font-semibold">
                        Vous n'avez aucun trajet achétés pour le
                        moment
                    </h1>
                </div>
            </div>
        @endif

    </div>

</div>
