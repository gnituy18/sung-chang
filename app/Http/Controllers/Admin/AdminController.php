<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
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
        return redirect()->route('products.index');
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
            return redirect()->route('products.index');
        } else {
            return redirect()->route('login');
        }
    }
}
