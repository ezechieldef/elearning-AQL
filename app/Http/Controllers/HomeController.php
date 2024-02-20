<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    function dashboard()
    {
        $user = Auth::user();
        // $user->assignRole('PROFESSEUR');
        return view('dashboard.index', compact('user'));
    }

    function accueil()
    {
        return view("accueil.index");
    }
    function contact()
    {
        return view("contact.index");
    }
}
