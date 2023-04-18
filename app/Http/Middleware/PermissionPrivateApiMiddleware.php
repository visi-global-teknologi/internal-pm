<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PermissionPrivateApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'uuid_user_encrypted' => 'required',
        ]);

        try {
            $decrypted = Crypt::decryptString($request->uuid_user_encrypted);
            $currentRouteName = Route::currentRouteName();
            $user = User::where('uuid', $decrypted)->firstOrFail();
            $permissions = $user->getPermissionsViaRoles();
            if ($permissions->contains(function ($permission) use ($currentRouteName) {
                return $permission->name === $currentRouteName;
            })) {
                return $next($request);
            } else {
                abort(400, 'You don\'t have permission for the process');
            }
        } catch (\Exception $e) {
            abort(400, $e->getMessage());
        } catch (DecryptException $e) {
            abort(400, $e->getMessage());
        }
    }
}
