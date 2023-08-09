<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckArticleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $articleId = $request->route('id'); // Đọc ID bài viết từ route parameter
        //lấy 1 id_user từ $articleId
        $id_user = \DB::table('tin')->where('id', $articleId)->value('id_user');
        $user = auth()->user();
        //lấy role user
        $role_user = auth()->user()->role;
    
        if ($user && $user->id == $id_user || $role_user == 3) {
            return $next($request);
        }
    
        abort(403); // Chuyển hướng khi không có quyền truy cập
    }    
}
