-- Add album "Fight On" by artist "Spirit of Troy"
SELECT * FROM albums
WHERE title LIKE '%fight%';

-- Look for artist "Spirit of Troy"
SELECT * FROM artists
WHERE name LIKE '%spirit%';

-- First add "Spirit of Troy" as new artist
INSERT INTO artists (name)
VALUES ('Spirit of Troy');

-- Double check Spirit of Troy was actually added
SELECT * FROM artists
ORDER by artist_id DESC;

-- Finally add the album 'Fight On'
INSERT INTO albums (title, artist_id)
VALUES('Fight On', 276);

SELECT * FROM albums
ORDER BY album_id DESC;

-- Update track 'All My Love' composed by E.Schrody and L. Dimant to be part of Fight On album
-- and compsoed by Tommy 
SELECT * FROM tracks;

UPDATE tracks
SET composer = 'Tommy Trojan', album_id = 348
-- WHERE name = 'All My Love';
WHERE track_id = 3316;

SELECT * FROM tracks
WHERE name LIKE 'All My Love';

-- Delete the album 'Fight On'
-- Can't delete album 'Fight On' because 'All My Love' is a track of 'Fight On'
-- Therefore either 1) delete the 'All My Love' track OR 2) Nullify the 'All My Love Track'
UPDATE tracks
SET album_id = null
WHERE track_id = 3316;
-- Could also do this
-- WHERE album_id = 348;

DELETE FROM albums
WHERE album_id = 348;

-- Double check that 'Fight On' was deleted
SELECT * FROM albums
ORDER BY album_id DESC;

-- Create a view that displays all albums and their artist names
-- only show album id, album title and artist name
CREATE OR REPLACE VIEW album_artists AS
SELECT album_id, title, name
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id;
    
-- Can "call" the view
SELECT * FROM album_artists;

-- Count all the tracks in the database
SELECT COUNT(*)
FROM tracks;

SELECT COUNT(*), COUNT(composer)
FROM tracks;

-- How long is an album?
SELECT SUM(milliseconds)
FROM tracks
WHERE album_id = 2;

-- In tracks table, what's the longest? average? song
SELECT MAX(milliseconds), MIN(milliseconds), AVG(milliseconds), SUM(milliseconds)
FROM tracks;

-- Shows the shortest track overall
SELECT album_id, name, MIN(milliseconds)
FROM tracks;

-- Find the shortest track for EACH album
SELECT album_id, MIN(milliseconds)
FROM tracks
GROUP BY album_id;

-- JOIN to see the actual names of albums (not just the priamry key)
SELECT tracks.album_id, albums.title, MIN(milliseconds)
FROM tracks
JOIN albums
	ON tracks.album_id = albums.album_id
GROUP BY albums.album_id;

-- For each artist, show artists and number of their albums
SELECT * FROM albums;
-- shows count of ALL the albums
SELECT album_id, artist_id, COUNT(*)
FROM albums;

-- shows count of albums PER ARTIST
SELECT album_id, artist_id, COUNT(*)
FROM albums
GROUP BY artist_id;

SELECT artists.name, artists.artist_id, COUNT(*)
FROM albums
JOIN artists
	ON artists.artist_id = albums.artist_id
GROUP BY artist_id;










