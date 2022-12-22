<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    public function edit($id)
    {
        return view('admin.users.edit', compact('id'));
    }
    public function destroy($id)
    {
        return view('admin.users.delete', compact('id'));
    }
    public function createUser()
    {
        return view('admin.users.create');
    }
}