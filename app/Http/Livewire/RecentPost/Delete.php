<?php

namespace App\Http\Livewire\RecentPost;

use App\Events\UserLog;
use Livewire\Component;
use App\Models\Post;

class Delete extends Component
{

    public $postId;
    public function getPostProperty() {
        return Post::select('id', 'category', 'remarks')
            ->find($this->postId);
    }

    public function delete() {
        $this->post->delete();

        $log_entry = 'Recent post deleted';
        event(new UserLog($log_entry));

        return redirect('/recentPost')->with('message', 'Deleted Successfully');
    }

    public function back2() {
        return redirect('/recentPost');
    }
    public function render()
    {
        return view('livewire.recent-post.delete');
    }
}
