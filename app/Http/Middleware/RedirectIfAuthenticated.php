<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // إذا كان المستخدم يحاول الوصول لصفحة التسجيل وهو مسجل دخول
                if ($request->routeIs('client.register.page')) {
                    // إذا كان أدمن، وجهه لصفحة إنشاء مستخدم جديد
                    if ($user->isAdmin()) {
                        return redirect()->route('admin.create.user');
                    }

                    // إذا كان مستخدم عادي، وجهه للملف الشخصي
                    return redirect()->route('client.profile');
                }

                // إذا كان يحاول الوصول لصفحة تسجيل الدخول وهو مسجل دخول
                if ($request->routeIs('client.login.page')) {
                    // وجه المستخدم المسجل (أدمن أو عادي) إلى البروفايل
                    return redirect()->route('client.profile');
                }
            }
        }

        return $next($request);
    }
}
