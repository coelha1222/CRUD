<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str; 

use App\Models\Music;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musics = Music::all();

        return Inertia::render('Musics/Index',[
                'musics' => $musics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Musics/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'required',
        ]);
        Music::create([
            'name' => $request->name,
            'artist' => $request->artist,
            'album' => $request->album
        ]);
        sleep(1);

        return redirect()->route('musics.index')->with('message', 'Music Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        return Inertia::render(
            'Musics/Edit',
            [
                'music' => $music
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'required',
        ]);

        $music->name = $request->name;
        $music->artist = $request->artist;
        $music->album = $request->album;
        $music->save();
        sleep(1);

        return redirect()->route('musics.index')->with('message', 'Musics Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        $music->delete();
        sleep(1);

        return redirect()->route('musics.index')->with('message', 'Music Delete Successfully');
    }
}
