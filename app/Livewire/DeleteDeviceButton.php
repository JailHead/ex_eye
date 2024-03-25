<?php

namespace App\Livewire;

use App\Models\MongoDevice;
use Livewire\Component;

class DeleteDeviceButton extends Component
{
    public $device_id = '';

    public function deleteDevice($id){
        $device = MongoDevice::find($id);

        $device->delete();

        $this->dispatch('close-modal');
        $this->redirect(route('dashboard'));
    }

    public function render()
    {        
        return view('livewire.delete-device-button');
    }
}
