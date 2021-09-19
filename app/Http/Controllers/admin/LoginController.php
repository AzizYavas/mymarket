<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        } else {
            return view('admin.login');
        }
    }

    public function login(Request $request)
    {

        $request->validate([

            'username' => ['required'],
            'password' => ['required']

        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.login-page')->withErrors('notfound', 'Kullanıcı bulunamadı.');
        }
            Auth::login($admin);

            return redirect()->route('admin.index')->with('true', 'Giriş Başarıyla Yapıldı');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login-page');
    }

    public function register()
    {

        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('admin.register');

    }

    public function registerSave(Request $request)
    {

        $data_ = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];

        Admin::create($data_);

        return view('admin.login');
    }
}
