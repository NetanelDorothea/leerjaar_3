<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class PagesController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photo')->get();
        return view('useralbums.index')->with('albums', $albums);
    }

    public function show($id)
    {
        $albums = Album::with('Photo')->find($id);
        return view('useralbums.show')->with('albums', $albums);
    }
}
