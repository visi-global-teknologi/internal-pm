<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authGuard = app('auth')->guard();

        if ($authGuard->guest())
            return redirect()->route('login');

        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();
        $currentRouteName = Route::currentRouteName();

        if ($permissions->count() < 1)
            return redirect()->route('home')->withErrors(['message' => 'You don\'t have permission for the process']);

        if ($permissions->contains(function ($permission) use ($currentRouteName) {
            return $permission->name === $currentRouteName;
        })) {
            return $next($request);
        } else {
            return redirect()->route('home')->withErrors(['message' => 'You don\'t have permission for the process']);
        }
    }
}
