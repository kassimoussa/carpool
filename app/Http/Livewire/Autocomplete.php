<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ville;

 class Autocomplete extends Component
{
    public $results;
    public $search = "";
    public $depart = " test ";
    public $selected;
    //public $searchResults;
    public $showDropdown;

    /* public function query() {
        return Ville::where('nom_ville', 'like', '%'.$this->search.'%')->orderBy('nom_ville');
    } */

    /*  public function mount()
    {
        //$this->searchResults = Ville::where('nom_ville', 'LIKE', '%'."d".'%')->orderBy('id');
        //$this->results = collect();
         
    } */
    public function select($ville)
    {
        $this->depart = $ville ;
        $this->search = $ville;
        
    }
/*
    public function updatedSelected()
    {
        $this->emitSelf('valueSelected', $this->selected);
    }

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = collect();
            $this->showDropdown = false;
            return;
        }

        if ($this->query()) {
            $this->results = $this->query()->get();
        } else {
            $this->results = collect();
        }

        $this->selected = '';
        $this->showDropdown = true;
    } */

    public function render()
    {
        
       // $searchResults = Ville::all();

       $searche =  $this->search ;

       $searchResults =  Ville::where('nom_ville', 'Like', '%' . $searche . '%') ->orderBy('id', 'asc')->get();
        /* if(strlen($this->search)>= 2)
        {
            $searchResults = Ville::where('nom_ville', 'Like', '%' . $searche . '%') ->orderBy('id', 'asc')->get();
            //dump($searchResults);
        } */
        //dump($this->searchResults);
        return view('livewire.autocomplete', [
            'searchResults' => $searchResults,
        ]);
    }
}
