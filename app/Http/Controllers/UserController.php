<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(int $id=null)
    {
        if($id)
        {
            $user=User::find($id);
        }
        return view('dashboard',[
            'user'=>$user
        ]);
    }
}
