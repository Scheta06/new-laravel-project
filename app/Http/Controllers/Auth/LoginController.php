<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('pages.auth.login');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'string|required',
            'password' => 'string|required|min:8'
        ]);

        if(Auth::attempt($data)) {
            return redirect()->route('index');
        }

        return back()->withErrors([
            'name' => 'Неверные учетные данные'
        ]);
    }

    public function logout () {
        Auth::logout();

        return redirect()->route ('index');
    }
}
