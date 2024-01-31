<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store()
    {
        $name = request()->userName;
        $email = request()->email;
        $password = request()->password;
        $phone = request()->phone;

        $hashedPassword = Hash::make($password);

        $register = new User;
        $register->name = $name;
        $register->email = $email;
        $register->password = $hashedPassword;
        $register->phone = $phone;
        $register->save();

        return to_route('login.create');
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $email = request()->email;
        $password = request()->password;

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {

            return to_route('service.index');
        } else {
            
            return to_route('login.create');
        }
    }
}
