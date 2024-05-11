<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use App\Models\User;


class RegisterController extends Controller
{
    public function show(Response $response){

        $User = User::all();
        if($User){
            return view('show',compact('User'));
        }

    }

}