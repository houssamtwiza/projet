<?php

namespace App\Http\Middleware;
use App\Model\User;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { if (Auth::check()) {
        
        
       if (\Illuminate\Support\Facades\Auth::user()->isAdmin()) {
            return $next($request);
          
        }else {
            return redirect(route('editor_dashboard'));
        }

    }
    abort(403);
}
  

        
    
}
