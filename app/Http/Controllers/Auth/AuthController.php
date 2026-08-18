<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 1) {
                return redirect()->route('admin');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email หรือ Password ไม่ถูกต้อง',
        ]);
    }

   // เปลี่ยนจาก postRegistration เป็น postRegister
public function postRegister(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $data = $request->all();
    $check = $this->create($data);

    return redirect()->route('login')
        ->with('success', 'สมัครสมาชิกเรียบร้อยแล้ว กรุณาเข้าสู่ระบบ');
}
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 0,
        ]);
    }

    public function dashboard(): View
    {
        if (!Auth::check()) {
            abort(403);
        }
        return view('dashboard');
    }

    public function admin()
    {
        if (!Auth::check() || Auth::user()->role != 1) {
            abort(403);
        }
        return view('admin');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}