/*Return the first and last names of actors who played in a film involving a “Crocodile” and a “Shark”, along with
the release year of the movie, sorted by the actors’ last names.*/
SELECT first_name, last_name, release_year
FROM film F 
INNER JOIN film_actor fc USING (film_id)      /*selects records that have matching values in both tables*/
INNER JOIN actor a USING (actor_id)
WHERE description LIKE "%Crocodile%" AND description LIKE "%Shark%"
ORDER BY last_name;