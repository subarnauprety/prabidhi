<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }
}
