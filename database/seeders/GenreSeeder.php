<?php
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Comedy']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Sci-Fi']);
    }
}
