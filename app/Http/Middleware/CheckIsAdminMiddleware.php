<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->user()->is_admin);
        // ユーザーが管理者であれば admin.home にリダイレクトする
        if ($request->user()->is_admin === 1) {
            return redirect()->route('admindashboard');
        }

        // // それ以外の場合は user.home にリダイレクトする
        return $next($request);
    }
}
