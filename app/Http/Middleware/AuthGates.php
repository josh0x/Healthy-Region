<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        // if logged in user, we get the roles...
        if ($user) {
            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];

            // for each permission of the roles...
            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            // Gate define what access: depending on role (student or admin)
            // Then we assign AuthGates in all pages from within 'Kernel'
            foreach ($permissionsArray as $title => $roles) {
                // Defines whether admin or student access with Gate ( true or false)
                Gate::define($title, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
