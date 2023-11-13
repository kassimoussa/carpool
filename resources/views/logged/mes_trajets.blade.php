@extends('layouts.app', [  "title" => "Vos trajets "])
@section('content')

<div class="container mx-auto pt-4 md:w-2/3"> 
    
    @livewire('mes-trajets')

</div>
    
@endsection