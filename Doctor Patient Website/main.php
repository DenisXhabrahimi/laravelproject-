<?php
require "login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor-Client Website</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/b0cb552013.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="first-container" id="firstContainer">
        <div class="form-container">
            <div class="user-image">
                <img src="images/username.png" alt="">
            </div>

            <div class="user-form">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="username-form">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="username-form">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>


                    <div class="username-password">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>

                    <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->

                    <?php
                    $id = $_GET['id'];


                    echo '<a href="read.php?id=' . $row['id'] . '" class="btn btn-warning">View</a>';
                    ?>
                    <button>Click Me!</button>
                    </a>
                </form>


            </div>
        </div>
    </div>


    <header>
        <img src="images/logo.png" alt="logo" style="width:50px">
        <nav>
            <ul class="nav-links">
                <li><a href="#" class="navbar-links">About Us</a></li>
                <li onclick="loginForm()"><a href="#" class="navbar-links">User Login</a></li>
                <li><a href="admin.php" class="navbar-links">Admin Login</a></li>
                <li><a href="" class="navbar-links">Pharmacist Login</a></li>
            </ul>
        </nav>
        <a class="cta" href="#"><button>Contact Us</button></a>
    </header>
    <div class="front-page">
        <div class="top-container">
            <i class="fa-regular fa-heart"></i>
            <h1 class="first-heading">Commited to You</h1>
            <span class="first-subtext">East Forge Medical is the region's most trusted provider of women's healthcare.
                We have a highly trained team of medical experts, advanced facilities, and unwavering commitment to the welfare of our patients.</span>

            <span class="learn-more" onclick="learnmore()">Learn More</span>
        </div>
    </div>

    <div class="middle-page">
        <div class="middle-container">
            <img class="image-container" src="images/doctor.png" alt="doctor">

            <div class="text-container">
                <span class="text-container-title">Making the World A Healthier, Happier Place</span>
                <span class="text">Write a paragraph that talks about your brand, product, or service here. Convince your prospective clients to choose you and your
                    offerings by highlighting the qualities that set you apart from the competition.Your audience is already on your website, so push a
                    little bit harder to seal the deal!</span>
            </div>
        </div>
    </div>




</body>

<script>
    function loginForm() {
        document.getElementById('firstContainer').style.display = "block";
    }

    function closeForm() {
        document.getElementById('firstContainer').style.display = "none";
    }
</script>

</html>