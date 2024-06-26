<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index(){
        $users = User::all();
        return view("account.index",compact("users"));
    }

    public function destroy(User $user){
        User::destroy($user->id);
        $users = User::all();
        return view("account.index",compact("users"));
    }
}
