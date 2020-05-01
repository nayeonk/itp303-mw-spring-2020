<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	// Set up this page to represent the "Genre" table in the database
	// kinda "linking" the table in the DB to this page
	protected $table = 'genres';
	protected $primaryKey = 'genre_id';
}

?>