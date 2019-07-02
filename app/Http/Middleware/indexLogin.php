<?php

namespace App\Http\Middleware;

use Closure;

class indexLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->session()->get('thisUser'))) {

            if (empty($request->session()->get('thisUser'))) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'errorCode' => '501',
                        'errorMsg' => '您还未登录',
                        'data' => [],
                    ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
                }

                return redirect("login");
            }
            return $next($request);
        }
    }
}
