<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|unique:users,email|ends_with:@gmail.com',
            'password' => 'required|min:6|max:12',
            'noHp' => 'required|numeric|digits_between:9,12|starts_with:08'
        ]);

        $validation['password'] = bcrypt($validation['password']);

        User::create($validation);
        
        return redirect('login');
    }
}
