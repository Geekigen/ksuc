<?php

namespace App\Http\Middleware;

use App\Models\studentnominal;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class nominal
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
        $signed=studentnominal::where('name',Auth::user()->email)->exists();
        if ($signed) {
            return $next($request);
        }
        else{
            return redirect('/student');
        }
    }
}
