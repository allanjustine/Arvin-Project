<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Events\UserLog;
use App\Models\User;

class Edit extends Component
{

    public $userId;
    public $name, $gender, $email;
    public function mount() {
        $this->name = $this->user->name;
        $this->gender = $this->user->gender;
        $this->email = $this->user->email;

    }

    public function editUser() {
        $this->validate([
            'name'             =>          ['required', 'string', 'max:255'],
            'gender'            =>          ['required', 'string', 'max:255'],
            'email'                =>          ['required', 'string', 'max:255']
        ]);

        $this->user->update([
            'name'             =>      $this->name,
            'gender'            =>      $this->gender,
            'email'                =>      $this->email
        ]);

        $log_entry = 'User Updated';
        event(new UserLog($log_entry));

        return redirect('/admin/users')->with('message', 'Updated Successfully');
    }

    public function back() {
        return redirect('admin/users');
    }
    public function getUserProperty() {
        return User::find($this->userId);
    }
    public function render()
    {
        return view('livewire.admin.users.edit');
    }
}
