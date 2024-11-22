<?php
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

Route::apiResource('genres', GenreController::class);
Route::apiResource('movies', MovieController::class);
Route::get('genres/{id}/movies', [GenreController::class, 'movies']);

?>
