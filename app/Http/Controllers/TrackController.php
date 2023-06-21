<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //para guardar registros en la base de datos
        $request->validate([
            'title' => 'required|max:100',
            'music' => 'required|mimes:mp3',

        ]);
        $path = $request->music->store('public/tracks');
        $track = Track::create([
            'title' => $request->title, 
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
        $title = 'Track edit';
        $route = route('tracks.update', ['track' => $track]);
        $button = 'Update';
        return view('tracks.edit', compact('title', 'route', 'button', 'track'));
      
       
       // return view('tracks.edit',compact('track'));
       // return $track;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
        $request->validate([
            'title' => 'required|min:2|max:100',
            'audio' => 'required|mimes:mp3,duration_max:340',
        ]);
        $path = $track->path;
        if ($request->hasFile('audio')) {
            $track->deleteAudio();
            $path = $request->audio->store('public/audios');
        }
        $track->fill([
            'title' => $request->title,
            'path' => $path,
        ]);
        $track->save();
        return redirect()->route('tracks.index')->with('success', 'Edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
        $track->delete();
        return redirect()->route('tracks.index');

    }

}
