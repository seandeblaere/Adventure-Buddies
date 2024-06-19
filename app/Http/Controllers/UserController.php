<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function user(User $user) {
        return view('user.profile', [
            'user' => $user
        ]);
    }
}