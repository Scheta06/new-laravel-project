<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class ChangePasswordController extends Controller
{
    public function index() {
        return view('pages.auth.change-password');
    }

    public function update(Request $request) {
        $data = $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|min:8',
        ]);

        $user = Auth::user();

        if(!Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Текущий пароль неверен']);
        }

        if($data['new_password'] != $data['new_password_confirmation']) {
            return back()->withErrors(['new_password_confirmation' => 'Поля ввода нового пароля не совпадают']);
        }

        $user->password = Hash::make($data['new_password']);

        $user->save();

        return redirect()->route('profile')->with('status', 'Пароль успешно изменен!');
    }
}
