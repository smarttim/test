<?php
namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
      if (!session('admin'))
      {
        return redirect('/login')->with('info','请先登录');
      }
      return $next($request);
    }
}
