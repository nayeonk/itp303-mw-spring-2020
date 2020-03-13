-- Comments like this
/*
	Multiline comment
*/

-- Select all columns from tracks table
SELECT * 
FROM tracks;
SELECT * 
FROM artists;

-- Display tracks that cost more than 0.99
-- Sort from shortest to longest (in length)
SELECT *
FROM tracks
WHERE unit_price > 0.99
ORDER BY milliseconds DESC;

-- Display tracks that cost more than 0.99
-- Sort from shortest to longest (in length)
-- Show only track_id, name, milliseconds and unit_price
SELECT track_id, name, milliseconds, unit_price
FROM tracks
WHERE unit_price > 0.99
ORDER BY milliseconds DESC;

-- Display tracks that have a composer
SELECT * FROM tracks
WHERE composer IS NOT NULL; 

-- Display tracks that have 'you' or 'day' in their titles
SELECT * 
FROM tracks
WHERE name LIKE '%you%' OR name LIKE '%day%';

-- Display tracks composed by U2 that have 'you' or 'day' in their titles
SELECT * 
FROM tracks
WHERE (name LIKE '%you%' OR name LIKE '%day%') AND composer LIKE '%u2%';

SELECT * FROM albums;
-- Display all albums and artists corresponding to each album
-- Only show album title and artist name
SELECT *
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id;
-- Only show album title and artist name
SELECT title AS album_title, name AS artist_name
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id;
    
    
-- Display all Jazz tracks   
SELECT * FROM tracks
WHERE genre_id = 2;

-- Display all Jazz tracks, track name, display genre name, album name and artist name
SELECT tracks.name AS track_name, genres.name AS genre_name, albums.title AS album_name, artists.name AS artist_name
FROM tracks
JOIN genres
	ON tracks.genre_id = genres.genre_id
JOIN albums
	ON tracks.album_id = albums.album_id
JOIN artists
	ON albums.artist_id = artists.artist_id
WHERE tracks.genre_id = 2;