<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
    
        $user = User::all();
       $newUsers = User::where('is_seen', false)->get(); // Collection

foreach ($newUsers as $users) {
    $users->is_seen = true;
    $users->save();
}

        return view('user.index', [
            'user'=>$user
        ]);
    }

    public function ban($id)
     {
        $user = User::find($id);
        $user->suspended = 1;
        $user->save();
        return back()->with('ban', 'User ban Successfully...');
     }

     public function unban($id)
     {
        $user = User::find($id);
        $user->suspended = 0;
        $user->save();
        return back()->with('unban', 'User unban Successfully...');
     }
}
