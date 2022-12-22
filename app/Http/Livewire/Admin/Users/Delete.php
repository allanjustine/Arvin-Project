<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Events\UserLog;
use App\Models\User;

class Delete extends Component
{

    public $userId;
    public function getUserProperty() {
        return User::select('id', 'name', 'gender', 'email')
            ->find($this->userId);
    }

    public function delete() {
        $this->user->delete();

        $log_entry = 'User delete';
        event(new UserLog($log_entry));

        return redirect('/admin/users')->with('message', 'Deleted Successfully');
    }

    public function back() {
        return redirect('/admin/users');
    }
    public function render()
    {
        return view('livewire.admin.users.delete');
    }
}
