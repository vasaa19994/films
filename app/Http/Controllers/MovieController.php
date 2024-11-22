<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::with('genres')->paginate(10);
        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return response()->json($movie);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'image|nullable|max:2048', // Максимальный размер 2MB
        ]);

        $posterLink = 'default_poster.jpg'; // Дефолтное изображение

        if ($request->hasFile('poster')) {
            $posterLink = $request->file('poster')->store('posters');
        }

        $movie = Movie::create([
            'title' => $data['title'],
            'publication_status' => 'draft',
            'poster_link' => $posterLink,
        ]);

        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $data = $request->validate([
            'title' => 'string|max:255|nullable',
            'poster' => 'image|nullable|max:2048', // Максимальный размер 2MB
        ]);

        if ($request->hasFile('poster')) {
            $movie->poster_link = $request->file('poster')->store('posters');
        }

        $movie->update($data);
        return response()->json($movie);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json(null, 204);
    }

    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->publication_status = 'published';
        $movie->save();

        return response()->json($movie);
    }
}
