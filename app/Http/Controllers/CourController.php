<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

/**
 * Class CourController
 * @package App\Http\Controllers
 */
class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::paginate();

        return view('cour.index', compact('cours'))
            ->with('i', (request()->input('page', 1) - 1) * $cours->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cour = new Cour();
        return view('cour.create', compact('cour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cour::$rules);

        $cour = Cour::create($request->all());

        return redirect()->route('cours.index')
            ->with('success', 'Cour a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cour = Cour::find($id);

        return view('cour.show', compact('cour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cour = Cour::find($id);

        return view('cour.edit', compact('cour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cour $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cour = Cour::findOrFail($id);
        request()->validate(Cour::$rules);

        $cour->update($request->all());

        return redirect()->route('cours.index')
            ->with('success', 'Cour a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cour = Cour::findOrFail($id);
        $cour->delete();

        return redirect()->route('cours.index')
            ->with('success', 'Cour a été supprimé avec success');
    }
    function coursPublic()
    {
        return view("cour.cours-public");
    }
}
