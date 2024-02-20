<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use Illuminate\Http\Request;

/**
 * Class ReponseController
 * @package App\Http\Controllers
 */
class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reponses = Reponse::paginate();

        return view('reponse.index', compact('reponses'))
            ->with('i', (request()->input('page', 1) - 1) * $reponses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reponse = new Reponse();
        return view('reponse.create', compact('reponse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reponse::$rules);

        $reponse = Reponse::create($request->all());

        return redirect()->route('reponses.index')
            ->with('success', 'Reponse a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reponse = Reponse::find($id);

        return view('reponse.show', compact('reponse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reponse = Reponse::find($id);

        return view('reponse.edit', compact('reponse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reponse $reponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id )
    {
        $reponse = Reponse::findOrFail($id);
        request()->validate(Reponse::$rules);

        $reponse->update($request->all());

        return redirect()->route('reponses.index')
            ->with('success', 'Reponse a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reponse = Reponse::findOrFail($id);
        $reponse->delete();

        return redirect()->route('reponses.index')
            ->with('success', 'Reponse a été supprimé avec success');
    }
}
