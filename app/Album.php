<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['name', 'describe'];

    public function hasManyPhotos(){
        return $this->hasMany('App\Photo', 'album_id', 'id');
    }
}
