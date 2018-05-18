<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MicropostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
            'date' => 'required|max:15',
        ]);
        $request->user()->microposts()->create([
            'content' => $request->content,
            'date' => $request->date,
        ]);

        return redirect('/');
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::user()->id === $micropost->user_id) {
            $micropost->delete();
        }

        return redirect('/');
    }
    
    public function edit($id)
    {
        $micropost = \App\Micropost::find($id);
        
        return view('microposts.edit',[
           'micropost' => $micropost, 
        ]);
    }
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
           
            'date' => 'required|max:15',
            'content' => 'required|max:191', 
            
        ]);
        
        $micropost = \App\Micropost::find($id);
        $micropost->content = $request->content;
        $micropost->date = $request->date;
        $micropost->save();
        
        return redirect('/');
    }
    
    
    
}