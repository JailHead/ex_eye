<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\MongoDevice;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ColumnChartModel extends Component
{
    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    #[Computed()]
    public function alerts()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();

        return Alert::whereIn('device', $authDevices)->get();
    }

    #[Computed()]
    public function today()
    {
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
            ->values()
            ->count();

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

    public function handleOnColumnClick($column)
    {
        dd($column['value']);
    }

    public function render()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();
        $alerts = Alert::whereIn('device', $authDevices)->get();

        $columnChartModel = LivewireCharts::columnChartModel()
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->setDataLabelsEnabled($this->showDataLabels)
            //->setOpacity(0.25)
            ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            ->setColumnWidth(200)
            ->withGrid()            
            ->addColumn('Hoy', $this->datesOfToday(), '#f6ad55')
            ->addColumn('Hace 1 semana', $this->datesOfLastWeek(), '#fc8181')
            ->addColumn('Hace 2 semanas', $this->datesOfLastTwoWeeks(), '#90cdf4')
            ->addColumn('Hace 1 mes', $this->datesOfLastMonth(), '#90cdf4')
            ->setHorizontal();

        return view('livewire.column-chart-model')->with(['columnChartModel' => $columnChartModel]);
    }
}
