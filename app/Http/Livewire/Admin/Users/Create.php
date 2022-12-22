<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Events\UserLog;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Create extends Component
{

    public $name, $email, $password, $gender, $password_confirmation;
    public $roles;

    public function addUser() {
        $this->validate([
            'name'                       =>          ['required', 'string', 'max:255', 'unique:users'],
            'email'                      =>          ['required', 'email', 'max:255', 'unique:users'],
            'gender'                     =>          ['required', 'string', 'max:255'],
            'password'                   =>          ['required', 'confirmed', 'string', 'max:255', 'min:6']
        ]);

        $token = Str::random(24);

        $users = User::create([
            'name'                       =>          $this->name,
            'email'                      =>          $this->email,
            'gender'                     =>          $this->gender,
            'password'                   =>          bcrypt($this->password),
            'remember_token'             =>          $token
        ]);

        $users->assignRole('writer');

        Mail::send('auth.verification', ['user' => $users], function($mail) use($users){
            $mail->to($users->email);
            $mail->subject('Account verification');
        });

        $log_entry = 'User Added';
        event(new UserLog($log_entry));

        return redirect('/admin/users')->with('message', 'User added successfully please check the email to continue');
        
    }
    public function back() {
        return redirect('/admin/users');
    }
    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
