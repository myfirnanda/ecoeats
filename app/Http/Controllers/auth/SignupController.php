<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        return view('auth.signup.index', [
            "provinces" => Province::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "full_name" => "required",
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "date_birth" => "required",
            "phone_number" => "required",
        ]);

        if($validatedData['password'] !== $request->input('confirmation_password')) {
            return redirect('signup')->with('error', 'Password must be match');
        }

        User::create($validatedData);

        return redirect('/login')->with('success', 'Successfully Sign Up, Now you can Login!');
    }
}
