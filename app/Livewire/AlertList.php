<?php

namespace App\Livewire;

use App\Models\Alert;
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
        return Carbon::today()->subDay(1)->toDateString();
    }

    #[Computed()]
    public function lastWeek()
    {
        return Carbon::today()->subDay(7)->toDateString();
    }

    #[Computed()]
    public function lastTwoWeeks()
    {
        return Carbon::today()->subDay(14)->toDateString();
    }

    #[Computed()]
    public function lastMonth()
    {
        return Carbon::today()->subDay(30)->toDateString();
    }
    
    #[Computed()]
    public function datesOfToday(){
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
    public function datesOfLastWeek()
    {
        $alerts = $this->alerts()
            ->pluck('created_at')
            ->map(function ($alert) {
                $alertDate = Carbon::parse($alert)->toDateString();
                if ($alertDate <= $this->lastWeek() && $alertDate > $this->lastTwoWeeks()) {
                    return $alertDate;
                }
            })
            ->filter()
            ->values()
            ->count();

        return $alerts;
    }

    #[Computed()]
    public function datesOfLastTwoWeeks()
    {
        $alerts = $this->alerts()
            ->pluck('created_at')
            ->map(function ($alert) {
                $alertDate = Carbon::parse($alert)->toDateString();
                if ($alertDate <= $this->lastTwoWeeks() && $alertDate > $this->lastMonth()) {
                    return $alertDate;
                }
            })
            ->filter()
            ->values();

        return $alerts;
    }

    #[Computed()]
    public function datesOfLastMonth()
    {
        $alerts = $this->alerts()
            ->pluck('created_at')
            ->map(function ($alert) {
                $alertDate = Carbon::parse($alert)->toDateString();
                if ($alertDate <= $this->lastMonth()) {
                    return $alertDate;
                }
            })
            ->filter()
            ->values()
            ->count();

        return $alerts;
    }

    #[Computed()]
    public function alertsCount(){
        return Alert::all()->count();
    }

    public function deleteDocuments(){
        Alert::truncate();
    }
}
