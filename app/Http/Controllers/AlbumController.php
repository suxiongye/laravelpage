<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;

class AlbumController extends Controller
{
    //
    public function index()
    {
        return view('home')->withAlbums(Album::all());
    }

    public function show($id)
    {
        return view('album/show')->withAlbum(Album::with('hasManyPhotos')->find($id));
    }
}
