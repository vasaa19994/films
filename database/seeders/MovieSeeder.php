<?php
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run()
    {
        Movie::create([
            'title' => 'Inception',
            'publication_status' => 'draft',
            'poster_link' => 'default_poster.jpg', // Дефолтное изображение
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'publication_status' => 'draft',
            'poster_link' => 'default_poster.jpg',
        ]);
    }
}
