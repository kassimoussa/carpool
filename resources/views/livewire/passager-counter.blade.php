<div class="mx-auto relative w-1/2 " x-data="{ open: false }">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path
                d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" />
        </svg>
    </div>
    <input type="number" hidden wire:model="nb_passager" value="{{ $count }}">
    <button type="button" @click="open = true" 
        class="h-16 bg-gray-50 border border-gray-300 text-gray-900 sm:text-md font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-4  ">
        {{ $count }} </button>
    <div x-show="open" @click.outside="open = false" id="passager_counter" class=" z-50 absolute mt-4 w-44 bg-gray-50 rounded divide-y  ">
        <div class="flex justify-between py-3 px-4 text-sm text-gray-900 ">
            <div class="pr-4"><h2 class="text-md font-semibold"> {{ $text }} </h2> </div>
            <div class="flex justify-around  px-4"> 
                <button wire:click="increment" type="button" class="mr-2">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z" />
                    </svg>
                </button>
                <h2 class="font-bold mr-2">{{ $count }} </h2> 
                <button wire:click="increment" type="button">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500  " fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM168 232C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H168z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>