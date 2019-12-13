<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'card_name' => 'required|string',
            'card_type' => 'required|string',
            'card_number' => 'required|numeric',
            'date_month' => 'required|string',
            'date_year' => 'required|string',
            'cvc' => 'required|numeric',
            ]);

        if ($validator->fails()) {
            return  response()->json(['message' => $validator->errors()->all()]);
        }
        $user = new User();
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->card_name = $request->card_name;
        $user->card_type = $request->card_type;
        $user->card_number = $request->card_number;
        $user->date_month = $request->date_month;
        $user->date_year = $request->date_year;
        $user->cvc = $request->cvc;
        $user->save();

        return response()->json(['user' => '2', 'data' => $user]);
    }

    /**
     * 1 or 2 refered to admin or user has been login.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return  response()->json(['message' => $validator->errors()->all()]);
        }

        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role = 'admin') {
                return response()->json(['user' => '1', 'data' => Auth::user()]);
            }
        }

        return response()->json(['user' => '2', 'data' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'done']);
    }
}
