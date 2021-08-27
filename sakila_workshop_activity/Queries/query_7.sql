/*Find the names (first and last) of all the actors and costumers whose first name is the same as the first name of
the actor with ID 8. Do not return the actor with ID 8 himself. Note that you cannot use the name of the actor
with ID 8 as a constant (only the ID). There is more than one way to solve this question, but you need to
provide only one solution.*/
SELECT C.first_name, C.last_name 
FROM customer C, actor A 
WHERE C.first_name = A.first_name AND A.actor_id = 8;

SELECT first_name, last_name 
FROM actor 
WHERE first_name = (SELECT first_name FROM actor WHERE actor_id=8) 
AND last_name != (SELECT last_name FROM actor WHERE actor_id=8);