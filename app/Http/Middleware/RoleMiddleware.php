<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // get currentlly authenticated user
        $user=$request->user();
        // check if user has any of the roles in array of roles
        if(!in_array($user->role,$roles)){
            return response()->json([
                'message' =>'Unauthorized user'
            ],403);
        }
        // is the role is allowed continue to the next middleware/route
        return $next($request);
    }
}
