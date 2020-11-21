SELECT
    driver_id, AVG(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id

SELECT
    driver_id, MIN(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id

SELECT
    driver_id, MAX(driver_rating)
FROM
    `order`,
    ratings
GROUP BY driver_id

SELECT
    restaurant_id, AVG(restaurant_rating)
FROM
    `order`,
    ratings
GROUP BY restaurant_id

SELECT
    restaurant_id, MIN(restaurant_rating)
FROM
    `order`,
    ratings
GROUP BY restaurant_id

SELECT
    restaurant_id, MAX(restaurant_rating) AS MaxRating
FROM
    `order`,
    ratings
GROUP BY restaurant_id
