@extends('layouts.app', ['title' => 'COVO - Préférences de voyage '])

@section('content')
    <div class="container mx-auto pt-8 md:w-2/3">

        @livewire('preferences')

    </div>
@endsection
