@extends('layouts.app', ['title' => 'COVO - Profil '])
@section('content')
    <div class="container mx-auto w-2/4   pt-2">
        <div class="  block p-5 flex justify-between hover:bg-gray-300  ">
            <div>
                <h1 class="text-xl md:text-3xl font-bold">{{ session('name') }} </h1>
                <h3 class="text-md font-semibold"> Débutant</h3>
            </div>

            <img type="button" src="{{ session('image') }}" alt="profile image" class="w-20 h-20 rounded-full ">
        </div>

        <div class="block p-2 hover:bg-gray-300 mt-3">
            @if (Session::get('profil'))
                <div>
                    <a href="{{ url('profil/photo') }}" class="flex pl-2 hover:text-blue-600 hover:underline">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-500  " fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z" />
                        </svg>
                        <h3 class="pl-3 text-sm text-blue-400  font-semibold"> Ajouter une photo de profil</h3>
                    </a>
                </div>
            @else
                <div>
                    <a href="{{ url('profil/photo') }}" class="flex pl-2 hover:text-blue-600 hover:underline">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-500  " fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path
                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z" />
                        </svg>
                        <h3 class="pl-3 text-md text-blue-800  font-semibold"> Changer de photo de profil</h3>
                    </a>
                </div>
            @endif
        </div>

        <div class="pl-2 block p-2 hover:bg-gray-300 mt-4  mb-4 rounded">
            <a href="{{ url('profil/infos_perso') }}" class="flex pl-2 hover:text-blue-600 hover:underline">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-500  " fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path
                        d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                </svg>

                <h3 class="pl-3 text-md text-blue-800  font-semibold "> Modifier les informations personnels</h3>
            </a>

        </div>

        <div class="mb-4 border-b-4 border-gray-500"></div>

        <div class="pl-2 border-b-2 border-gray-500 mt-6 ">
            <h1 class="pl-2 text-lg md:text-2xl text-gray-800 font-bold ">Préférences de voyage</h1>

            @if ($prefs->discussion)
                <div class="flex pl-4 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M416 176C416 78.8 322.9 0 208 0S0 78.8 0 176c0 39.57 15.62 75.96 41.67 105.4c-16.39 32.76-39.23 57.32-39.59 57.68c-2.1 2.205-2.67 5.475-1.441 8.354C1.9 350.3 4.602 352 7.66 352c38.35 0 70.76-11.12 95.74-24.04C134.2 343.1 169.8 352 208 352C322.9 352 416 273.2 416 176zM599.6 443.7C624.8 413.9 640 376.6 640 336C640 238.8 554 160 448 160c-.3145 0-.6191 .041-.9336 .043C447.5 165.3 448 170.6 448 176c0 98.62-79.68 181.2-186.1 202.5C282.7 455.1 357.1 512 448 512c33.69 0 65.32-8.008 92.85-21.98C565.2 502 596.1 512 632.3 512c3.059 0 5.76-1.725 7.02-4.605c1.229-2.879 .6582-6.148-1.441-8.354C637.6 498.7 615.9 475.3 599.6 443.7z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600"> {{ $prefs->discussion }} </h3>
                </div>
            @endif

            @if ($prefs->musique)
                <div class="flex pl-4 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M511.1 367.1c0 44.18-42.98 80-95.1 80s-95.1-35.82-95.1-79.1c0-44.18 42.98-79.1 95.1-79.1c11.28 0 21.95 1.92 32.01 4.898V148.1L192 224l-.0023 208.1C191.1 476.2 149 512 95.1 512S0 476.2 0 432c0-44.18 42.98-79.1 95.1-79.1c11.28 0 21.95 1.92 32 4.898V126.5c0-12.97 10.06-26.63 22.41-30.52l319.1-94.49C472.1 .6615 477.3 0 480 0c17.66 0 31.97 14.34 32 31.99L511.1 367.1z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600"> {{ $prefs->musique }} </h3>
                </div>
            @endif

            @if ($prefs->cigarette)
                <div class="flex pl-4 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M432 352h-384C21.5 352 0 373.5 0 400v64C0 490.5 21.5 512 48 512h384c8.75 0 16-7.25 16-16v-128C448 359.3 440.8 352 432 352zM400 464H224v-64h176V464zM536 352h-48C483.6 352 480 355.6 480 360v144c0 4.375 3.625 8 8 8h48c4.375 0 8-3.625 8-8v-144C544 355.6 540.4 352 536 352zM632 352h-48C579.6 352 576 355.6 576 360v144c0 4.375 3.625 8 8 8h48c4.375 0 8-3.625 8-8v-144C640 355.6 636.4 352 632 352zM553.3 87.13C547.6 83.25 544 77.12 544 70.25V8C544 3.625 540.4 0 536 0h-48C483.6 0 480 3.625 480 8v62.25c0 22 10.25 43.5 28.62 55.5C550.8 153 576 199.5 576 249.8V280C576 284.4 579.6 288 584 288h48C636.4 288 640 284.4 640 280V249.8C640 184.3 607.6 123.5 553.3 87.13zM487.8 141.6C463.8 125 448 99.25 448 70.25V8C448 3.625 444.4 0 440 0h-48C387.6 0 384 3.625 384 8v66.38C384 118.1 408.6 156 444.3 181.1C466.8 196.8 480 222.3 480 249.8V280C480 284.4 483.6 288 488 288h48C540.4 288 544 284.4 544 280V249.8C544 206.4 523 166.3 487.8 141.6z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600"> {{ $prefs->cigarette }} </h3>
                </div>
            @endif


            <div class=" block p-2 hover:bg-gray-300 mt-4 mb-4">
                <a href="{{ url('profil/preferences') }}" class="flex  hover:text-blue-600 hover:underline">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z" />
                    </svg>
                    <h3 class="pl-3 text-md text-blue-800  font-semibold"> {{ $boul }} </h3>
                </a>
            </div>
        </div>

        <div class="pl-2 mt-6 mb-6">
            <h1 class="pl-2 text-lg md:text-2xl text-gray-800 font-bold mb-4">Véhicules</h1>

            @foreach ($voitures as $voiture)
                <a href="{{ url('profil/voiture_infos', $voiture) }}" class=" block p-2 hover:bg-gray-300 mb-2" >
                    <h3 class="pl-3 text-lg text-gray-800 font-semibold "> {{ $voiture->marque }} {{ $voiture->model }}</h3>
                    <h3 class="pl-3 text-md text-gray-600 font-normal"> {{ $voiture->couleur }}</h3>
                </a>
            @endforeach

            <div class=" block p-2 hover:bg-gray-300 mt-4">
                <a href="{{ url('profil/new_voiture') }}" class="flex  hover:text-blue-600 hover:underline">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z" />
                    </svg>
                    <h3 class="pl-3 text-md text-blue-800  font-semibold"> Ajouter un véhicule</h3>
                </a>
            </div>
        </div>

    </div>
@endsection
