<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

Route::get('/search-manga', [MangaController::class, 'search']);
Route::get('/manga/popular', [MangaController::class, 'getPopularMangas']);
Route::get('/manga/top', [MangaController::class, 'getTopRatedMangas']);
Route::get('/manga/ongoing', [MangaController::class, 'getOngoingMangas']);
Route::get('/manga/new', [MangaController::class, 'getNewMangas']);
Route::get('/manga/upcoming', [MangaController::class, 'getUpcomingMangas']);
Route::get('/manga/completed', [MangaController::class, 'getCompletedMangas']);
Route::get('/manga/genres', [MangaController::class, 'getGenres']);
Route::get('/manga/az', [MangaController::class, 'getMangasByLetter']);
Route::get('/manga/genre/', [MangaController::class, 'getMangasByGenre']);

Route::get('/manga/{id}', [MangaController::class, 'getMangaDetails']);

