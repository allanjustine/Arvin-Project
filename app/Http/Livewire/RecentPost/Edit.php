<?php

namespace App\Http\Livewire\RecentPost;

use Livewire\Component;
use App\Events\UserLog;
use App\Models\Post;

class Edit extends Component
{

    public $postId;
    public $category, $remarks;
    public function mount() {
        $this->category = $this->post->category;
        $this->remarks = $this->post->remarks;

    }

    public function editRecentPost() {
        $this->validate([
            'category'             =>          ['required', 'string', 'max:255'],
            'remarks'            =>          ['required', 'string', 'max:255']
        ]);

        $this->post->update([
            'category'             =>      $this->category,
            'remarks'            =>      $this->remarks
        ]);

        $log_entry = 'Recent post updated';
        event(new UserLog($log_entry));

        return redirect('/recentPost')->with('message', 'Updated Successfully');
    }

    public function back2() {
        return redirect('/recentPost');
    }
    public function getPostProperty() {
        return Post::find($this->postId);
    }
    public function render()
    {
        return view('livewire.recent-post.edit');
    }
}
