<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import the Genre
use App\Genre;
use App\Track;

class SongController extends Controller
{
	public function searchForm() {
		// Interact with the DB and then the DB will give us results

		// Create an instance of Genre
		// Instead of writing full SQL statements, can use Laravel's Eloquent or QueryBuilder to write SQL faster
		$genre = new Genre();
		//dd($genre->all());
		return view('search_form', [
			'genres'=> $genre->all(),
			'username' => 'ttrojan'
		]);
	}

	public function search() {

		// Get the user's input. Use laravel's helper fucntion request 
		$track_name = request('track_name');
		$genre = request('genre');

		$track = new Track();

		// Intead of writing SQL statment with SELECT and etc, use the Laravel Query Builder

		$results = $track->select('tracks.name AS track_name', 'composer', 'genres.name AS genre');

		// Check which inputs have been filled out. If filled out, add appropriate WHERE clause

		if( isset($track_name) && !empty($track_name) ) {
			$results = $results->where('tracks.name', 'LIKE' , '%' . $track_name .'%');
		}

		if( isset($genre) && !empty($genre) ) {
			$results = $results->where('tracks.genre_id', '=' , $genre);
		}

		// LEFT JOIN to show the name of genres in my results
		$results = $results->leftJoin('genres', 'tracks.genre_id', '=', 'genres.genre_id');

		// Pass the results to search_results view
		return view('search_results', [
			'tracks' => $results->get()
		]);

	}
}

?>