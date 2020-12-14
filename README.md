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

[Use Case Diagram](images/rating_system_use_case.png)

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

[EERD](images/EERD.png)

## Data Dictionary

[Data Dictionary](pdf/Group10_DataDictionary_deliverable2.pdf)

## MySQL Queries

[Use Case SQL Statements](sql/UseCaseSQL.sql)

## Stored Procedure

Database users who retrieve updated records daily or repeatedly throughout the week/month use stored procedures to simplify this task. Stored procedures are SQL code that is saved to a file and accessed via a call procedure. To execute the query, a user calls the procedure and specifies a parameter that the underlying SQL query then executes. Thereby, stored procedures allow users to save time and increase efficiency by eliminating the need to re-write SQL code.

Picture 1 below represents a stored procedure to calculate the average rating of an individual driver. Each stored procedure starts with the command ‘CREATE PROCEDURE’ followed by the name of the procedure and the parameter passed into the SQL query. Likewise, stored procedures end with the command “END.’ This stored procedure is saved to a file and is accessed via the ‘CALL’ procedure as shown in picture 2.

**Picture 1**: Stored procedure named ‘Calculate_Driver’ that takes an integer parameter (the number of the driver) and SQL code (in the body of the stored procedure) that calculates the ratings for the driver.

![Picture 1](https://raw.githubusercontent.com/aaronfranke/ITCS-3160-Group-10/master/screenshots/stored_procedure_pic_1.png)

**Picture 2**: Calling a stored procedure and passing the parameter ‘3’ to calculate the ratings for driver ID 3.

![Picture 2](https://raw.githubusercontent.com/aaronfranke/ITCS-3160-Group-10/master/screenshots/stored_procedure_pic_2.png)

#### Calculate Driver

[SQL Calculate Driver Stored Procedure](sql/calculate_driver_stored_procedure.sql) : [screenshot](screenshots/calculate_driver.png)

#### Calculate Restaurant

[SQL: Calculate Restaurant Stored Procedure](sql/calculate_restaurant_stored_procedure.sql) : [screenshot](screenshots/calculate_restaurant.png)

## Indexes and indexing: speed up search run time

SQL queries that look-up specific records, order by a field, or filter records meeting specific criteria (such as ‘where average > 3’), to name a few, perform a full scan of the table to find, order, or filter, etc. These operations are time expensive and increase query run time, especially when scanning tables with millions of rows. Luckily, run time could be decreased dramatically by indexing often-queried tables and columns.

Indexing is the process of mapping records in a table or column(s) to another table where the search engine finds records fast. By indexing each record, the index leads the SQL search engine exactly to the location where the record is found, thus bypass scanning the entire table and improving run time. Indexing could be performed during the initiation of a data table (such as indexing the primary and/or foreign keys) or after the fact via a SQL command (the latter is stored in a separate table accessible to any query).

The tables in our project contain indexes for the primary and foreign keys and we did not index additional fields/columns for any tables (because our database is small and indexing would not noticeably affect run time). However, we performed an experiment to validate the claims that indexing could speed up run time. [Exhibit A](screenshots/exhibit_a.png) shows a simple SQL query to retrieve the name of one person (from the ‘person’ table): query cost totaled 20.75 milliseconds. Then, we indexed the ‘person_name’ column of the ‘person’ table in [Exhibit B](screenshots/exhibit_b.png). Lastly, we ran the same query in Exhibit [Exhibit C](screenshots/exhibit_c.png) and compared the results: the total query cost after indexing decreased to 0.35 milliseconds, a decrease greater than 98% in search run time. The results validate the assertion that indexing increases efficiency and decreases run time. However, creating and using many indexes in complex queries of large data tables could yield higher run times; therefore, the use of indexes should be targeted and not overused.

**Exhibit A**: run time without indexing. MySQL’s Explain view shows that query run time totaled 20.75 milliseconds as the search engine performed a full table scan.

![Exhibit A](https://raw.githubusercontent.com/aaronfranke/ITCS-3160-Group-10/master/screenshots/exhibit_a.png)

**Exhibit B**: index of column ‘person_name” on table ‘person.’

![Exhibit B](https://raw.githubusercontent.com/aaronfranke/ITCS-3160-Group-10/master/screenshots/exhibit_b.png)

**Exhibit C**: run time with indexing enabled. MySQL’s Explain view shows that query run time totaled 0.35 milliseconds yielding an increase greater than 98% in search efficiency.

![Exhibit C](https://raw.githubusercontent.com/aaronfranke/ITCS-3160-Group-10/master/screenshots/exhibit_c.png)

## Web/App Implementation

The web application allows an administrative user to manage entries in the restaurant table of the database. User authentication is handled by the application; only authorized users can access the application's create-read-update-delete functionality.

An authenticated administrator has the ability to add new restaurants, view existing restaurant entries, update existing entries, and delete restaurant entries.

New users (who will have administrative privileges) can only be added by a previously authenticated user. A logged-in user has the ability to change their own password, access the restaurant administration functions, and add new administrative users.

The PHP htmlspecialchars() function is used on all form input to mitigate cross-site scripting attacks. In the future a [PHP Data Objects (PDO)](https://www.php.net/manual/en/book.pdo.php) function could be implemented to reduce the attack surface for SQL injection attacks.

The code used in this application can be found in this tutorial: [PHP MySQL CRUD Application](https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php) and is used for the purpose of demonstrating a CRUD interface for a database application.

[The working example CRUD interface can be found here](https://admin-eats.com).

#### Screenshots of the Administrative Interface (CRUD)

[Login Screen](screenshots/login.png) | [Table View](screenshots/table_view.png) | [Create Record](screenshots/create_record.png) | [Create Record Filled](screenshots/create_record_filled.png) | [Record Added](screenshots/record_added.png) | [View Record](screenshots/view_record.png) | [Update Record](screenshots/edit_record.png) | [Updated Record](screenshots/updated_record.png) | [Delete Record](screenshots/delete_record.png) | [Record Deleted](screenshots/record_deleted.png) | [Reset Password](screenshots/reset_password.png)

## Description of Future Work

What we plan to do next.

## MySQL Dump

[Complete Database Dump](sql/Group10_Database_Dump.sql)

#### Screenshots of Populated Database Tables:
[ratings table](screenshots/ratings.png) |
[order table](screenshots/order.png) |
[delivery table](screenshots/delivery.png) |
[driver table](screenshots/driver.png) |
[faculty table](screenshots/faculty.png) |
[location table](screenshots/location.png) |
[person table](screenshots/person.png) |
[restaurant table](screenshots/restaurant.png) |
[staff table](screenshots/staff.png) |
[student table](screenshots/student.png) |
[vehicle table](screenshots/vehicle.png) |
[users table for CRUD admin interface](screenshots/users.png)

## PPT Video

A link to the PPT Video can be found here:
[PowerPoint Video](https://youtube.com/)

## Credits

This project is based on work originally created by the "Mavericks" team: Dhananjay Arora, Akshay Babu, Sumit Kawale, and Prashant Madaan. Fall 2020.

#### This derivative work is based on a project on loan and used with permission from the Mavericks team.

## License

This database is only to be used for educational and class purposes and can not be replicated or used for commercial purposes or private interests without permission by the Mavericks team. This database can not be extended for use in a new venture or for actual commercial use in the future without express permission from the team.
