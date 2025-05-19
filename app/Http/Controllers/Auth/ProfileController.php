<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $userData = Auth::user();
        $userInfo = DB::select('select name, email, created_at from users where id = ' . $userData->id)[0];

        return view('pages.auth.profile', [
            'userData' => $userData,
            'userInfo' => [
                'Логин' => $userInfo->name,
                'E-mail' => $userInfo->email,
                'Дата создания' => $userInfo->created_at,
            ]
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users' . Auth::id(),
        ]);


        $user->update($data);

        return redirect()->route('login');
    }
}
