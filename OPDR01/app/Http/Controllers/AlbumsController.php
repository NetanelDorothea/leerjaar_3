<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbumRequest;
use App\Album;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('Photo')->get();
        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        if ($file = $request->file('cover_image')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $album = new Album();
                $album->cover_image = $name;
                $album->name = $request->name;
                $album->save();
                return redirect()->route('albums.index')->with(['message' => 'Album added successfully']);
            }
        }
        return view('/albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albums = Album::with('Photo')->find($id);
        return view('albums.show')->with('albums', $albums);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
            $album = Album::findOrFail($id);
            return view('albums.edit', compact('album'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlbumRequest $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->update($request->all());
        return redirect()->route('albums.index')->with(['message' => 'Album updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('albums.index')->with(['message' => 'Album deleted successfully']);
    }

    public function massDestroy(Request $request)
    {
        $albums = explode(',', $request->input('ids'));
        foreach ($albums as $album_id) {
            $album = Album::findOrFail($album_id);
            $album->delete();
        }
        return redirect()->route('albums.index')->with(['message' => 'Albums deleted successfully']);
    }
}
