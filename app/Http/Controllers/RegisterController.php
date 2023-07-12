<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $user =  User::create( request()->validate([
        'name' => ['required','min:6'],
        'username' => ['required','min:6',Rule::unique('users','username')],
        'email' => ['required','email',Rule::unique('users','email')],
        'password' => ['required','min:6'],

       ]));

       Auth()->login($user);
    //    session()->flash('success','Account created successfully');
       return redirect(route('home'))->with('success','Account created successfully');
    }
}
