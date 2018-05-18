<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit',[
           'user' => $user, 
        ]);
    }
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
           
            'name' => 'required|max:191', 
            
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        
        return redirect('/');
    }
    
}