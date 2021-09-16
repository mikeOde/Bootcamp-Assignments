To start, this collection holds data about the instructors in a single faculty. So our main concern is the Instructors. After reviewing the table I found the following errors:
-	The table title: Faculty is wrong
-	The first two rows of the table are so terrible that they gave the faculty a first and last name.
-	The degree field in this design accepts comma separated data which is unacceptable. 

Queries:
1-
SELECT name from degrees;

2-
SELECT instructors.first_name
FROM instructors, degrees
WHERE degrees.name = "MS degree in Computer Science" AND degrees.instructor_id = instructors.id;

3-
DELETE FROM instructors;

4-
INSERT INTO instructors(first_name, last_name, email, date_of_employment) VALUES('Mike', 'Ayoub', 'mikeayoub@outlook.com', 2021);
