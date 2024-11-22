<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieGenreTable extends Migration
{
    public function up()
    {
        Schema::create('movie_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->onDelete('cascade'); // Внешний ключ на фильмы
            $table->foreignId('genre_id')->constrained()->onDelete('cascade'); // Внешний ключ на жанры
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movie_genre');
    }
}
