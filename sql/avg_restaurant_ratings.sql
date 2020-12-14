/********************************************************
-- First query: calculate average ratings for restaurants
*********************************************************/

SELECT
    o1.restaurant_id,
    r2.restaurant_name,
    AVG(r1.restaurant_rating) AS AvgRating,
    MIN(r1.restaurant_rating) AS MinRating,
    MAX(r1.restaurant_rating) AS MaxRating
FROM
    ratings AS r1
        LEFT JOIN
    `order` AS o1 ON r1.order_id = o1.order_id
        LEFT JOIN
    restaurant AS r2 ON o1.restaurant_id = r2.restaurant_id
GROUP BY o1.restaurant_id
ORDER BY AvgRating DESC;
