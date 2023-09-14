<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CheckRouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $protectedRoutes = [
            'admin',
            'diary.index',
            'diary.create',
            'diary.show',
            'diary.edit',
            'diary.update',
            'diary.store',
            'diary.destroy',
            'documentation.index',
            'documentation.create',
            'documentation.store',
            'documentation.show',
            'documentation.edit',
            'documentation.update',
            'documentation.destroy',
            'approvalrequest.index',
            'approvalrequest.create',
            'approvalrequest.store',
            'approvalrequest.show',
            'approvalrequest.edit',
            'approvalrequest.update',
            'approvalrequest.destroy',
            'approval-requests.approve',
            'approval-requests.reject',
            'user.index',
            'user.create',
            'user.store',
            'user.show',
            'user.edit',
            'user.update',
            'user.destroy',
            'profile.index',
            'profile.update',
        ];

        $currentRouteName = $request->route()->getName();
        
        $isProtectedRoute = in_array($currentRouteName, $protectedRoutes);
        // dd($currentRouteName, $isProtectedRoute, Auth::check());

        if ($isProtectedRoute && !Auth::check()) {
            return redirect()->route('not-authorized');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $allowedRoles = [];
            // dd($currentRouteName, $user->role_id);
            if ($currentRouteName === 'admin' || (in_array($currentRouteName,[
                'profile.index',
                'profile.update',
                'diary.index',
                'diary.create',
                'diary.show',
                'diary.edit',
                'diary.store',
                'diary.destroy',
                'diary.update',
                'documentation.index',
                'documentation.create',
                'documentation.store',
                'documentation.show',
                'documentation.edit',
                'documentation.update',
                'documentation.destroy',
            ]))) {
                $allowedRoles = [1, 2, 3];
            } elseif (in_array($currentRouteName, [                    
                    'approvalrequest.index',
                    'approvalrequest.create',
                    'approvalrequest.store',
                    'approvalrequest.show',
                    'approvalrequest.edit',
                    'approvalrequest.update',
                    'approval-requests.approve',
                    'approval-requests.reject',
                ])) {
                $allowedRoles = [1, 2];
            } elseif (in_array($currentRouteName,[
                    'user.index',
                    'user.create',
                    'user.store',
                    'user.show',
                    'user.edit',
                    'user.update',
                    'user.destroy',
            ])) {
                $allowedRoles = [1];
            }
            // Check if the user's role is authorized to access the route
            if (!in_array($user->role, $allowedRoles)) {
                return redirect()->route('not-authorized');
            }
        }
        return $next($request);
    }
}
