<?php

namespace App\Http\Controllers;

use App\Models\SuivreCour;
use Illuminate\Http\Request;

/**
 * Class SuivreCourController
 * @package App\Http\Controllers
 */
class SuivreCourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suivreCours = SuivreCour::paginate();

        return view('suivre-cour.index', compact('suivreCours'))
            ->with('i', (request()->input('page', 1) - 1) * $suivreCours->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suivreCour = new SuivreCour();
        return view('suivre-cour.create', compact('suivreCour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SuivreCour::$rules);

        $suivreCour = SuivreCour::create($request->all());

        return redirect()->route('suivre-cours.index')
            ->with('success', 'SuivreCour a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suivreCour = SuivreCour::find($id);

        return view('suivre-cour.show', compact('suivreCour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suivreCour = SuivreCour::find($id);

        return view('suivre-cour.edit', compact('suivreCour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SuivreCour $suivreCour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id )
    {
        $suivreCour = SuivreCour::findOrFail($id);
        request()->validate(SuivreCour::$rules);

        $suivreCour->update($request->all());

        return redirect()->route('suivre-cours.index')
            ->with('success', 'SuivreCour a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $suivreCour = SuivreCour::findOrFail($id);
        $suivreCour->delete();

        return redirect()->route('suivre-cours.index')
            ->with('success', 'SuivreCour a été supprimé avec success');
    }
}
