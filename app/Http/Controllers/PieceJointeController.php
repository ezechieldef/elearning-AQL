<?php

namespace App\Http\Controllers;

use App\Models\PieceJointe;
use Illuminate\Http\Request;

/**
 * Class PieceJointeController
 * @package App\Http\Controllers
 */
class PieceJointeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieceJointes = PieceJointe::paginate();

        return view('piece-jointe.index', compact('pieceJointes'))
            ->with('i', (request()->input('page', 1) - 1) * $pieceJointes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieceJointe = new PieceJointe();
        return view('piece-jointe.create', compact('pieceJointe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PieceJointe::$rules);

        $pieceJointe = PieceJointe::create($request->all());

        return redirect()->route('piece-jointes.index')
            ->with('success', 'PieceJointe a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pieceJointe = PieceJointe::find($id);

        return view('piece-jointe.show', compact('pieceJointe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pieceJointe = PieceJointe::find($id);

        return view('piece-jointe.edit', compact('pieceJointe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PieceJointe $pieceJointe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id )
    {
        $pieceJointe = PieceJointe::findOrFail($id);
        request()->validate(PieceJointe::$rules);

        $pieceJointe->update($request->all());

        return redirect()->route('piece-jointes.index')
            ->with('success', 'PieceJointe a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pieceJointe = PieceJointe::findOrFail($id);
        $pieceJointe->delete();

        return redirect()->route('piece-jointes.index')
            ->with('success', 'PieceJointe a été supprimé avec success');
    }
}
