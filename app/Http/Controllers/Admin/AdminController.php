<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthenticationRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'authenticate']);
    }

    public function index()
    {
        $tab = session()->has('tab') ? session('tab') : 'lumber';
        return redirect()->route('products.index', ['category' => $tab]);
    }

    public function resetPassword(Request $request)
    {
        if (Auth::attempt(['name' => 'admin', 'password' => $request->password]) && $request->newpassword1 === $request->newpassword2) {
            $admin = Admin::where('name', 'admin')->first();
            $admin->password = bcrypt($request->newpassword1);
            $admin->save();
        }

        return redirect()->route('others');
    }

    public function functions()
    {
        return view('admin.functions');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('products.index');
        } else {
            return view('admin.login');
        }
    }

    public function authenticate(AdminAuthenticationRequest $request)
    {
        if (Auth::attempt(['name' => 'admin', 'password' => $request->password])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('login');
        }
    }
}
