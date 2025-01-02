<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function loginPost(AdminLoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password],$remember_me)){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with(['error'=>'يوجد خطأ بالبيانات']);
    }
}
