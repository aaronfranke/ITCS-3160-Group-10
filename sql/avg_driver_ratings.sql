/********************************************************
-- Second query: calculate average ratings for drivers
*********************************************************/

SELECT
    o.driver_id,
    p.person_name,
    AVG(r.driver_rating) AS AvgRating,
    MIN(r.driver_rating) AS MinRating,
    MAX(r.driver_rating) AS MaxRating
FROM
    ratings AS r
        LEFT JOIN
    `order` AS o ON r.order_id = o.order_id
        LEFT JOIN
    driver AS d ON o.driver_id = d.driver_id
        JOIN
    student AS s ON d.student_id = s.student_id
        JOIN
    person AS p ON p.person_id = s.person_id
GROUP BY o.driver_id , p.person_name
ORDER BY AvgRating DESC;
