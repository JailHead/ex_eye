<?php

namespace App\Livewire;

use App\Models\MongoDevice;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewDeviceForm extends Component
{
    #[Rule('required|min:5|max:100')]
    public $name = '';

    #[Rule('required|min:5|max:100')]
    public $model = '';

    #[Rule('required|min:5|max:250')]
    public $location = '';

    public $active = false;

    public function render()
    {
        return view('livewire.new-device-form');
    }

    public function newDevice(){
        $validated = $this->validate();

        MongoDevice::create([
            'owner' => Auth::user()->id,
            'name' => $validated['name'],
            'model' => $validated['model'],
            'location' => $validated['location'],
            'active' => $this->active,
        ]);

        $this->reset(['name', 'model', 'location', 'active']);

        session()->flash('success', 'Su nuevo dispositivo a sido registrado');
    }

    public function deleteDevices(){
        MongoDevice::truncate();
    }
}
