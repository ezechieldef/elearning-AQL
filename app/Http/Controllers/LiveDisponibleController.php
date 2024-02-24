<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\LiveDisponible;

/**
 * Class LiveDisponibleController
 * @package App\Http\Controllers
 */
class LiveDisponibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeur = auth()->user();
        $liveDisponibles = $professeur->liveDisponibles()->paginate();

        return view('live-disponible.index', compact('liveDisponibles'))
            ->with('i', (request()->input('page', 1) - 1) * $liveDisponibles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liveDisponible = new LiveDisponible();
        $categories = Category::pluck("Libelle", "id");

        return view('live-disponible.create', compact('liveDisponible', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'categorie_id' => 'required|exists:categories,id',
            'Titre' => 'required|string|max:255',
            'Description' => 'required',
        ]);
        $all = $request->all();
        $all['professeur_id'] = auth()->id();
        $liveDisponible = LiveDisponible::create($all);

        return redirect()->route('proposition-live.index')
            ->with('success', 'LiveDisponible a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liveDisponible = LiveDisponible::find($id);

        return view('live-disponible.show', compact('liveDisponible'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liveDisponible = LiveDisponible::find($id);
        $categories = Category::pluck("Libelle", "id");
        if ($liveDisponible->professeur_id != auth()->id()) {
            return redirect()->route('proposition-live.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier ce live');
        }

        return view('live-disponible.edit', compact('liveDisponible', "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LiveDisponible $liveDisponible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $liveDisponible = LiveDisponible::findOrFail($id);
        request()->validate([
            'categorie_id' => 'required|exists:categories,id',
            'Titre' => 'required|string|max:255',
            'Description' => 'required',
        ]);
        $all = $request->all();
        $all['professeur_id'] = auth()->id();
        $liveDisponible->update($all);

        return redirect()->route('proposition-live.index')
            ->with('success', 'LiveDisponible a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $liveDisponible = LiveDisponible::findOrFail($id);
        $liveDisponible->delete();

        return redirect()->route('proposition-live.index')
            ->with('success', 'LiveDisponible a été supprimé avec success');
    }
    function publish(int $id)
    {
        $cour = LiveDisponible::findOrFail($id);
        if ($cour->professeur_id != auth()->id()) {
            return redirect()->route('cours.index')
                ->with('error', 'Vous n\'êtes pas autorisé à publier ce cours');
        }
        $cour->isPublished = !$cour->isPublished;
        $cour->save();
        return redirect()->route('proposition-live.index')
            ->with('success', "L'état de publication du live a été modifié avec succès");
    }

    function livePublics()
    {
        $lives = LiveDisponible::livesDuPulic()->paginate();

        return view('live-disponible.live-public', compact('lives'))
            ->with('i', (request()->input('page', 1) - 1) * $lives->perPage());
    }
}
