<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Providers\FileUploadService;

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
        $professeur = auth()->user();
        $cours = $professeur->cours()->paginate();

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
        $cour->professeur_id = auth()->id();
        $categories = Category::pluck("Libelle", "id");

        return view('cour.create', compact('cour', "categories"));
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
            'Description' => 'required|string|max:255',
            'Contenu' => 'required|string',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $all = $request->all();
        $all['Professeur_id'] = auth()->id();
        $uploaded = (new FileUploadService())->handleUpload(request: $request);
        $all = array_merge($all, $uploaded);
        $cour = Cour::create($all);

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
        $categories = Category::pluck("Libelle", "id");
        if ($cour->Professeur_id != auth()->id()) {
            return redirect()->route('cours.index')
                ->with('error', 'Vous n\'êtes pas autorisé à modifier ce cours');
        }

        return view('cour.edit', compact('cour', 'categories'));
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
        request()->validate([
            'categorie_id' => 'required|exists:categories,id',
            'Titre' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Contenu' => 'required|string',
            'Image' => ($cour->imageExists() ? "nullable" : "required") . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $all = $request->all();
        $all['Professeur_id'] = auth()->id();
        $uploaded = (new FileUploadService())->handleUpload(request: $request);
        $all = array_merge($all, $uploaded);
        $cour->update($all);

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
        $cours = Cour::coursDuPulic();

        return view("cour.cours-public", compact("cours"))
            ->with('i', (request()->input('page', 1) - 1) * $cours->perPage());
    }
    function publish(int $id)
    {
        $cour = Cour::findOrFail($id);
        if ($cour->Professeur_id != auth()->id()) {
            return redirect()->route('cours.index')
                ->with('error', 'Vous n\'êtes pas autorisé à publier ce cours');
        }

        $cour->isPublished = !$cour->isPublished;
        $cour->save();
        return redirect()->route('cours.index')
            ->with('success', "L'état de publication du cours a été modifié avec succès");
    }
}
