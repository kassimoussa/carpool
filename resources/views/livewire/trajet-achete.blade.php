<div>
    <div class=" ">
        <div class="title mt-2 mb-8">
            <h1 class="text-center tracking-wider text-xl md:text-3xl font-bold"> Le {{ $trip['date'] }}</h1>
        </div>
    
        <div class="flex justify-between items-center py-6 border-t-4  border-gray-500">
            <h3 class="text-xl italic text-gray">
                Le trajet
            </h3>
            <div class="flex">
                <h3 class="pr-6 text-xl font-semibold text-gray"> {{ $trip['ville_depart'] }} </h3>
                <svg aria-hidden="true" class="w-8 h-8 text-gray font-semibold  " fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path
                        d="M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75 0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32 224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9 515.1 266.1 502.6 278.6z" />
                </svg>
                <h3 class="pl-6 text-xl font-semibold text-gray"> {{ $trip['ville_destination'] }}
                    <span class="pl-4"> à </span> <span class="pl-4"> {{ $trip['heure'] }} </span>
                </h3>
            </div>
        </div>
    
        <div class="flex py-6 justify-between items-center border-t-4 border-b-4  border-gray-500 ">
            <h3 class="text-xl italic text-gray-">
                <span class=""> Prix total pour {{ $trip['nbp']." " . $trip['passagers'] }}</span>
            </h3>
            <h3 class="pl-6 text-xl font-semibold text-gray-">
                <span class="pl-4"> {{ $trip['montant'] }} FDJ </span>
            </h3>
        </div>
    
        <div class=" border-b-4 border-gray-500 mb-4">
           <a href="{{ url('user/profil', $trip['user_id']) }}">
                <div class="flex justify-between py-4 items-center ">
                    <div class="flex flex-col">
                        <h3 class="text-md italic text-gray-">
                            Le conducteur
                        </h3>
                        <h3 class="text-xl font-semibold text-gray-">
                            {{ $trip['user_name'] }}
                        </h3>
                    </div>
                    <img src="{{ asset($trip['user_photo']) }}" alt="photo de profile" class="w-20 h-20 rounded-full ">
                </div>
            </a> 
    
        
    
        </div>
    
        <div class="border-b-4 border-gray-500 mb-4">
            <h3 class="text-md italic text-gray- ">
                Voiture
            </h3>
    
            @if ($voiture)
                <div class="flex justify-between py-4 items-center ">
                    <div class="flex flex-col">
                        <h3 class="text-lg text-gray- font-semibold "> {{ $voiture['marque'] }} {{ $voiture['model']}}</h3>
                        <h3 class="text-md text-gray- font-normal"> {{ $voiture['couleur']}}</h3>
                    </div>
                </div>
            @else
                <div class="flex   py-3">
                    <h3 class="pl-3 text-md text-gray-"> Aucune voiture enrégistrée </h3>
                </div>
            @endif
        </div>
    
    
    </div>
</div>
