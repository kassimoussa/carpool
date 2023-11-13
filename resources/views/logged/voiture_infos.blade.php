@extends('layouts.app', ['title' => 'COVO - Voiture '])

@section('content')
    <div class="container mx-auto pt-4 md:w-2/3">

        @livewire('voiture-infos', ['voiture' => $voiture])

    </div>
@endsection
