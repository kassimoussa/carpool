<div>
    <x-modal wire:model="show">
        <div class="flex justify-between items-center border-b p-2 text-md">
            <h6 class="text-md py-1/5 text-gray-900 font-100">Example of pikaday datepicker </h6>
            <button type="button" x-on:click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="p-4">
            {{ $message }}
        </div>
    </x-modal>
</div> 