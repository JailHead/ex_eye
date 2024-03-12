<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AlertList extends Component
{
    use WithPagination;

    #[Computed()]
    public function devices(){        
        return Device::where('user_id', Auth::id())->get();
    }
    #[Computed()]
    public function userEmail(){        
        return Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.alert-list');
    }
}
