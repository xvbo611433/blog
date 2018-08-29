<?php

namespace App\Http\Middleware;

use Closure;

class CommentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
                // 如果session存在
        if($request->session()->has('comment')){
            return $next($request);//继续执行下一次请求
        }else{
            // 登录页面
            return redirect('/login');
        }

    }
}
