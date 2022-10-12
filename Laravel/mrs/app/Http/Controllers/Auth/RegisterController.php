<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return Auth::check() ? redirect()->route(auth()->user()->getRawOriginal('role') == 1 ? 'dashboard' : 'home') : view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'email'   => 'required|email',
            'password'  => 'required|alphaNum'
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email'  => $request->get('email'),
            'role' => 2,
            'password' => Hash::make($request->get('password'))
        ]);

        auth()->login($user);

        return redirect()->route(auth()->user()->getRawOriginal('role') == 1 ? 'dashboard' : 'home');
    }
}
