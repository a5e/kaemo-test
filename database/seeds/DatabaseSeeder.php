<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->truncate();

        DB::table('videos')->insert([
            'title' => 'The wire',
            'date' => '2002-01-01 00:00:00',
            'realisator' => 'David Simon',
        ]);

        DB::table('videos')->insert([
            'title' => 'Generation Kill',
            'date' => '2008-01-01 00:00:00',
            'realisator' => 'David Simon',
        ]);

        DB::table('videos')->insert([
            'title' => 'Show me a Hero',
            'date' => '2015-01-01 00:00:00',
            'realisator' => 'David Simon',
        ]);

        DB::table('videos')->insert([
            'title' => 'The office',
            'date' => '2005-01-01 00:00:00',
            'realisator' => 'Ricky Gervais',
        ]);

        DB::table('videos')->insert([
            'title' => 'Breaking Bad',
            'date' => '2008-01-01 00:00:00',
            'realisator' => 'Vince Gilligan',
        ]);

        DB::table('videos')->insert([
            'title' => 'Dexter',
            'date' => '2006-01-01 00:00:00',
            'realisator' => 'James Manos Jr.',
        ]);

        DB::table('videos')->insert([
            'title' => 'Game of Thrones',
            'date' => '2011-01-01 00:00:00',
            'realisator' => 'George R. R. Martin',
        ]);

    }
}
