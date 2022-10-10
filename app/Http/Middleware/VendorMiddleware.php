<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMiddleware
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
        
       
        if (!Auth::check()) {
            // dd(Auth::check());
            Auth::logout();
            // dd("here");
            return redirect()->route('login');
        }
        if(Auth::user()->user_type=="vendor")
        {

        return $next($request);
        }
        else{
            abort(404);
        }
    }
}
