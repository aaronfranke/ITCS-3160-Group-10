DELIMITER //

CREATE PROCEDURE Calculate_Restaurant(in id_of_restaurant int)
BEGIN
	SELECT
    restaurant_id, AVG(restaurant_rating)
FROM
    `order`,
    ratings
WHERE restaurant_id = id_of_restaurant;
SELECT
    restaurant_id, MIN(restaurant_rating)
FROM
    `order`,
    ratings
WHERE restaurant_id = id_of_restaurant;
SELECT
    restaurant_id, MAX(restaurant_rating)
FROM
    `order`,
    ratings
WHERE restaurant_id = id_of_restaurant;
END //

DELIMITER ;


