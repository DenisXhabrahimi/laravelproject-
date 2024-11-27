<?php
// Check existence of id parameter before processing further
//isset() - is used to determine whether a variable is set or not.
global $id;
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "conn_db.php";

    // Prepare a select statement
    $sql = "SELECT * FROM report_information";

    //mysqli_prepare() function prepares an SQL statement for execution
    if ($result = mysqli_query($con, $sql)) {
        //mysqli_num_rows() function returns the number of rows in a result set.
        if (mysqli_num_rows($result) > 0) {
           /* <header>
                <img src="images/logo.png" alt="logo" style="width:50px">
                </header> 
            */
            echo '<header>';
                echo "<div style='display:flex; justify-content: space-between; background-color:#132540;'>";
                echo '<img src="images/logo.png" alt="logo" style="width:50px; padding:3px;"/>'; 
                echo '<p style="text-align:right; font-style: questrrial; font-size: 2em; color:white;">Records of the Patients</p>';
                echo "</div>";
            echo '</header>';
            echo '<table class="table table-bordered table-striped" style="margin:auto;">';
            echo "<thead>";
            echo "<tr>";
            echo "<th><span style='font-size: 1.5em; font-style: 'questrrial' text-align:center;'>ID</span></th>";
            echo "<th><span style='font-size: 1.5em; font-style: 'questrrial' text-align:center;'>Name</span></th>";
            echo "<th><span style='font-size: 1.5em; font-style: 'questrrial' text-align:center;'>Sickness</span></th>";
            echo "<th><span style='font-size: 1.5em; font-style: 'questrrial' text-align:center;'>Age</span></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            //mysql_fetch_array() function returns an array (associative or, numeric) which holds the current row of the result object. 
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><h2>" . $row['id'] . "</h2></td>";
                echo "<td><h3>" . $row['username'] . "</h3></td>";
                echo "<td><h3>" . $row['sickness'] . "</h3></td>";
                echo "<td><h3>" . $row['age'] . "</h3></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View All Records</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                    <p style="text-align:center;"><a href="main.php" class="btn btn-primary" style='margin-top: 50px;'>Go Back To the Main Page</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
