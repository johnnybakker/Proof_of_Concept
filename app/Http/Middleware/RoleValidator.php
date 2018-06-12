<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;
use App\User;

class RoleValidator
{
    public function handle($request, Closure $next, $role = null)
    {

        $userid = Auth::user()->id;
        $user = User::find($userid);
        $foundRole = $user->roles()->where("name", $role)->first();
        if(isset($foundRole))
            return $next($request);
        else
            return back();
    }
}