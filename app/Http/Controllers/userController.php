<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'pass' => 'required|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->pass;
        $user->save();

        //$user->fill($request->all());

        return  redirect()->route('user.data')->with(['success' => 'User has been saved!']);    
    }
    
    public function showData(){
        $users = User::all();

        return view('userData', compact('users'));
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.data')->with(['delete' => 'User has been deleted!']);
    }

    public function showEdit($id){
        $user = User::find($id);

        return view('update', compact('user'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);
    
        $user = User::find($id);
        $user->fill($request->except('pass')); // Exclude the 'pass' field from the update
        $user->save();
    
        return redirect()->route('user.data')->with(['success' => 'User has been updated!']);    
    
    }
    
    
    
}
