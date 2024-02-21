<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function login_check(Request $request){
        if(empty($request->email) || empty($request->password)){
            return response(['type' => "warning", "message" => __('validate.login.fill_all_fields')]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response(['type' => "warning", "message" => __('validate.login.enter_valid_email')]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Kullanıcı oturum açtı, şimdi status kontrolü yapalım
            $user = Auth::user();
            if ($user->status == 0) {
                // Kullanıcının status değeri 0 ise başarısız oturum açma işlemi
                Auth::logout(); // Oturumu kapat
                return response(['type' => "error", "message" => __('validate.login.permission_denied'), 'status' => false]);
            }
    
            // Oturum açma başarılı
            $request->session()->regenerate();
            return response(['type' => "success", "message" => __('validate.login.success'), 'status' => true]);
        } else {
            // Kullanıcı adı veya parola hatalı
            return response(['type' => "warning", "message" => __('validate.login.invalid_login'), 'status' => false]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
