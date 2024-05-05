<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
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

        return back()->with(['success' => 'User has been saved!']);    
    }

}
