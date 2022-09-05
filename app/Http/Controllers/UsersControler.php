<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersControler extends Controller
{
    public function index(){
        $users = User::all();
        return view('indexUsers', compact('users'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->isAdmin===0) {
                User::destroy($id);
                return redirect()->route('indexUsers');
        }
        return redirect()->route('indexUsers');

    }
}
