<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    public $search, $gender ='all';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function loadUsers()
     {
        $query = User::orderBy('name')
            ->search($this->search);

        if ($this->gender != 'all') {
            $query->where('gender', $this->gender);
        }

        $users = $query->paginate(5);

        return compact('users');
    }
    public function render()
    {
        return view('livewire.admin.users.index', $this->loadUsers());
    }
}
