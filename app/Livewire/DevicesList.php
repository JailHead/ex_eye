<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Device;
use App\Models\MongoDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class DevicesList extends Component
{
    use WithPagination;

    #[Computed()]
    public function devices(){        
        return MongoDevice::where('owner', Auth::id())->get();
    }
    #[Computed()]
    public function user(){        
        return Auth::user();
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

    public function render()
    {
        return view('livewire.devices-list');
    }
}
