<?php

namespace App\Http\Livewire;

use App\Staff;
use Livewire\Component;
use Livewire\WithPagination;

class UserLivewire extends Component
{

    use withPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedStaff;


    protected $listeners =['refreshParent' => '$refresh'];

    public function openModalRequest($lineId, $action)
    {
        $this->selectedStaff = $lineId;

        if($action === 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }else if($action === 'update'){
            $this->emit('getSelectedStaff', $this->selectedStaff);
            $this->dispatchBrowserEvent('showModal');
        }
    }

    public function removeStaff($lineId)
    {
        Staff::destroy($lineId);
        $this->dispatchBrowserEvent('closeDeleteModal');

        session()->flash('deleted', 'Staff has been deleted');
    }

    public function updateStaff($lineId)
    {
        Staff::where('id', $lineId)->update($data);
    }

    public function render()
    {
        return view('livewire.user-livewire', ['staffs' => Staff::paginate(5) ])->extends('layouts.adminLayout');
    }
}
