<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password1');
        $role = $request->input('role');

        // Kiểm tra xem người dùng đã tồn tại hay chưa
        $user = User::where('username', $username)->orWhere('email', $username)->first();

        if ($user) {
            return redirect()->route('users.signup')->with('error', 'User already exists');
        } else {
            // Tạo mật khẩu băm
            $passwordHash = Hash::make($password);

            // Tạo người dùng mới
            $newUser = new User();
            $newUser->username = $username;
            $newUser->email = $email;
            $newUser->password = $passwordHash;
            $newUser->role = $role;
            $newUser->save();

            // Gửi email xác nhận, lưu phiên đăng nhập, v.v.
            // ...
            
            return redirect()->route('users.index')->with('info', 'Đăng ký thành công !');
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request)
    {
        //
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)
                    ->orWhere('email', $username)
                    ->first();

        if ($user && Hash::check($password, $user->password)) {
            // Xác thực thành công
            request()->session()->put('lifetime', $user->role);
            return redirect()->route('home.admin');
        } else {
            // Xác thực thất bại
            return redirect()->route('users.index');
        }
    }
}
