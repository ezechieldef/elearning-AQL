<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use HTTP\Models\User;

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
    protected function login(Request $request){

        $user = ModelsUser::where('email', $request-> email)->first();

        if (AuthUser::attempt(['email' => $request->email, 'password' => $request->password])){
            if($user->role === 'ETUDIANT'){
                return redirect()->route('dashboard.etudiant');
            }elseif($user->role === 'PROFESSEUR'){
                return redirect()->route('dashboard.professeur');
            }
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
