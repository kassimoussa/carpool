@extends('layouts.app', ['title' => 'Trajet achété'])
@section('content')
    <div class="container mx-auto px-4 pt-10 md:w-1/2 mb-6">

        @livewire('trajet-achete', ['t_id' => $t_id, 'v_id' => $v_id])

    </div>
@endsection
