<?php
// Check existence of id parameter before processing further
//isset() - is used to determine whether a variable is set or not.
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "conn_db.php";

    // Prepare a select statement
    $sql = "SELECT * FROM report_information WHERE id = ?";

    //mysqli_prepare() function prepares an SQL statement for execution
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            //mysqli_stmt_get_result() function accepts a statement object as a parameter, 
            //retrieves the result set from the given statement (if there are any) and returns it. 
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                //MYSQLI_ASSOC constant - mysqli_fetch_array() function will fetch the next row of a result set as an associative array
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $age = $row["age"];
                $sickness = $row["sickness"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                //header("location: error.php");
                exit();
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($con);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    //header("location: error.php");
    //or display a message
    echo '<div class="alert alert-danger">Invalid request. Please <a href="main.php" class="alert-link">go back</a> and try again.</div>
</div>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Sickness</label>
                        <p><b><?php echo $row["sickness"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p><b><?php echo $row["age"]; ?></b></p>
                    </div>
                    <p><a href="main.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>