<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Receiving;

class EditReceiving extends Component
{
    public $receivingItems = 4;

    // public function mount (Request $id)
    // {

    //     $result = Receiving::with(['orders' => function($query){
    //         return $query->with('item')
    //                 ->get();
    //                 }])

    //     ->where('id', $id)
    //     ->get();

    //     $this->test = $result;
    // }
    
    public function render()
    {
        return view('livewire.edit-receiving')->extends('layouts.adminLayout');
    }


}
