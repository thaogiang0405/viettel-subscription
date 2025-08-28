<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('register');
    }

    // Xử lý đăng ký: gửi OTP
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'nullable|string|max:50',
        ]);

        // Sinh mã OTP
        $otp = rand(100000, 999999);

        // Gửi OTP qua email
        Mail::to($validated['email'])->send(new OtpMail($otp));

        // Lưu dữ liệu đăng ký + otp tạm thời vào session
        session([
            'register_data' => $validated,
            'otp' => $otp,
        ]);

        return redirect()->route('otp.form')->with('status', 'Mã OTP đã được gửi đến email của bạn.');
    }

    // Hiển thị form OTP
    public function showOtpForm()
    {
        return view('otp');
    }

    // Xử lý OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'Mã OTP không chính xác!']);
        }

        $data = session('register_data');

        // Tạo user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'user',
        ]);

        Auth::login($user);

        session()->forget(['register_data', 'otp']);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }


public function resendOtp()
{
    $data = session('register_data');
    if (!$data) {
        return redirect()->route('register')->withErrors('Phiên đăng ký đã hết hạn, vui lòng đăng ký lại.');
    }

    // Sinh lại OTP
    $otp = rand(100000, 999999);

    // Lưu vào session
    session(['otp' => $otp]);

    // Gửi mail
    Mail::to($data['email'])->send(new OtpMail($otp));

    return back()->with('status', 'Mã OTP mới đã được gửi đến email của bạn.');
}

}
