<div class="flex" x-data="{ depart: @entangle('depart') }">

<div class="relative mt-3 md:mt-0" x-data="{ vDepart: true, message: '' }" @click.away="vDepart = false">
    <input 
        id="search1"
        wire:model.debounce.500ms="search" 
        type="text"
        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1  focus:ring-blue-500 focus:shadow-outline"
        placeholder="Search" 
        x-model="message" 
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        
        @keydown="vDepart = true" 
        @keydown.escape.window="vDepart = false" 
        @keydown.shift.tab="vDepart = false" 
        {{-- @focus="vDepart = true" --}}
    >
    <div class="w-4 ">
        <i class="fas fa-search absolute top-0 fill-current text-gray-500   mt-2 ml-2 mr-2"></i>
    </div>
     

    @if (strlen($search) >= 1)
        <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4 " x-show.transition.opacity="vDepart"> 
                @if (!empty($searchResults) && $searchResults->count())
                    <ul>  
                        @foreach ($searchResults as $ville)
                            <li wire:click="select('{{ $ville->nom_ville }}')"  x-on:click="message ='{{ $ville->nom_ville }}'" @click="vDepart=false"
                                class="rounded text-white text-sm md:text-lg block p-2  hover:bg-gray-700">{{ $ville->nom_ville }}</li>
                        @endforeach                                     
                    </ul>
                @else
                    <div class="px-3 py-3">
                        No results found for {{ $search }}
                    </div>
                @endif  
        </div>

    @endif

    <div class="mt-16">{{ $depart }}</div>
     
</div>
 
{{-- <div class="container mx-auto ml-8">
    <input type="text" id="test" wire:model="depart" class="w-66 block p-4 bg-gray-50 rounded-lg text-black">
</div> --}}


</div>