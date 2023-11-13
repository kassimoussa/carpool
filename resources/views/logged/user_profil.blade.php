@extends('layouts.app', ['title' => "Profil d'utilisateur"])
@section('content')
    <div class="container mx-auto w-2/4   pt-2">
        @livewire('user-profil', [ 'user_id' => $id ])
    </div>
@endsection
