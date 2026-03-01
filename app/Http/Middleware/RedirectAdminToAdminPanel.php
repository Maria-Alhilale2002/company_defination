<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdminToAdminPanel
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق إذا كان المستخدم مسجل دخول بـ guard client
        if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user();

            // إذا كان أدمن وفي الصفحة الرئيسية، وجهه لصفحة الأدمن
            if ($user->isAdmin() && $request->routeIs('index')) {
                return redirect()->route('admin');
            }
        }

        return $next($request);
    }
}
