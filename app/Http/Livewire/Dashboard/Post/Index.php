<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $posts;
    public $search;

    protected $listeners = ['postDelete'];

    public function mount()
    {
        $this->posts = Auth::user()->posts;
    }

    public function postSearch()
    {
        $this->posts = strlen($this->search) ? Auth::user()->posts()->where('title', 'LIKE', '%'.$this->search.'%')->get() : Auth::user()->posts;
    }

    public function render()
    {
        return view('livewire.dashboard.post.index')->extends('layouts.dashboard');
    }

    public function postDelete(Post $post)
    {
        $post->delete();

        $this->posts = $this->posts->filter(fn ($single_post, $key) => $single_post->id != $post->id );
    }
}
