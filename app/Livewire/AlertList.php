<?php

namespace App\Livewire;

use App\Models\Alert;
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

    public function newDocument()
    {
        $success = Alert::create([
            'title' => $this->title,
            'description' => 'This is a test'
        ]);

        $success->save();
        
        return session()->flash('success', 'Nuevo documento creado');
    }

    public function deleteDocuments(){
        Alert::truncate();
    }
}
