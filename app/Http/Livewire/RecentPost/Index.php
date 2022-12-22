<?php

namespace App\Http\Livewire\RecentPost;

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
        $query = $recentPosts = Post::latest('id')
            ->search($this->search);

        if ($this->category != 'all') {
            $query->where('category', $this->category);
        }

        $recentPosts = $query->paginate(15);

        return compact('recentPosts');
    }

    public function render()
    {
        return view('livewire.recent-post.index', $this->displayPost());
    }
}
