<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }
    public function getFriends(){
        $friends = auth()->user()->following;
        return response()->json($friends);
    }
}
