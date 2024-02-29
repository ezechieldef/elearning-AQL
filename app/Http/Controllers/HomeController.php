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
     * Constructeur de la classe.
     *
     * Initialise le contrôleur. Middleware d'authentification peut être activé pour restreindre l'accès.
     *
     * @return void
     */
    public function __construct()
    {
        // Activation du middleware d'authentification si nécessaire.
        // $this->middleware('auth');
    }

    /**
     * Affiche la page d'accueil de l'application.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retourne la vue de l'accueil.
     */
    public function index()
    {
        return view('accueil.index');
    }

    /**
     * Affiche le tableau de bord de l'utilisateur connecté.
     *
     * Redirige l'utilisateur vers un tableau de bord spécifique en fonction de son rôle
     * (Administrateur, Professeur, Étudiant) ou vers la page d'accueil si aucun rôle spécifique n'est trouvé.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Vue du tableau de bord ou redirection.
     */
    function dashboard()
    {
        $user = Auth::user();

        if ($user->estUnAdministrateur()) {
            return view('dashboard.administateur', compact('user'));
        }

        if ($user->estUnProfesseur()) {
            return view('dashboard.professeur', compact('user'));
        }

        if ($user->estUnEtudiant()) {
            return view('dashboard.etudiant', compact('user'));
        }

        return redirect("/");
    }

    /**
     * Affiche la page d'accueil.
     *
     * @return \Illuminate\View\View Vue de la page d'accueil.
     */
    function accueil()
    {
        return view("accueil.index");
    }

    /**
     * Affiche la page de contact.
     *
     * @return \Illuminate\View\View Vue de la page de contact.
     */
    function contact()
    {
        return view("contact.index");
    }

    /**
     * Affiche le formulaire de feedback pour un cours spécifique.
     *
     * Vérifie si l'utilisateur a terminé le cours avant d'afficher le formulaire de feedback.
     * Redirige avec un message d'erreur si le cours n'est pas terminé.
     *
     * @param int $cours_id Identifiant du cours.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Vue du formulaire de feedback ou redirection.
     */
    public function showFeedbackForm($cours_id)
    {
        $user = auth()->user();

        // Vérifie si l'utilisateur a terminé le cours.
        if ($user->courses()->where('cours_id', $cours_id)->wherePivot('isCompleted', true)->exists()) {
            return view('feedback.form', ['cours_id' => $cours_id]);
        } else {
            return redirect()->route('home')->with('error', 'Vous devez terminer le cours pour donner votre avis.');
        }
    }

    /**
     * Traite la soumission du formulaire de feedback.
     *
     * Valide les données du formulaire et enregistre le feedback dans la base de données.
     * Redirige l'utilisateur avec un message de succès après l'enregistrement.
     *
     * @param \Illuminate\Http\Request $request Données de la requête.
     * @return \Illuminate\Http\RedirectResponse Redirection vers la page d'accueil avec un message de succès.
     */
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

        return redirect()->route('home')->with('success', 'Votre avis a été enregistré avec succès.');
    }

    /**
     * Permet à l'utilisateur de télécharger un certificat de réussite pour un cours terminé.
     *
     * Vérifie si l'utilisateur a terminé le cours avant de générer et de fournir le téléchargement du certificat.
     * Redirige avec un message d'erreur si le cours n'est pas terminé.
     *
     * @param int $cours_id Identifiant du cours.
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse Redirection ou téléchargement du certificat.
     */
    public function telechargerCertificat($cours_id)
    {
        $user = auth()->user();

        // Vérifie si l'utilisateur a terminé le cours.
        if ($user->courses()->where('cours_id', $cours_id)->wherePivot('isCompleted', true)->exists()) {

            $data = [];
            $pdf = PDF::loadView('certificat.view', $data);

            return $pdf->download('certificat.pdf');
        } else {
            return redirect()->route('home')->with('error', 'Vous devez terminer le cours pour retirer votre certificat de succès.');
        }
    }
}
