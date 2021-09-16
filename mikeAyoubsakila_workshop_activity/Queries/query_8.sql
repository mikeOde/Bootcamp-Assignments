/*Get the total and average values of rentals per month per year per store.*/
SELECT SUM(amount), SUM(amount)/12
FROM payment
WHERE rental_id != 0 
AND YEAR(payment_date) = 2005;