<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\Location;
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

    public $daysOfWeek = [
        Carbon::MONDAY => 'Lunes',
        Carbon::TUESDAY => 'Martes',
        Carbon::WEDNESDAY => 'Miércoles',
        Carbon::THURSDAY => 'Jueves',
        Carbon::FRIDAY => 'Viernes',
        Carbon::SATURDAY => 'Sábado',
        Carbon::SUNDAY => 'Domingo',
    ];

    #[Computed()]
    public function alerts()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('name')->toArray();

        return Alert::whereIn('device', $authDevices)->get();
    }

    #[Computed()]
    public function locations()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('device_id')->toArray();

        $authLocations = Location::whereIn('device', $authDevices)->distinct()->get();

        $locations = $authLocations ->map(function ($location) {
            return Location::find($location)->pluck('_id')->first();
        });

        return $locations;
    }

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
    public function lastTwoWeeks()
    {
        return Carbon::today()->subWeeks(2)->toDateString();
    }

    #[Computed()]
    public function lastMonth()
    {
        return Carbon::today()->subMonth()->toDateString();
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
    public function datesOfThisWeek()
    {
        $alerts = $this->alerts()
            ->pluck('created_at')
            ->map(function ($alert) {
                $alertDate = Carbon::parse($alert)->toDateString();
                if ($alertDate > $this->lastWeek()) {
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
        $locations = $this->locations();

        $columnChartModel = LivewireCharts::columnChartModel()
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(false)
            ->setDataLabelsEnabled(true)
            //->setOpacity(0.25)
            ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            ->setColumnWidth(30)
            ->withGrid()            
            ->addColumn('Hoy', $this->datesOfToday(), '#f6ad55')
            ->addColumn('Esta semana', $this->datesOfThisWeek(), '#f6ad55')
            ->addColumn('Hace 1 semana', $this->datesOfLastWeek(), '#fc8181')
            ->addColumn('Hace 2 semanas', $this->datesOfLastTwoWeeks(), '#90cdf4')
            ->addColumn('Hace 1 mes', $this->datesOfLastMonth(), '#90cdf4')
            ;

        $pieChartModel = $locations
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = Location::find($data)->name;
                    $value = Location::find($data)->temperature;

                    return $pieChartModel->addSlice($type, $value, '#90cdf4');
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated($this->firstRun)
                    ->setType('donut')
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled(true)
                    ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        return view('livewire.column-chart-model')->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel
        ]);
    }
}
