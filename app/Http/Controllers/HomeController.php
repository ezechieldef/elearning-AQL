<?php

namespace App\Http\Controllers;

use App\Models\AvisUtilisateur;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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





    public function showFeedbackForm($course_id)
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur a terminé le cours
        if ($user->courses()->where('course_id', $course_id)->wherePivot('completed', true)->exists()) {
            // Affichez le formulaire de feedback
            return view('feedback.form', ['course_id' => $course_id]);
        } else {
            // Redirigez l'utilisateur avec un message d'erreur
            return redirect()->route('cours.index')->with('error', 'Vous devez terminer le cours pour donner votre avis.');
        }
    }

    public function submitFeedback(Request $request)
    {

        $validated = $request->validate([
            'note' => 'required',
            'message' => 'required',
        ]);
        
        return view('home');
    }
}
