<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Location;
use App\Models\MongoDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesList extends Component
{
    use WithPagination;

    public $selectedDevice_id;
    public $selectedDevice_name;

    #[Computed()]
    public function user(){        
        return Auth::user();
    }
    
    #[Computed()]
    public function devices(){        
        return MongoDevice::where('owner', Auth::id())->get();
    }
    
    #[Computed()]
    public function alerts(){
        $count = Alert::whereDate('created_at', Carbon::today())->count();
        
        if ($count) {
            return $count;
        } else {
            return 0;
        }
    }

    public function deleteDevice($id)
    {
        $device = MongoDevice::find($id);

        $device->delete();
        
        $this->redirect(route('dashboard'));
    }
    
    public function getLocation($device){
        $location = Location::where('device', $device)->first();

        return $location->name;
    }
    
    public function render()
    {
        return view('livewire.devices-list');
    }
}