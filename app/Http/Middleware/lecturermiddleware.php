<?php

namespace App\Http\Middleware;

use App\Models\lecturer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lecturermiddleware
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
        $usermail=Auth::user()->email;
        $lec=lecturer::where('mail','LIKE','%'.$usermail.'%')
    ->exists();
    If (!$lec){
        return back()->with('alert', 'NOT ALLOWED');
                }
        return $next($request);
    }
}
