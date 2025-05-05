<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('index.index')->with('error', 'Bạn phải đăng nhập!');;  // Redirect về trang chủ nếu chưa đăng nhập
        }

        $user = Auth::user();

        // Kiểm tra quyền của người dùng
        if ($user->role !== $role) {
            abort(403, 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
