<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|max:200',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validatedData = $validator->validated();
        $remember = $request->has('remember');

        if (!Auth::attempt($validatedData, $remember)) { 
            // Authentication failed
            return back()->withErrors(['error' => 'email/passowrd incorrect'])->withInput();
        }

        $user = Auth::user();
        // Authentication passed
        return redirect()->intended('/Profile')->with(['success' => 'Login Successful', 'user' => $user]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:200|min:10',
            'email' => 'required|email|unique:users|max:200',
            'age' => 'required|integer|max:200',
            'address' => 'required|string|max:500',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/'],
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validatedData = $validator->validated();

        $user = new User;
        $user->fullname = $validatedData['fullname'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->address = $validatedData['address'];
        $user->setPasswordAttribute($validatedData['password']);
        
        // save user
        $user->save();
        
        return view('Profile')->with(['success' => 'Registration Successful', 'email' => $user->email]);
    }
}
