<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'signUpEmail' => 'required|email:rfc,dns|unique:user,email',
            'signUpname' => 'required|string|min:3|max:50',
            'signUpPassword' => [
                'required',
                Password::min(6)
                    ->mixedCase()   // Chữ hoa + thường
                    ->numbers()     // Số   // Ký tự đặc biệt
            ],
        ]);
        $user = User::create([
            'email' => $request->signUpEmail,
            'name' => $request->signUpname,
            'password' => bcrypt($request->signUpPassword),
            'role' => 'customer'
        ]);
        Auth::login($user);
        session()->flash('success', 'Đăng nhập thành công!');
        return redirect()->route('index.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);
        $user = User::where('email', $request->loginEmail)->first();

        if (!$user) {
            return back()->withErrors([
                'loginEmail' => 'Email không tồn tại.',
            ])->withInput()->with('login', 'loginModal');
        }
        if (!Hash::check($request->loginPassword, $user->password)) {
            return back()->withErrors([
                'loginPassword' => 'Mật khẩu không đúng.',
            ])->withInput()->with('login', 'loginModal');
        }
        Auth::login($user);
        session()->flash('success', 'Đăng nhập thành công!');
        return redirect()->route('index.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        return view('client.components.info', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', $request->dateofbirth)->format('Y-m-d'),
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
        return redirect()->route('user.show')->with('success', 'Cập nhật thông tin thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
