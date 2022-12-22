<?php

namespace App\Http\Livewire\MyPost;

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

        $log_entry = 'Post deleted';
        event(new UserLog($log_entry));

        return redirect('/myPost')->with('message', 'Deleted Successfully');
    }

    public function back() {
        return redirect('/myPost');
    }
    public function render()
    {
        return view('livewire.my-post.delete');
    }
}
