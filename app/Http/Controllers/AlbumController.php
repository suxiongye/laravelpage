<?php

namespace App\Http\Controllers;

use App\Album;
use DB;
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

    public function getPhotosByAlbum($id){
        $photos = DB::table('photos')->where('album_id', $id)->get();

        return $photos;
    }
}
