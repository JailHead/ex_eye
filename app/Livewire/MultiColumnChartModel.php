<?php

namespace App\Livewire;

use App\Models\MongoDevice;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class MultiColumnChartModel extends Component
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
    public function locations()
    {
        $authDevices = MongoDevice::where('owner', Auth::id())->get()->pluck('device_id')->toArray();

        $authLocations = Location::whereIn('device', $authDevices)->distinct()->get();

        $locations = $authLocations->map(function ($location) {
            return Location::find($location)->pluck('_id')->first();
        });

        return $locations;
    }

    public function render()
    {
        $locations = $this->locations();

        if ($locations) {
            $multiColumnChartModel = $locations
            ->reduce(
                function ($multiColumnChartModel, $data) {
                    $type = Location::find($data)->name;
    
                    return $multiColumnChartModel
                        ->addSeriesColumn($type, 'Ubicaciones', Location::find($data)->temperature);
                },
                LivewireCharts::multiColumnChartModel()
                    ->setAnimated($this->firstRun)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setTitle('Temperatura C°')
                    ->stacked()
                    ->withGrid()
                    ->setDataLabelsEnabled(true)
            );
    
            return view('livewire.multi-column-chart-model')->with([            
                'multiColumnChartModel' => $multiColumnChartModel,
            ]);

            return view('livewire.multi-column-chart-model');
        }
    }
}
