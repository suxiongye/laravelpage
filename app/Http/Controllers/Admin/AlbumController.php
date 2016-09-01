<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AlbumController extends Controller
{
    //
    protected $fillable = ['name', 'describe'];

    public function index()
    {
        return view('admin/album/index')->withAlbums(Album::all());
    }

    public function create()
    {

        return view('admin/album/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:albums|max:255',
        ]);
        $album = new Album();
        $album->name = $request->get('name');
        $album->describe = $request->get('describe');
        if ($album->save()) {
            return redirect('admin/album');
        } else {
            return redirect()->back()->withInput()->withErrors("save album faild!");
        }
    }

    public function destroy($id)
    {
        Album::find($id)->delete();
        return redirect()->back()->withInput()->withErrors("Delete success!");
    }

    public function edit($id)
    {
        $album = Album::where('id', $id)->first();
        return view('admin/album/edit', ['album' => $album]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $album = Album::find($id);

        if ($album->update(['name' => $request->get('name'),
            'describe' => $request->get('describe')])
        ) {
            return redirect('admin/album');
        } else {
            return redirect()->back()->withInput()->withErrors("update album faild!");
        }
    }

    public function show($id){
        return view('admin/album/show')->withAlbum(Album::with('hasManyPhotos')->find($id));
    }
}
