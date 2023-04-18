<?php

namespace App\Http\Middleware;

use App\Models\UserActivity;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoggingUserActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        UserActivity::create([
            'date_time' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'module_name' => $request->module_name,
            'activity' => $request->activity,
            'user_id' => $request->user_id_executor,
        ]);

        return $response;
    }
}
