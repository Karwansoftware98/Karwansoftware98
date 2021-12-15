<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\academic_year;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
     
   
      
    //   $c = DB::table('academic_year_staff')
    //   ->select('s.name as staff_name','role')
    //   ->join('academic_years','academic_year_staff.academic_year_id','=','academic_years.id')
    //   ->join('staff as s','academic_year_staff.staff_id','=','s.id')
    //   ->get();
  
        
       
        if(Auth::guard('web')->check()){

            if(Auth::user()->is_super){
            
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
