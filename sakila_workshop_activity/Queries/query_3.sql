/*What are the top 3 countries from which customers are originating?*/
SELECT CO.country
FROM country CO
INNER JOIN city CI USING(country_id)
INNER JOIN address AD USING(city_id)
INNER JOIN customer CU USING(address_id)
GROUP BY CO.country
ORDER BY COUNT(CU.customer_id) limit 3;