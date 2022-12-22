<?php

namespace App\Http\Livewire\MyPost;

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

    public function editPost() {
        $this->validate([
            'category'             =>          ['required', 'string', 'max:255'],
            'remarks'            =>          ['required', 'string', 'max:255']
        ]);

        $this->post->update([
            'category'             =>      $this->category,
            'remarks'            =>      $this->remarks
        ]);

        $log_entry = 'Post updated';
        event(new UserLog($log_entry));

        return redirect('/myPost')->with('message', 'Updated Successfully');
    }

    public function back() {
        return redirect('/myPost');
    }
    public function getPostProperty() {
        return Post::find($this->postId);
    }
    
    public function render()
    {
        return view('livewire.my-post.edit');
    }
}
