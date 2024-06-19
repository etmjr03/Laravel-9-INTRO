<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    public function getUser(User $user) {
        return "Usuário id $user->id e nome $user->name";
    }
}
