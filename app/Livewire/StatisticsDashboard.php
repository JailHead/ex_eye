<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Location;
use App\Models\MongoDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StatisticsDashboard extends Component
{
    #[Computed()]
    public function today()
    {
        return Carbon::today()->toDateString();
    }

    #[Computed()]
    public function lastWeek()
    {
        return Carbon::today()->subWeek()->toDateString();
    }

    #[Computed()]
    public function alerts()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();

        return Alert::whereIn('device', $authDevices)->get();
    }

    #[Computed()]
    public function alertsCount()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();

        return Alert::whereIn('device', $authDevices)->get()->count();
    }

    #[Computed()]
    public function datesOfToday()
    {
        $alerts = $this->alerts()
            ->pluck('created_at')
            ->map(function ($alert) {
                $alertDate = Carbon::parse($alert)->toDateString();
                if ($alertDate == $this->today()) {
                    return $alertDate;
                }
            })
            ->filter()
            ->values()
            ->count();

        return $alerts;
    }

    #[Computed()]
    public function locations()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('device_id')->toArray();

        $locations = Location::whereIn('device', $authDevices)->get();

        return $locations;
    }

    #[Computed()]
    public function averageTemperature(){
        $sum = $this->locations()->sum('temperature');
        if($sum){
            $total = round($sum/ $this->locations()->count(), 1);
            return $total;
        }
        return 0;
    }

    public function render()
    {
        return view('livewire.statistics-dashboard');
    }
}
