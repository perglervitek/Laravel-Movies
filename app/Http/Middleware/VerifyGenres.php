<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Genres;
use Illuminate\Http\Request;

class VerifyGenres
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Prevention for creating a movie if there is not any genre
        if(Genres::all()->count() == 2){
            session()->flash('error', 'Pro přidání filmu musí být vytvořena alespoň jedna kategorie.');
            return redirect(route('genres.index'));
        }
        return $next($request);
    }
}
