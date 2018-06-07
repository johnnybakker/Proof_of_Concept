<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenAuthenticator
{
    public function handle($request, Closure $next, $guard = null)
    {
        $message = "";
        $key = "ylEGjngQHqX35NWcNiFTd4jiCN082ltb9a4f37xMYRxnI0sdkeoha3NhPOB9gVJt";
        if(isset($request["key"])){
            if($key == $request["key"])
                return $next($request);
            else
                $message = "Invalid key";
        }
        else{
            $message = "No key given";
        }
        return "{ error: " . $message . " }";
    }
}
