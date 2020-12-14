DELIMITER //

CREATE PROCEDURE Calculate_Driver(in id_of_driver int)
BEGIN
	SELECT
    driver_id, AVG(driver_rating)
FROM
    `order`,
    ratings
WHERE driver_id = id_of_driver;
SELECT
    driver_id, MAX(driver_rating)
FROM
    `order`,
    ratings
WHERE driver_id = id_of_driver;
SELECT
    driver_id, MIN(driver_rating)
FROM
    `order`,
    ratings
WHERE driver_id = id_of_driver;
END //

DELIMITER ;



