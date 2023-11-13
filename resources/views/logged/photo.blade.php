@extends('layouts.app', ['title' => 'COVO - Photo de profil '])

@section('content')
    <div class="container mx-auto pt-8 md:w-2/3">

        @livewire('add-photo')

    </div>
@endsection
