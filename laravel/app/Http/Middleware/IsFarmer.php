<?php

namespace App\Http\Middleware;

use App\Models\Farmer;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsFarmer
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

        if (auth()->check()) {
            if (!Farmer::where('user_id', auth()->user()->id)->exists()) {
                return redirect('/');
            }
        } else {
            return redirect()->route('create.login');
        }

        return $next($request);
    }
}
