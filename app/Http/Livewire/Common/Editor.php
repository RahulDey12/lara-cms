<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class Editor extends Component
{
    public $data;

    public function updatedData() 
    {
        $this->emitUp('editorUpdated', $this->data);
    }

    public function mount($data) 
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.common.editor');
    }
}
