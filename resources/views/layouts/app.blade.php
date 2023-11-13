@php
use App\Models\User;
if (Session::has('id')) {
    $user = User::where('id', session('id'))->first();
    if ($user->image_path != null) {
        $image = 'storage/' . $user->image_path;
    } else {
        $profil = 'false';
        $image = 'https://ui-avatars.com/api/?size=235&name=' . $user['name'];
    }
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('js/tailwind3.1.8.js') }}"></script>
    @livewireStyles
    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"  ></script> --}}
    <script src="{{ asset('js/alpinejs.min.js') }}"></script>

</head>

<body class="font-sans bg-white text-gray-700">
    <nav class="border-b border-gray-100 bg-gray-100 px-2 sm:px-4 py-2.5  fixed w-full z-20 top-0 left-0 ">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="/" class="flex items-center">
                <i class="fas fa-car fa-xl"><span class=" "> COVO</span> </i>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4  md:flex-row md:space-x-8 md:mt-0 md:text-md md:font-medium    ">
                    <li>
                        <a href="{{ url('/') }}" class="block py-2  hover:text-gray-300">Rechercher</a>
                    </li>
                    <li>
                        <a href="{{ url('new-trajet') }}" class="block py-2  hover:text-gray-300">Nouveau Trajet</a>
                    </li>
                    {{-- <li>
                        <a href="{{ url('test') }}" class="block py-2  hover:text-gray-300">TEST</a>
                    </li> --}}
                    <li>
                        <div class="md:ml-4 mt-4 md:mt-0">
                            <!-- Dropdown menu -->
                            @if (Session::has('id'))
                                <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                                    data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer"
                                    src="{{ asset($image) }}" alt="profile image">
                                <div id="userDropdown"
                                    class="hidden z-10 w-50 bg-gray-100 rounded divide-y divide-gray-300 shadow ">
                                    <div class="py-3 px-4 text-sm text-gray-500 ">
                                        <div>{{ $user->name }} </div>
                                        <div class="font-medium truncate">{{ $user->email }}</div>
                                    </div>
                                    <ul class="py-1 text-sm text-gray-500"
                                        aria-labelledby="avatarButton">
                                        <li>
                                            <a href="{{ url('vos_trajets') }}"
                                                class="block py-2 px-4 hover:bg-gray-500 hover:text-gray-100">
                                                Mes Trajets</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('profil') }}"
                                                class="block py-2 px-4 hover:bg-gray-500 hover:text-gray-100">
                                                Profil
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="{{ url('logout') }}"
                                            class="block py-2 px-4 text-sm hover:bg-gray-500 hover:text-gray-100">
                                            Se Déconnecter
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div type="button" data-dropdown-toggle="userDropdown"
                                    data-dropdown-placement="bottom-start"
                                    class="overflow-hidden relative w-10 h-10 bg-gray-50 rounded-full dark:bg-gray-600">
                                    <svg class="absolute -left-1 w-12 h-12 text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>

                                <div id="userDropdown"
                                    class="hidden z-10 w-44 bg-gray-100 rounded divide-y divide-gray-100 shadow ">
                                    <ul class="py-1 text-md text-gray-500 "
                                        aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="{{ url('login') }}"
                                                class="block py-2 px-4 hover:bg-gray-500 hover:text-gray-100">Connexion</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('register') }}"
                                                class="block py-2 px-4 hover:bg-gray-500 hover:text-gray-100">Inscription</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class="mt-20">
    @yield('content')

</div>
    @livewireScripts
    @yield('script')
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.selectpicker').select2();
        });
    </script> --}}
</body>

</html>
