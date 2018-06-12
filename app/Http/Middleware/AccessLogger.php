<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Closure;
class AccessLogger
{
    public function handle($request, Closure $next)
    {
        $start = microtime(true);
        $request["request_start"] = round($start * 1000);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $end = microtime(true);
        $request["request_end"] = round($end * 1000);
        $this->log($request, $response);
    }

    protected function log($request, $response)
    {
        $start = $request["request_start"];
        $end = $request["request_end"];
        $duration = $end - $start;
        $url = $request->fullUrl();
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $status = $response->status();

        $log = "{$ip}: [{$status}] {$method}@{$url} - {$duration}ms";

        Log::channel("accesslog")->info($log);
    }
}