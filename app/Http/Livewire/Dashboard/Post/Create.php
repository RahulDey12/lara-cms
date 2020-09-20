<?php

namespace App\Http\Livewire\Dashboard\Post;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Auth;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $visibility;
    public $photo;

    protected $listeners = ['editorUpdated'];

    public function mount()
    {
        $this->visibility = "Public";
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048'
        ]);
    }

    public function updatedTitle()
    {
        $this->validate([
            'title' => 'string|max:100'
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.post.create')->layout('layouts.dashboard');
    }

    public function publish() 
    {
        $this->validate([
            'title'      => 'required|string|max:100',
            'body'       => 'required|string',
            'visibility' => 'required|in:Public,Private',
            'photo'      => 'nullable|image|max:2048',
        ]);

        Post::create([
            'title' => $this->title,
            'body'  => $this->body,
            'visibility' => $this->visibility,
            'photo' => is_null($this->photo) ? null : $this->photo->store('public/post-images'),
            'user_id'    => Auth::user()->id,
        ]);

        return $this->redirect(route('dashboard.post.index'));
    }

    public function editorUpdated($data) 
    {
        $this->body = $data;
    }
}
