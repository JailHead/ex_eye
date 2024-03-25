<?php

namespace App\Livewire;

use App\Models\Alert;
use App\Models\MongoDevice;
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
    public function doc(){
        $doc = Alert::where('title', $this->title)->first();

        return response()->json([
            'documento' => $doc
        ]);
    }

    public function newAlert()
    {
        Alert::create([
            'device' => MongoDevice::where('owner', Auth::id())->first(),
            'title' => $this->title,
            'description' => 'Un intruso ingreso en la siguiente zona: '
        ]);        
        
        return session()->flash('success', 'Nuevo documento creado');
    }

    public function deleteDocuments(){
        Alert::truncate();
    }
}
