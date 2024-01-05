<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:200|min:10',
            'email' => 'required|email|unique:users|max:200',
            'age' => 'required|integer|max:200',
            'address' => 'required|string|max:500',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/'],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validatedData = $validator->validated();

        // get user
        $user = Auth::user();

        // check password
        if(!Hash::check($validatedData['password'], $user['password'])) {
            return redirect()->back()->with(['error' => 'Invalid password'])->withInput();
        }

        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->address = $validatedData['address'];
        $user->fullname = $validatedData->fullname;
        
        // save user
        $user->save();
        return view('Profile', ['user' => $user, 'success' => 'Profile updated successfully']);
    }



    public function update_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/'],
            'new_password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}$/'],
            'new_password_confirmation' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData = $request->validate();

        $user = Auth::user();
        if(!Hash::check($validatedData['old_password'], $user['password'])) {
            return redirect()->back()->with(['error' => 'Invalid password'])->withInput();
        }

        $user->password = Hash::make($validatedData['new_password']);
        // save user
        $user->save();
        return view('Profile', ['user' => $user, 'success' => 'Password updated successfully']);
        
    }

    public function delete_user(Request $request)
    {
        $id = Auth::user()->id;
        User::destroy($id);

        return view('Register', ['success' => 'Account deleted successfully']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return view('Login', ['success' => 'User logged out successfully']);
    }

    public function get_user(Request $request)
    {
        $user = Auth::user();

        return view('Profile', ['user' => $user]);
    }
}
