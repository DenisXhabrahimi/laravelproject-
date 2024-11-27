<?php

require_once "conn_db.php";
$username = $password = "";
$username_err = $password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = trim($_POST["username"]);
    if (empty($input_name)) {
        $input_username = "Please enter a username";
    } else if (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $username_err = "Please enter a valid username";
    } else {
        $username = $input_username;
    }

    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please enter your password";
    } else {
        $password = $input_password;
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT * FROM patients WHERE username = ? AND password = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = $password;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                while ($row = $result->fetch_assoc()) {
                    echo $row['username'] . "<br/>";
                }
                header("location: readadmin.php?id=1" . $id);
                exit();
            } else {
                echo "Something went wrong. Try again.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($con);
}
