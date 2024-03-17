<?php

namespace App\Livewire;

use App\Models\Alert as Alertas;
use App\Models\Device;
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
        return Device::where('user_id', Auth::id())->get();
    }
    #[Computed()]
    public function user(){        
        return Auth::user();
    }
    #[Computed()]
    public function alerts(){
        return 0;
        // return Alertas::whereDate('created_at', Carbon::today())->count();
    }

    public function render()
    {
        return view('livewire.devices-list');
    }
}
