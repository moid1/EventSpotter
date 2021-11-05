<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        $user = User::find(Auth::user()->id);
        $user->is_online = false;
        $user->update();
        Auth::logout();
        return redirect()->intended('/login');
    }

    //apis function

    public function functionLogin(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }
        return response()->json([
            'user' => Auth::user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'message' => 'Login Successfully',
        ]);
    }

    public function createAccount(Request $request)
    {
       $userData =  Validator::make($request->all(),[
            'name' => 'required|min:2|max:50',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:8|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);
        if ($userData->fails()) {
            return response()->json([
                'success' => false,
                'message' => $userData->errors()->first(),
            ]);
        }

        $input = request()->except('password', 'confirm_password');
        $user = new User($input);
        $user->password = ($request->password);
        $user->ip_address = $request->ip();
        $user->save();

        $token = $user->createToken('tokens')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => $user,
            'token' => $token,
            'message' => 'User Created Successfully',
        ]);
    }
}
