@extends('layouts.app', ['title' => 'Test'])
@section('content')
    <div class="container mx-auto mt-8" x-data="{ show: false }">

        <button type="button"  x-on:click="show = true"
            class="inline-flex content-end px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
            </span>Click to Open Modal
        </button>

        <div  x-show="show" x-on:keydown.escape.window="show = false"
            class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
            <div class="fixed inset-0 transform" x-on:click="show = false">
                <div x-show="show" class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div  
                class="bg-white rounded-lg overflow-hidden transform sm:w-full sm:mx-auto sm:mx-auto max-w-lg">
                <div class="flex justify-between items-center border-b p-2 text-md">
                    <h6 class="text-md py-1/5 text-gray-900 font-100">Example of pikaday datepicker </h6>
                    <button type="button" x-on:click="show = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    Test
                </div>
            </div>
        </div> 

    </div>
@endsection
