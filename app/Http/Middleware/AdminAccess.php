<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
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
      $titles_for_access = [
        "Priest",
        "Deacon",
        "Lay Minister",
        "Choir Member",
        "Web Administrator"
      ];
      $has_access = false;
      foreach($titles_for_access as $one_title) {
        if ($request->user()->check_for_role($one_title)) {
          $has_access = true;
        };
      };
      if (!$has_access) {
        abort(403, "This page is restricted to parish staff.");
      };
      return $next($request);
    }
}
