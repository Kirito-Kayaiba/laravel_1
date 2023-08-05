<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy role của người dùng
        $role = auth()->user()->role;
        
        // Kiểm tra nếu role là 1 hoặc 2, chuyển hướng đến trang báo lỗi không có quyền truy cập
        if ($role <= 2) {
            abort(403); // '403' là tên route của trang báo lỗi không có quyền truy cập
        }
        return $next($request);
    }
}
