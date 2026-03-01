<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('client')->check()) {
            return redirect()->route('client.login.page');
        }

        $user = Auth::guard('client')->user();

        if (! $user->isAdmin()) {
            abort(403, 'غير مصرح لك بالوصول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
