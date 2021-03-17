<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class StoreRequest extends Component
{
    public $staffs = [];
    public $items = ['test'];
    public $qty;
    public $updateBtnStatus = false;
    public $requesting_date;
    public $staff_id;
    public $test;

    protected $rules = [
        'requesting_date' => 'required',
        'staff_id' => 'required'
    ];

    public function addStoreRequest(Request $request)
    {
        dump($request);
        $this->items = ['test2'];
        $this->validate();
    }

    public function render()
    {
        return view('livewire.store-request')->extends('layouts.app');
    }
}
