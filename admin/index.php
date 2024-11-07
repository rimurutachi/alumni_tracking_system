<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="images/cvsulogo.png">
</head>

<body>
    <div class="top_banner">
        <div class="in_banner">
            <div class=" logo">
                <img alt="jee" src="images/cvsulogo.png">
            </div>
            <div class="banner_text">
                <h1>
                    Cavite State University - Bacoor City Campus
                </h1>
                <h2>
                    ONLINE ALUMNI TRACKING SYSTEM
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php

            include("dbcon.php");
            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM admin_alumni WHERE username='$username' AND password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['adminID'] = $row['adminID'];
                } else {
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";

                }
                if (isset($_SESSION['valid'])) {
                    header("Location: alumnilist.php");
                }
            } else {


                ?>
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Username:</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastname">Password:</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <footer>
        <div class="footer-wrapper">
            <p class="footer-txt">Copyright © 2024. ITEC50. By: <a href="https://www.facebook.com/jimmmmmaaaaarrrrr"
                    class="footer-sname" target="_blank">Jimmar D.Idioma</a> BSCS 2-3</p>
        </div>
    </footer>
</body>

</html>