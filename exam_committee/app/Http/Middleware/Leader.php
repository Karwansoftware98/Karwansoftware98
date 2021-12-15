<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Leader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check()){

            $academic_year=DB::table('academic_years')->latest()->first();

            if(Auth::user()->is_super
             ||
            (DB::table('committee_staff')
            ->where('academic_year_id',$academic_year->id)
            ->where('staff_id',Auth::user()->id)
            ->where('role','leader')
            ->exists()
            )
            
            ){
            
                return $next($request);
            }
            else {
               
                return redirect('/');
            }
           
        }
        else {
           return redirect('/');
        }
    }
}
