<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return "Auth";
        // echo json_encode(auth()->user());
        if(!auth()->user()->confirmed){
            
            return redirect('/success_registration');
        }

        return $next($request);
    }
}
