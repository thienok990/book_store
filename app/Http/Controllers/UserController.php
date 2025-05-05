<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
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
            'email' => 'required|email',
            'fullName' => 'required',
            'password' =>  'required'
        ]);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->fullName,
            'password' => $request->password,
            'role' => 'customer'
        ]);
        Auth::login($user);
        session()->flash('success', 'Đăng nhập thành công!');
        return redirect()->route('index.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->flash('success', 'Đăng nhập thành công!');
            return redirect()->route('index.index');
        }

        // Nếu không thành công
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ])->withInput();
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
