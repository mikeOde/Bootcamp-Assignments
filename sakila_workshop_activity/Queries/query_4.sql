/*Find all the addresses where the second address is not empty (i.e., contains some text), and return these
second addresses sorted.*/
SELECT *
from address 
WHERE address2 is not NULL AND address2 <> ""
order by address2;