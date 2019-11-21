<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        session(['user'=>'hhh']);
//        $user = session('user');
//        echo "pppp";
//        dd($user);
//        dd(!$request->session()->has('user'));
        if(!$request->session()->has('user')){
            return redirect('/admin/add');
        }

        return $next($request);
    }
}
