<?php

namespace App\Livewire;

use App\Models\Location;
use App\Models\MongoDevice;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewDeviceForm extends Component
{
    #[Rule('required')]
    public $device_id = '';

    #[Rule('required|min:5|max:100')]
    public $name = '';

    #[Rule('required')]
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

        Location::create([
            'name' => $validated['location'],
            'device' => $validated['device_id'],
            'temperature' => 0,
            'moist' => 0,
        ]);
        MongoDevice::create([
            'owner' => Auth::user()->id,
            'device_id' => $validated['device_id'],
            'name' => $validated['name'],
            'model' => $validated['model'],
            'location' => Location::where('name', $validated['location'])->first()->id,
            'active' => $this->active,
        ]);        

        $this->reset(['name', 'model', 'location', 'active']);

        session()->flash('success', 'Su nuevo dispositivo a sido registrado');
    }

    public function deleteAll(){
        MongoDevice::truncate();
        Location::truncate();
    }
}
