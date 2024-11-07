<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: studentfinder.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Information</title>
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

    <div class="right-links">

        <?php

        $studentID = $_SESSION['studentID'];
        $query = mysqli_query($con, "SELECT*FROM register_alumni2 WHERE studentID=$studentID");

        while ($result = mysqli_fetch_assoc($query)) {
            $res_firstname = $result['firstname'];
            $res_lastname = $result['lastname'];
            $res_middlename = $result['middlename'];
            $res_email = $result['emailaddress'];
            $res_birthday = $result['birthday'];
            $res_telephone = $result['telephone'];
            $res_address = $result['address'];
            $res_sex = $result['sex'];
            $res_civilstatus = $result['civilstatus'];
            $res_batch = $result['batch'];
            $res_course = $result['course'];
            $res_latin = $result['latin'];
            $res_employstatus = $result['employstatus'];
            $res_studentID = $result['studentID'];
        }

        echo "<a href='studentedit.php?Id=$res_studentID'>Change Profile</a>";
        ?>

        <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b>
                            <?php echo $res_lastname ?>
                        </b>, Welcome!</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p><b>Student Information:</b></p>
                    <p>Full Name: <b>
                            <?php echo $res_firstname . " " . $res_middlename . " " . $res_lastname ?>
                        </b>.</p>
                    <p>Birthday: <b>
                            <?php echo $res_birthday ?>
                        </b>.</p>
                    <p>Telephone Number: <b>
                            <?php echo $res_telephone ?>
                        </b>.</p>
                    <p>Full Address: <b>
                            <?php echo $res_address ?>
                        </b>.</p>
                    <p>Sex: <b>
                            <?php echo $res_sex ?>
                        </b>.</p>
                    <p>Civil Status: <b>
                            <?php echo $res_civilstatus ?>
                        </b>.</p>
                    <p>Employment Status: <b>
                            <?php echo $res_civilstatus ?>
                        </b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p><b>Educational Information:</b></p>
                    <p>Batch Graduated: <b>
                            <?php echo $res_batch ?>
                        </b>.</p>
                    <p>Course / Program: <b>
                            <?php echo $res_course ?>
                        </b>.</p>
                    <p>Latin Honors: <b>
                            <?php echo $res_latin ?>
                        </b>.</p>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="footer-wrapper">
            <p class="footer-txt">Copyright © 2024. ITEC50. By: <a href="https://www.facebook.com/jimmmmmaaaaarrrrr"
                    class="footer-sname" target="_blank">Jimmar D.Idioma</a> BSCS 2-3</p>
        </div>
    </footer>
</body>

</html>