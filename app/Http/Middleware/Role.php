<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, String $role) {
    //Redirect to homepage if user not authenticated
    if (!Auth::check())
      return redirect('/');

    $user = Auth::user();
    // If role is sufficent, redirect to requested route
    if($user->role == $role)
      return $next($request);
    // If not redirect to homepage
    return redirect('/');
  }
  
}