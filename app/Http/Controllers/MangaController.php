<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{

    public function search(Request $request) {
        try {
            $query = $request->input('q');

            if (!$query){
                return response()->json([
                    'error' => 'Query is required.'
                ], 400);
            }

            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'q' => $query,
                'limit' => 10
            ])->throw();

            return response()->json($response->json(), 200);

        } catch (RequestException $e) {
            $status = optional($e->response)->status() ?? 500;

            return response()->json([
                'error' => 'Failed fetching searched manga',
                'status' => $status
            ], $status);
        }
    }

    public function getPopularMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 20 : 18);

            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'page' => $page,
                'limit' => $limit,
                'order_by' => 'members',
                'sort' => 'desc',
            ]);

            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch popular mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getTopRatedMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 20 : 18);

            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'page' => $page,
                'limit' => $limit,
                'order_by' => 'score',
                'sort' => 'desc',
            ]);

            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch top rated mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getOngoingMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 20 : 18);

            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'page' => $page,
                'limit' => $limit,
                'status' => 'publishing',
                'sort' => 'desc',
            ]);

            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch top rated mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getCompletedMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 20 : 18);

            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'page' => $page,
                'limit' => $limit,
                'status' => 'complete',
                'sort' => 'desc',
            ]);

            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch completed mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getNewMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 10 : 18);

            $response = Http::get('https://api.jikan.moe/v4/manga',[
                'status' => 'publishing',
                'order_by' => 'start_date',
                'sort' => 'desc',
                'page' => $page,
                'limit' => $limit,
            ]);
            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed fetching new mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getMangaDetails($id) {
        try {
            $response = Http::get("https://api.jikan.moe/v4/manga/{$id}/full")->throw();
            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch manga details',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getGenres(){
        try {
            $response = Http::get('https://api.jikan.moe/v4/genres/manga')->throw();
            $newArray = [];
            foreach ($response->json()['data'] as $genre){
                $newArray[] = [
                    'mal_id' => $genre['mal_id'],
                    'name' => $genre['name']
                ];
            }
            return response()->json($newArray, 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch manga genres',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }

    }

    public function getUpcomingMangas(Request $request) {
        try {
            $page = $request->query('page', 1);

            $limit = $request->query('limit', $page == 1 && !$request->has('limit') ? 12 : 18);

            $response = Http::get('https://api.jikan.moe/v4/seasons/upcoming', [
                'page' => $page,
                'limit' => $limit,
                'sort' => 'desc',
            ])->throw();
            return response()->json($response->json(), 200);
        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch upcoming mangas',
                'status' => $e->response->status() ?? 500
            ], $e->response->status() ?? 500);
        }
    }

    public function getMangasByGenre(Request $request) {

        $genre_id = $request->query('genre');
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 14);

        try {
            $response = Http::get('https://api.jikan.moe/v4/manga', [
                'genres' => $genre_id,
                'order_by' => 'members',
                'sort' => 'desc',
                'page' => $page,
                'limit' => $limit
            ]);
            $data = $response->json();
            return response()->json($data, 200);

        } catch (RequestException $e) {
            return response()->json([
                'error' => 'Failed to fetch manga details',
                'status' => $e->getCode() ?: 500,
                'message' => $e->getMessage(),
                'data' => [],
                'pagination' => ['has_next_page' => false]
            ], $e->getCode() ?: 500);
    }
}





}
