/*
SQL statements can match up to the three use case diagrams as follows:

1)  Show SQL that will insert a new rating

2)  Show SQL that when given a restuarant ID, will show the
average rating,
max and
min ratings.
This can be done by calling a stored procedure.

You can also show SQL that will list all restaurants with
average,
max and
min ratings.

3) Show SQL that when given a driver ID, will show the
average rating,
max and
min ratings.
This can be done by calling a stored procedure.

You can also show SQL that will list all drivers with
average,
max and
min ratings.
*/

-- insert a new rating
-- rating_id, order_id, driver_rating, restaurant_rating, driver_comment, restaurant_comment
INSERT INTO ratings
VALUES
(101,101,2,3,'Driver Comment', 'Restaurant Comment');



-- when given a restaurant ID, show the average rating
-- ie., what is the average rating for a restaurant whos id = 3 ?
SELECT
    AVG(restaurant_rating) AS 'Average Restaurant Rating'
FROM
    `order`,
    ratings
WHERE
	restaurant_rating = 3;



-- when given a restaurant ID, show the max rating
-- ie., what it the max rating for a restaurant whos id = 3 ?
SELECT
    MAX(restaurant_rating) AS 'Max Restaurant Rating'
FROM
    `order`,
    ratings
WHERE
	restaurant_id = 3;



-- when given a restaurant ID, show the min rating
-- ie., what is the min rating for a restaurant whos id = 3 ?
SELECT
    MIN(restaurant_rating) AS 'Min Restaurant Rating'
FROM
    `order`,
    ratings
WHERE
	restaurant_id = 3;



-- show the restaurant_id and average rating for all restaurants
SELECT
    restaurant_id, AVG(restaurant_rating)
FROM
    `order`,
    ratings
GROUP BY restaurant_id;



-- show the restaurant ID and max rating for all restaurants
SELECT
    restaurant_id, MAX(restaurant_rating) AS MaxRating
FROM
    `order`,
    ratings
GROUP BY restaurant_id;



-- show the restaurant_id and min rating for all restaurants
SELECT
    restaurant_id, MIN(restaurant_rating)
FROM
    `order`,
    ratings
GROUP BY restaurant_id;



-- when given a driver ID, show the average rating
-- ie., what is the average rating for a driver whos id = 3 ?
SELECT
    AVG(driver_rating) AS 'Average Driver Rating'
FROM
    `order`,
    ratings
WHERE
    driver_id = 3;



-- when given a driver ID, show max rating
-- ie., what is the max rating for a driver whos id = 3 ?
SELECT
    MAX(driver_rating) AS 'Max Driver Rating'
FROM
    `order`,
    ratings
WHERE
    driver_id = 3;



-- when given a driver ID, show the min rating
-- ie., what is the min rating for a driver whos id = 3 ?
SELECT
	MIN(driver_rating) AS 'Min Driver Rating'
FROM
    `order`,
    ratings
WHERE
    driver_id = 3;



-- show the driver id and average rating for all drivers
SELECT
    driver_id, AVG(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id;



-- show the driver_id and max rating for all drivers
SELECT
    driver_id, MAX(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id;



-- show the driver_id and min rating for all drivers
SELECT
    driver_id, MIN(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id;
