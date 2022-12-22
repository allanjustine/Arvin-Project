<?php

namespace App\Http\Livewire\MyPost;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{
    public $search, $category ='all';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function displayPost()
     {
        $query = $posts = Post::where('user_id', auth()->user()->id)
            ->latest('id')
            ->search($this->search);

        if ($this->category != 'all') {
            $query->where('category', $this->category);
        }

        $posts = $query->paginate(15);

        return compact('posts');
    }

    public function render()
    {
        return view('livewire.my-post.index', $this->displayPost());
    }
}
