<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller {
    
    public function getUser(User $user) {
        return view('user', [
            'nome'  => $user->name,
            'email' => $user->email
        ]);
    }
}
