<?php

namespace App\Http\Controllers;

use App\Models\Composition;
use Illuminate\Http\Request;

/**
 * Class CompositionController
 * @package App\Http\Controllers
 */
class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compositions = Composition::paginate();

        return view('composition.index', compact('compositions'))
            ->with('i', (request()->input('page', 1) - 1) * $compositions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $composition = new Composition();
        return view('composition.create', compact('composition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Composition::$rules);

        $composition = Composition::create($request->all());

        return redirect()->route('compositions.index')
            ->with('success', 'Composition a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $composition = Composition::find($id);

        return view('composition.show', compact('composition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $composition = Composition::find($id);

        return view('composition.edit', compact('composition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Composition $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id )
    {
        $composition = Composition::findOrFail($id);
        request()->validate(Composition::$rules);

        $composition->update($request->all());

        return redirect()->route('compositions.index')
            ->with('success', 'Composition a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $composition = Composition::findOrFail($id);
        $composition->delete();

        return redirect()->route('compositions.index')
            ->with('success', 'Composition a été supprimé avec success');
    }
}
