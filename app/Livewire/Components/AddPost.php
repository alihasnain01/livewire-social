<?php

namespace App\Livewire\Components;

use App\Events\LikeNotfication;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    use WithFileUploads;
    public $content;
    public $photo;

    public function addPost(): void
    {
        if ($this->content) {
            $post = Post::create([
                'content' => $this->content,
                'user_id' => Auth::user()->id
            ]);

            if ($post) {
                $this->content = '';
                $this->dispatch('new-post-created');
            }
        }
    }

    public function render()
    {
        return view('livewire.components.add-post');
    }
}
