<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'vendor' => $request->vendor
        ]);
        return view('user.user')->with('success','Berhasil tambah user');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function onLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $vendor = 'db_'.$user->vendor;

            config(['database.connections.mysql.database' => $vendor]);
            DB::purge('mysql');
            DB::reconnect('mysql');
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function home()
    {
        $vendor = auth()->user()->vendor;
        $employees = Employee::all();
        return view('home.home',compact('vendor','employees'));
    }
}
