<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Finder</title>
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

            include("php/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $lastname = mysqli_real_escape_string($con, $_POST['lastname']);

                $result = mysqli_query($con, "SELECT * FROM register_alumni2 WHERE emailaddress='$email' AND lastname='$lastname' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['emailaddress'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['middlename'] = $row['middlename'];
                    $_SESSION['birthday'] = $row['birthday'];
                    $_SESSION['telephone'] = $row['telephone'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['sex'] = $row['sex'];
                    $_SESSION['civilstatus'] = $row['civilstatus'];
                    $_SESSION['batch'] = $row['batch'];
                    $_SESSION['course'] = $row['course'];
                    $_SESSION['latin'] = $row['latin'];
                    $_SESSION['employstatus'] = $row['employstatus'];
                    $_SESSION['studentID'] = $row['studentID'];


                } else {
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";

                }
                if (isset($_SESSION['valid'])) {
                    header("Location: studentinfo.php");
                }
            } else {


                ?>
                <header>Alumni Finder</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email Address:</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Confirm" required>
                    </div>
                    <div class="links">
                        Not yet registered but you're an alumni? <br> <a href="index.php">Register your name now!</a>
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