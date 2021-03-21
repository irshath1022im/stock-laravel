<?php

namespace App\Http\Livewire;

use App\Staff;
use Livewire\Component;

class CreateUserLivewire extends Component
{

    public $first_name;
    public $last_name;
    public $position;
    public $contact_no;
    public $selectedStaff;

    protected $rules=[
        'first_name' => 'required',
        'position'=>'required',
        'contact_no' => 'required'
    ];

    protected $listeners = [
        'getSelectedStaff'
    ];

    public function getSelectedStaff($id)
    {
        $this->selectedStaff = $id;
        $modal = Staff::find($id);

        $this->first_name = $modal->staff_name;
        $this->position = $modal->position;
    }


    public function addNewUser()
    {
        $this->validate();

        $data = [
            'staff_name' => $this->first_name,
            'position' => $this->position
        ];

        if ($this->selectedStaff) {
            //update
            Staff::where('id', $this->selectedStaff)->update($data);
            session()->flash('updated', 'Staff has been updated....');
        }else {
            //create news
            Staff::create($data);
            session()->flash('created', 'New User has been Added....');

        }

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        return redirect()->route('adminUser');
        // $this->clearVar();

        // dump($result);


    }

    public function clearVar()
    {
        $this->first_name= '';
        $this->position = '';
    }

    public function render()
    {
        return view('livewire.create-user-livewire');
    }
}
