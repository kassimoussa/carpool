@extends('layouts.app', ['title' => 'Achat trajet'])
@section('content')
    <div class="container mx-auto px-4 pt-10 md:w-1/2 mb-6">

        @livewire('achat-trajet', ['trajet_id' => $id, 'nb_passager' => $count])

    </div>
@endsection
