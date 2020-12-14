## Campus Eats Rating System<br>ITCS 3160 Group 10

This project adds a rating system to the Campus Eats database. The rating system allows customers of Campus Eats to rate both drivers and restaurants.

## Introduction

With the threat of the Corona virus, food delivery services are more important than ever. Local restaurants are eager to find easy ways to have food delivered to customers without having to hire delivery employees. Even when things return to normal, many experts feel that food delivery will be something that we all will have become accustomed to as a part of our regular activities (even more than before). Students love food delivery services on campus. Campuses do not like the steady stream of visitors that may or may not have a formal connection with the university. Companies such as UberEats and GrubHub are happy to deliver on campus, but many schools are wondering if they should take control of the delivery and ensure that students and authorized university employees are the only ones delivering food on campus for safety and health reasons.

This project adds a rating system for the drivers and restaurants. The rating system will allow food delivery customers to rate both the restaurant and the food delivery person. Every time a customer places an order for delivery, they will have an opportunity to rate the restaurant and the driver for that order after the food has been delivered. New orders will provide the customer with new opportunities to place ratings. We will be using a 5 level rating system with a comment field for rating drivers and restaurants. We believe the simplicity of this rating system will encourage its use and will provide valuable feedback to all stakeholders: the restaurant owner, the delivery driver, and current and future restaurant customers.

## Team Members

Ryan Essenmacher

Aaron Franke

Scott Girard

Ross Landgraf

Jai Tabora

## Use Case for Rating System

1. Customers provide ratings after an order.
2. Customers may search for ratings on a particular restaurant.
3. Administrators of the system can view driver ratings and restaurant ratings.

[Use Case Diagram](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/images/rating_system_use_case.png)

## Business Rules

1. Only students may be drivers.
2. A customer must be a registered user.
3. A customer must place an order before rating a restaurant.
4. A delivery must be made before a customer can rate a driver.
5. A delivery must be made before a customer can rate a restaurant.
6. A customer can rate the delivery only one time per order.
7. A customer can rate the restaurant only one time per order.
8. Administrators can view driver ratings and restaurant ratings.
9. The ratings will be based on a 5 level rating system.

## EERD (full database)

The Enhanced Entity Relationship Diagram graphically represents the tables in the Campus Eats database and the relationships between entities. For this project we are concerned with adding a ratings system so that customers can rate both drivers and restaurants.

In the EERD we show our new ratings table on the lower left corner of the diagram. In our ratings table, we have rating_id as a primary key, and order_id is a foreign key referring to order_id in the orders table. We also show that the ratings table holds a driver rating, a restaurant rating, a driver comment, and a restaurant comment.

Note the cardinality shown in the diagram. The crows-foot notation shows that a rating belongs to one and only one order. On the other side of the relationship, we show that an order can have zero to many ratings.

[EERD](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/pdf/EERD_deliverable2_v2.pdf)

## Data Dictionary

[Data Dictionary](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/pdf/Group10_DataDictionary_deliverable2.pdf)

## MySQL Queries

[Use Case SQL Statements](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/sql/UseCaseSQL.sql)

## Stored Procedure

Stored procedures go here.

## Web/App Implementation

[An example CRUD interface]() can be found here.

## Description of Future Work

What we plan to do next.

## MySQL Dump

[Complete Database Dump](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/sql/Group10_Database_Dump.sql)

### Screenshots of populated database tables:
[ratings table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/ratings.png) |
[order table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/order.png) |
[delivery table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/delivery.png) |
[driver table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/driver.png) |
[faculty table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/faculty.png) |
[location table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/location.png) |
[person table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/person.png) |
[restaurant table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/restaurant.png) |
[staff table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/staff.png) |
[student table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/student.png) |
[vehicle table](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/vehicle.png) |
[users table needed for the CRUD admin interface](https://github.com/aaronfranke/ITCS-3160-Group-10/blob/master/screenshots/users.png)

## PPT Video

A link to the PPT Video can be found here:
[PowerPoint Video](https://youtube.com/)

## Credits

This project is based on work originally created by the "Mavericks" team: Dhananjay Arora, Akshay Babu, Sumit Kawale, and Prashant Madaan. Fall 2020.

#### This derivative work is based on a project on loan and used with permission from the Mavericks team.

## License

This database is only to be used for educational and class purposes and can not be replicated or used for commercial purposes or private interests without permission by the Mavericks team. This database can not be extended for use in a new venture or for actual commercial use in the future without express permission from the team.
