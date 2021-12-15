<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login',['login'=>'teacher']);
    }


    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $academic_year=DB::table('academic_years')->latest()->first();
           
            if (Auth::user()->is_super==1) {
                return redirect()->route('home');
            }
            else if (DB::table('committee_staff')
            ->where('academic_year_id',$academic_year->id)
            ->where('staff_id',Auth::user()->id)
            ->where('role','leader')
            ->exists()
            ){
                return redirect()->route('add_student');
            }
          
        }else{
            return redirect()->back()
                ->with('error','Email-Address Or Password Are Wrong.');
        }
        
    }
}
