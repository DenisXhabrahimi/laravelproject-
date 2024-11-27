<?php   
    require "loginadmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="admin-container" id="adminContainer">
        <div class="form-container">
            <div class="user-image">
                <img src="images/username.png" alt="">
            </div>

            <div class="admin-form">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="adminname-form">
                        <label>Admin Name</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"></span>
                    </div>


                    <div class="admin-password">
                        <label>Admin Password</label>
                        <input type="text" name="password" class="form-control" value="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>


            </div>
        </div>
    </div>
</body>

</html>