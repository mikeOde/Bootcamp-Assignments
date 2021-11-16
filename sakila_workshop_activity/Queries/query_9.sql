/*Get the top 3 customers who rented the highest number of movies within a given year.*/
SELECT CU.first_name, CU.last_name
FROM customer CU, rental RE
WHERE RE.customer_id = CU.customer_id
GROUP BY RE.customer_id
ORDER BY COUNT(RE.rental_id) DESC LIMIT 3;