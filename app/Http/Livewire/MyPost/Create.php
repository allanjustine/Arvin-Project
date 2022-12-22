<?php

namespace App\Http\Livewire\MyPost;

use Livewire\Component;
use App\Events\UserLog;
use App\Models\Post;

class Create extends Component
{
    public $category, $remarks, $user_id;

    public function addPost() {
        $this->validate([
            'category'             =>          ['required', 'string', 'max:255'],
            'remarks'              =>          ['required', 'string', 'max:255']
        ]);

        Post::create([
            'user_id'           =>             auth()->user()->id,
            'category'             =>      $this->category,
            'remarks'            =>      $this->remarks
        ]);

        $log_entry = 'Added a Posts';
        event(new UserLog($log_entry));

        return redirect('/create')->with('message', 'Added Successfully');
    }
    public function render()
    {
        return view('livewire.my-post.create');
    }
}
