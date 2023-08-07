<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            if(isset(auth()->guard('admin')->user()->id)) return redirect()->route('admin.product.info');
            return view('admin.login');
        }

        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.product.info');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function check(){
        if(isset(auth()->guard('admin')->user()->id)) return redirect()->route('admin.product.info');
        return view('admin.login');
    }

}
