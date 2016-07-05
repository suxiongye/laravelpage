<?php

use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('albums')->delete();

        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2016'
        ]);
        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2015 I'
        ]);
        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2015 II'
        ]);
        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2014'
        ]);
        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2013'
        ]);
        \App\Album::create([
            'name' => 'PHOTOGRAPHY 2012'
        ]);
    }
}
