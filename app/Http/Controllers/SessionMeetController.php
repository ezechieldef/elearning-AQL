<?php

namespace App\Http\Controllers;

use App\Models\SessionMeet;
use Illuminate\Http\Request;

/**
 * Class SessionMeetController
 * @package App\Http\Controllers
 */
class SessionMeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessionMeets = SessionMeet::paginate();

        return view('session-meet.index', compact('sessionMeets'))
            ->with('i', (request()->input('page', 1) - 1) * $sessionMeets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessionMeet = new SessionMeet();
        return view('session-meet.create', compact('sessionMeet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SessionMeet::$rules);

        $sessionMeet = SessionMeet::create($request->all());

        return redirect()->route('session-meets.index')
            ->with('success', 'SessionMeet a été enregistré avec succès !.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sessionMeet = SessionMeet::find($id);

        return view('session-meet.show', compact('sessionMeet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sessionMeet = SessionMeet::find($id);

        return view('session-meet.edit', compact('sessionMeet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SessionMeet $sessionMeet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $sessionMeet = SessionMeet::findOrFail($id);
        request()->validate(SessionMeet::$rules);

        $sessionMeet->update($request->all());

        return redirect()->route('session-meets.index')
            ->with('success', 'SessionMeet a été mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sessionMeet = SessionMeet::findOrFail($id);
        $sessionMeet->delete();

        return redirect()->route('session-meets.index')
            ->with('success', 'SessionMeet a été supprimé avec success');
    }
}
