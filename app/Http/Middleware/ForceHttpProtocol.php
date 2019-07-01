<?php

namespace App\Http\Middleware;
use Closure;

class ForceHttpProtocol {

  public function handle($request, Closure $next) {
      if (!$request->secure() && config('app.env') == 'prod') { // 本番環境のみ常時SSL化する
          return redirect()->secure($request->getRequestUri());
      }

      return $next($request);
  }

}