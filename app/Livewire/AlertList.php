<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Location;
use App\Models\MongoDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AlertList extends Component
{
    public $title = '';

    public function render()
    {
        return view('livewire.alert-list');
    }

    #[Computed()]
    public function alerts(){
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();
        
        return Alert::whereIn('device', $authDevices)->get();
    }
    
    #[Computed()]
    public function today(){
        return Carbon::today()->toDayDateTimeString();
    }

    #[Computed()]
    public function alertsCount(){
        return $this->alerts()->count();
    }
}
