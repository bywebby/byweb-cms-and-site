<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthForm;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login(AuthForm $request)
    {
        $data = $request->only(['email', 'password']);
//сравнивает в базе данных users с введенными данными + сам делает хэш данных для сравнения
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'is_admin' => 1])) {
            // Authentication was successful...
            return redirect()->route('admin.index');
        }
        // No Authentication
        return redirect()->back()->with('error', 'Логин или пароль не верен');
    }

//Выход с админки
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }


}
