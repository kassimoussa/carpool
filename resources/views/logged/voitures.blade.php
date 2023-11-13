@extends('layouts.app', ['title' => 'COVO - Voiture '])

@section('content')
    <div class="container mx-auto pt-8 md:w-2/3">

        @livewire('voitures')

    </div>
@endsection
