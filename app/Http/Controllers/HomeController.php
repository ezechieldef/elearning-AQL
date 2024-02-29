<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AvisUtilisateur;

use PDF;

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

        return view('accueil.index');
    }
    function dashboard()
    {
        $user = Auth::user();

        if ($user->estUnAdministrateur()) {
            return  view('dashboard.administateur', compact('user'));
        }

        if ($user->estUnProfesseur()) {
            return  view('dashboard.professeur', compact('user'));
        }

        if ($user->estUnEtudiant()) {
            return view('dashboard.etudiant', compact('user'));
        }

        return redirect("/");
    }

    function accueil()
    {
        return view("accueil.index");
    }
    function contact()
    {
        return view("contact.index");
    }




    public function showFeedbackForm($cours_id)
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur a terminé le cours
        if ($user->courses()->where('cours_id', $cours_id)->wherePivot('isCompleted', true)->exists()) {
            // Affichez le formulaire de feedback
            return view('feedback.form', ['cours_id' => $cours_id]);
        } else {
            // Redirigez l'utilisateur avec un message d'erreur
            return redirect()->route('home')->with('error', 'Vous devez terminer le cours pour donner votre avis.');
        }
    }

    public function submitFeedback(Request $request)
    {

        $validated = $request->validate([
            'note' => 'required',
            'message' => 'required',
        ]);

        AvisUtilisateur::create([
            'user_id' => auth()->user()->id,
            'cours_id' => $request->cours_id,
            'Note' => $request->note,
            'Commentaire' => $request->message,
        ]);

        // Redirigez l'utilisateur ou effectuez d'autres actions nécessaires
        return redirect()->route('home')->with('success', 'Votre avis a été enregistré avec succès.');
    }


    public function telechargerCertificat($cours_id)
    {
        // Logique pour récupérer les données du cours et de l'utilisateur
        $user = auth()->user();

        // Vérifiez si l'utilisateur a terminé le cours
        if ($user->courses()->where('cours_id', $cours_id)->wherePivot('isCompleted', true)->exists()) {

            $data = [];
            $pdf = PDF::loadView('certificat.view', $data);

            return $pdf->download('certificat.pdf');
        } else {
            // Redirigez l'utilisateur avec un message d'erreur
            return redirect()->route('home')->with('error', 'Vous devez terminer le cours pour retirer votre certificat de succès.');
        }
    }
}
