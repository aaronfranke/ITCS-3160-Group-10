<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$location = $restaurant_name = $schedule = $website = "";
$location_err = $restaurant_name_err = $schedule_err = $website_err = "";

// Processing form data when form is submitted
if(isset($_POST["restaurant_id"]) && !empty($_POST["restaurant_id"])){
    // Get hidden input value
    $restaurant_id = $_POST["restaurant_id"];

    // Validate location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a location.";
    /*} elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name."; */
    } else{
        $location = $input_location;
    }

    // Validate restaurant
    $input_restaurant_name = trim($_POST["restaurant_name"]);
    if(empty($input_restaurant_name)){
        $restaurant_name_err = "Please enter a restaurant name.";
    } else{
        $restaurant_name = $input_restaurant_name;
    }

    // Validate schedule
    $input_schedule = trim($_POST["schedule"]);
    if(empty($input_schedule)){
        $schedule_err = "Please enter a schedule.";
    } else{
        $schedule = $input_schedule;
    }

    // Validate website
    $input_website = trim($_POST["website"]);
    if(empty($input_website)){
        $website_err = "Please enter the website.";
    /*} elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value."; */
    } else{
        $website = $input_website;
    }

    // Check input errors before inserting in database
    if(empty($location_err) && empty($restaurant_name_err) && empty($schedule_err) && empty($website_err)){
        // Prepare an update statement
        $sql = "UPDATE restaurant SET location=?, restaurant_name=?, schedule=?, website=? WHERE restaurant_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_location, $param_restaurant_name, $param_schedule, $param_website, $param_restaurant_id);

            // Set parameters
            $param_location = $location;
            $param_restaurant_name = $restaurant_name;
            $param_schedule = $schedule;
            $param_website = $website;
            $param_restaurant_id = $restaurant_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["restaurant_id"]) && !empty(trim($_GET["restaurant_id"]))){
        // Get URL parameter
        $restaurant_id =  trim($_GET["restaurant_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM restaurant WHERE restaurant_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_restaurant_id);

            // Set parameters
            $param_restaurant_id = $restaurant_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $location = $row["location"];
                    $restaurant_name = $row["restaurant_name"];
                    $schedule = $row["schedule"];
                    $website = $row["website"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 1.5em sans-serif; }
        .wrapper{ width: 80%; padding: 3em; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
                            <span class="help-block"><?php echo $location_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($restaurant_name_err)) ? 'has-error' : ''; ?>">
                            <label>Restaurant Name</label>
                            <textarea name="restaurant_name" class="form-control"><?php echo $restaurant_name; ?></textarea>
                            <span class="help-block"><?php echo $restaurant_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($schedule_err)) ? 'has-error' : ''; ?>">
                            <label>Schedule</label>
                            <input type="text" name="schedule" class="form-control" value="<?php echo $schedule; ?>">
                            <span class="help-block"><?php echo $schedule_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($website_err)) ? 'has-error' : ''; ?>">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" value="<?php echo $website; ?>">
                            <span class="help-block"><?php echo $website_err;?></span>
                        </div>
                        <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
