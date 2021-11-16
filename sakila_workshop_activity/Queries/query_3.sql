/*What are the top 3 countries from which customers are originating?*/
SELECT CO.country
FROM country CO
INNER JOIN city CI USING(country_id)
INNER JOIN address AD USING(city_id)
INNER JOIN customer CU USING(address_id)
GROUP BY CO.country
ORDER BY COUNT(CU.customer_id) limit 3;


/*another way that was shown in class
SELECT Co.country
FROM 'country' Co, 'customer' cu, 'address' a, 'city' c
GROUP BY Co.country_id
ORDER BY COUNT(cu.customer_id) DESC LIMIT 3; 