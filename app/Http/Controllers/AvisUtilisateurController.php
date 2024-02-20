<?php

namespace App\Http\Controllers;

use App\Models\AvisUtilisateur;
use Illuminate\Http\Request;

/**
 * Class AvisUtilisateurController
 * @package App\Http\Controllers
 */
class AvisUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avisUtilisateurs = AvisUtilisateur::paginate();

        return view('avis-utilisateur.index', compact('avisUtilisateurs'))
            ->with('i', (request()->input('page', 1) - 1) * $avisUtilisateurs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avisUtilisateur = new AvisUtilisateur();
        return view('avis-utilisateur.create', compact('avisUtilisateur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AvisUtilisateur::$rules);

        $avisUtilisateur = AvisUtilisateur::create($request->all());

        return redirect()->route('avis-utilisateurs.index')
            ->with('success', 'AvisUtilisateur a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avisUtilisateur = AvisUtilisateur::find($id);

        return view('avis-utilisateur.show', compact('avisUtilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avisUtilisateur = AvisUtilisateur::find($id);

        return view('avis-utilisateur.edit', compact('avisUtilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AvisUtilisateur $avisUtilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id )
    {
        $avisUtilisateur = AvisUtilisateur::findOrFail($id);
        request()->validate(AvisUtilisateur::$rules);

        $avisUtilisateur->update($request->all());

        return redirect()->route('avis-utilisateurs.index')
            ->with('success', 'AvisUtilisateur a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $avisUtilisateur = AvisUtilisateur::findOrFail($id);
        $avisUtilisateur->delete();

        return redirect()->route('avis-utilisateurs.index')
            ->with('success', 'AvisUtilisateur a été supprimé avec success');
    }
}
