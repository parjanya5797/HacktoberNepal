<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return Auth::check() ? redirect()->route(auth()->user()->getRawOriginal('role') == 1 ? 'dashboard' : 'home') : view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect()->route(auth()->user()->getRawOriginal('role') == 1 ? 'dashboard' : 'home');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
