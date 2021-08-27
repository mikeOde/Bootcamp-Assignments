/*Find all the film categories in which there are between 55 and 65 films. Return the names of these categories
and the number of films per category, sorted by the number of films. If there are no categories between 55 and
65, return the highest available counts.*/
SELECT CA.name, COUNT(FCA.film_id)
FROM category CA
INNER JOIN film_category FCA USING(category_id)
INNER JOIN film FI USING(film_id)
GROUP BY FCA.category_id
HAVING COUNT(FCA.film_id) BETWEEN 55 and 65;