<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'publication_status', 'poster_link'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
}
