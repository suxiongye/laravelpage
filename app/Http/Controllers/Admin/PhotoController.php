<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PhotoController extends Controller
{
    //
    protected $fillable = ['name', 'album_id' , 'url'];

    public function index(){
        return view('admin/photo/index')->withPhotos(Photo::all());
    }

    public function create($id)
    {
        $album = Album::find($id);
        return view('admin/photo/create')->withAlbum($album);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:photos|max:255',
            'url'  => 'required',
            'album_id' => 'required',
        ]);
        $photo = new Photo();
        $photo->name = $request->get('name');
        $photo->url = $request->get('url');
        $photo->album_id = $request->get('album_id');

        if ($photo->save()) {
            return redirect('admin/album/'.$photo->album_id);
        } else {
            return redirect()->back()->withInput()->withErrors("save photo faild!");
        }
    }

    public function destroy($id)
    {
        Photo::find($id)->delete();
        return redirect()->back()->withInput()->withErrors("Delete success!");
    }

    public function edit($id)
    {
        $photo = Photo::where('id', $id)->first();
        return view('admin/photo/edit', ['photo' => $photo]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url'  => 'required',
            'album_id' => 'required',
        ]);
        $photo = Photo::find($id);

        if ($photo->update(['name' => $request->get('name'),
            'url' => $request->get('url'),
            'album_id'=>$request->get('album_id'),
        ])
        ) {
            return redirect('admin/album/'.$photo->album_id);
        } else {
            return redirect()->back()->withInput()->withErrors("update photo faild!");
        }
    }
}
