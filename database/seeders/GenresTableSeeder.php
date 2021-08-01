<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();
        DB::table('genres')->insert([
            'name' => 'Komedie',
            'slug' => 'komedie'
        ]);
        DB::table('genres')->insert([
            'name' => 'Akční',
            'slug' => 'akcni'
        ]);
        DB::table('genres')->insert([
            'name' => 'Dokumentární',
            'slug' => 'dokumentarni'
        ]);
        DB::table('genres')->insert([
            'name' => 'Fantasy',
            'slug' => 'fantasy'
        ]);
        DB::table('genres')->insert([
            'name' => 'Drama',
            'slug' => 'drama'
        ]);
        DB::table('genres')->insert([
            'name' => 'Historický',
            'slug' => 'historicky'
        ]);
        DB::table('genres')->insert([
            'name' => 'Krimi',
            'slug' => 'krimi'
        ]);
        DB::table('genres')->insert([
            'name' => 'Cestopisný',
            'slug' => 'cestopisny'
        ]);
        DB::table('genres')->insert([
            'name' => 'Rodinný',
            'slug' => 'rodinny'
        ]);
        DB::table('genres')->insert([
            'name' => 'Romantický',
            'slug' => 'romanticky'
        ]);
        DB::table('genres')->insert([
            'name' => 'Sitcom',
            'slug' => 'sitcom'
        ]);
        DB::table('genres')->insert([
            'name' => 'Thriller',
            'slug' => 'thriller'
        ]);
        DB::table('genres')->insert([
            'name' => 'Western',
            'slug' => 'western'
        ]);
    }
}
