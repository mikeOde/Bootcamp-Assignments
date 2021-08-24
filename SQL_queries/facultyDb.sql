SELECT name from degrees;

SELECT instructors.first_name
FROM instructors, degrees
WHERE degrees.name = "MS degree in Computer Science" AND degrees.instructor_id = instructors.id;

DELETE FROM instructors;

INSERT INTO instructors(first_name, last_name, email, date_of_employment) VALUES('Mike', 'Ayoub', 'mikeayoub@outlook.com', 2021);

