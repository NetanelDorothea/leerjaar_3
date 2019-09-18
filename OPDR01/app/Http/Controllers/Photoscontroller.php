<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;

class Photoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Album::find(21)->Photo;
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Photo::create($request->all());
//        return redirect()->route('photos.index')->with(['message' => 'Photo added successfully']);
//        dd($request->file);
        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            if ($file->move('images', $name)) {
                $photo = new Photo();
                $photo->photo = $name;
                $photo->album_id = $request->album_id;
                $photo->save();
                return redirect()->route('albums.show',$request->album_id)->with(['message' => 'Photo added successfully']);
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
    public function show($album_id)
    {
        return view('photos.show')->with('album_id', $album_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return redirect()->route('albums.index')->with(['message' => 'Photo deleted successfully']);
    }
}
