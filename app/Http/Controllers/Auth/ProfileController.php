<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $userData = Auth::user();
        $userInfo = DB::table('users')
            ->select('name', 'email', DB::raw('DATE(created_at) as created_at'))
            ->where('id', $userData->id)
            ->first();

        return view('pages.auth.profile', [
            'userData' => $userData,
            'userInfo' => [
                'Логин'         => $userInfo->name,
                'E-mail'        => $userInfo->email,
                'Дата создания' => $userInfo->created_at,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users' . Auth::id(),
        ]);

        $user->update($data);

        return redirect()->route('login');
    }
}
