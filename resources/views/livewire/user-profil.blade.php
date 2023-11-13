<div>
    <div class=" border-b-2 border-gray-200 ">
        <div class="  block p-5 flex justify-between mt-2 mb-4">
            <div>
                <h1 class="text-xl md:text-2xl font-bold">{{ $user['name'] }} </h1>
                <h3 class="text-md font-semibold mt-1"> {{ $user['age'] . ' ans' }}</h3>
            </div>

            <img type="button" src="{{ asset($user['photo']) }}" alt="profile image" class="w-20 h-20 rounded-full ">
        </div>
    </div>

    <div class=" mt-6 ">
        <h1 class="pl-5 text-lg md:text-2xl text-gray-800 font-bold ">Préférences de voyage</h1>

        @if ($user['pbool'])
            @if ($user['discussion'])
                <div class="flex pl-8 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M416 176C416 78.8 322.9 0 208 0S0 78.8 0 176c0 39.57 15.62 75.96 41.67 105.4c-16.39 32.76-39.23 57.32-39.59 57.68c-2.1 2.205-2.67 5.475-1.441 8.354C1.9 350.3 4.602 352 7.66 352c38.35 0 70.76-11.12 95.74-24.04C134.2 343.1 169.8 352 208 352C322.9 352 416 273.2 416 176zM599.6 443.7C624.8 413.9 640 376.6 640 336C640 238.8 554 160 448 160c-.3145 0-.6191 .041-.9336 .043C447.5 165.3 448 170.6 448 176c0 98.62-79.68 181.2-186.1 202.5C282.7 455.1 357.1 512 448 512c33.69 0 65.32-8.008 92.85-21.98C565.2 502 596.1 512 632.3 512c3.059 0 5.76-1.725 7.02-4.605c1.229-2.879 .6582-6.148-1.441-8.354C637.6 498.7 615.9 475.3 599.6 443.7z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600"> {{ $user['discussion'] }} </h3>
                </div>
            @endif

            @if ($user['musique'])
                <div class="flex pl-8 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M511.1 367.1c0 44.18-42.98 80-95.1 80s-95.1-35.82-95.1-79.1c0-44.18 42.98-79.1 95.1-79.1c11.28 0 21.95 1.92 32.01 4.898V148.1L192 224l-.0023 208.1C191.1 476.2 149 512 95.1 512S0 476.2 0 432c0-44.18 42.98-79.1 95.1-79.1c11.28 0 21.95 1.92 32 4.898V126.5c0-12.97 10.06-26.63 22.41-30.52l319.1-94.49C472.1 .6615 477.3 0 480 0c17.66 0 31.97 14.34 32 31.99L511.1 367.1z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600"> {{ $user['musique'] }} </h3>
                </div>
            @endif

            @if ($user['cigarette'])
                <div class="flex pl-8 mt-4 p-3">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-600  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M432 352h-384C21.5 352 0 373.5 0 400v64C0 490.5 21.5 512 48 512h384c8.75 0 16-7.25 16-16v-128C448 359.3 440.8 352 432 352zM400 464H224v-64h176V464zM536 352h-48C483.6 352 480 355.6 480 360v144c0 4.375 3.625 8 8 8h48c4.375 0 8-3.625 8-8v-144C544 355.6 540.4 352 536 352zM632 352h-48C579.6 352 576 355.6 576 360v144c0 4.375 3.625 8 8 8h48c4.375 0 8-3.625 8-8v-144C640 355.6 636.4 352 632 352zM553.3 87.13C547.6 83.25 544 77.12 544 70.25V8C544 3.625 540.4 0 536 0h-48C483.6 0 480 3.625 480 8v62.25c0 22 10.25 43.5 28.62 55.5C550.8 153 576 199.5 576 249.8V280C576 284.4 579.6 288 584 288h48C636.4 288 640 284.4 640 280V249.8C640 184.3 607.6 123.5 553.3 87.13zM487.8 141.6C463.8 125 448 99.25 448 70.25V8C448 3.625 444.4 0 440 0h-48C387.6 0 384 3.625 384 8v66.38C384 118.1 408.6 156 444.3 181.1C466.8 196.8 480 222.3 480 249.8V280C480 284.4 483.6 288 488 288h48C540.4 288 544 284.4 544 280V249.8C544 206.4 523 166.3 487.8 141.6z" />
                    </svg>
                    <h3 class="pl-3 text-md text-gray-600">{{ $user['cigarette'] }} </h3>
                </div>
            @endif

        @else
            <div class="flex py-3">
                <h3 class="pl-8 text-md text-gray-600"> Aucune préférence indiquée </h3>
            </div>
        @endif



    </div>
</div>
