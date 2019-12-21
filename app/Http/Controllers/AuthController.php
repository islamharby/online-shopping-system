<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function view_register()
    {
        return view('auth.register');
    }
    public function register_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'card_name' => 'nullable|string',
            'card_type' => 'nullable|string',
            'card_number' => 'nullable|numeric',
            'date_month' => 'nullable|string|between:1,12',
            'date_year' => 'nullable',
            'cvc' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->card_name = $request->card_name;
        $user->card_type = $request->card_type;
        $user->card_number = $request->card_number;
        $user->date_month = $request->date_month;
        $user->date_year = $request->date_year;
        $user->cvc = $request->cvc;
        $user->save();

        $email = $request->email;
        $password = $request->password;
        Auth::attempt(['email' => $email, 'password' => $password]);

        return response()->json(['page' => 'home']);
    }
    public function view_login()
    {
        return view('auth.login');
    }
    public function login_process(Request $request)
    {
        $v = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($v->fails()) {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role == 'admin') {
                return response()->json(['page' => 'dashboard']);
            } elseif (Auth::user()->role == 'user') {
                return response()->json(['page' => 'home']);
            } else {
                return response()->json(['msg' => 'Something went wrong. Please try again!']);
            }
        } else {
            return response()->json(['msg' => 'Something went wrong. Please try again!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
