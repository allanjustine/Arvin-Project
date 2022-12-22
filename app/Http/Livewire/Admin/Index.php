<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Post;

class Index extends Component
{
    public function index() {
        $allPosts = Post::count();
        $posts = Post::where('user_id', auth()->user()->id)->count();
        $logs = Log::count();
        $users = User::count();

        return compact('allPosts', 'logs', 'posts', 'users');
    }
    public function render()
    {
        return view('livewire.admin.index', $this->index());
    }
}
