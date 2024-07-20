<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('user.sigin');
    }

    public function sigin(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->route('index');
        }


        return redirect()->route('user.sigin')
            ->withErrors(['email' => 'Thông tin đăng nhập không đúng'])
            ->withInput();
    }

    public function sigup(){
        return view('user.sigup');
    }
    public function register(Request $request){
       $request->merge(['password' => Hash::make($request->password)]);
       User::create($request->all());
       return redirect()->route('user.sigin')->with('success', 'Tạo tài khoản thành công');
    }


}
