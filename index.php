<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracking System</title>
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
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $middlename = $_POST['middlename'];
                $email = $_POST['email'];
                $birthday = $_POST['birthday'];
                $telephone = $_POST['telephone'];
                $address = $_POST['address'];
                $sex = $_POST['sex'];
                $civilstatus = $_POST['civilstatus'];
                $batch = $_POST['batch'];
                $course = $_POST['course'];
                $latin = $_POST['latin'];
                $employstatus = $_POST['employstatus'];

            
                $verify_query = mysqli_query($con, "SELECT emailaddress FROM register_alumni2 WHERE emailaddress='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {

                    mysqli_query($con, "INSERT INTO register_alumni2 (firstname,lastname,middlename,emailaddress,birthday,telephone,address,sex,civilstatus,batch,course,latin,employstatus) 
                    VALUES('$firstname','$lastname','$middlename','$email','$birthday','$telephone','$address','$sex','$civilstatus','$batch','$course','$latin', '$employstatus')") or die("Error Occured.");

                    echo "<div class='message'>
                      <p>Registered Successfully!</p>
                  </div> <br>";
                    echo "<a href='studentfinder.php'><button class='btn'>Login Now</button>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button>";


                }

            } else {

                ?>

                <header>Alumni Registration</header>
                <p style="font-size: 13px;"> Only Exclusive for CVSU - Bacoor City Campus Alumni Students<p>
                    <br>
                <form action="" method="post">
                    <div class="field input">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="middlename">Middle Name:</label>
                        <input type="text" name="middlename" id="middlename" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email Address:</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" id="birthday" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="telephone">Telephone Number:</label>
                        <input type="text" name="telephone" id="telephone" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="address">Full Address:</label>
                        <input type="text" name="address" id="address" autocomplete="off" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-group-label">
                            Sex:
                        </label>
                        <input class="form-group-input" type="radio" name="sex" id="sex" value="Male" required>
                        <label class="form-group-label">
                            Male
                        </label>
                        <input class="form-group-input" type="radio" name="sex" id="sex" value="Female" required>
                        <label class="form-group-label">
                            Female
                        </label>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="civilstatus" id="civilstatus" required>
                        <option selected>Civil Status:</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Single Parent">Single Parent</option>
                        <option value="Widow or Widower">Widow or Widower</option>
                    </select>
                    <br>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="employstatus" id="employstatus" required>
                        <option selected>Employment Status: </option>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                    <br>
                    <br>
                    <header>Alumni Education</header>
                    <div class="field input">
                        <label for="batch">Batch Graduated:</label>
                        <input type="number" name="batch" id="batch" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="course">Course:</label>
                        <input type="text" name="course" id="course" autocomplete="off" required>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="latin" id="latin" required>
                        <option selected>Latin Honors:</option>
                        <option value="Summa Cum Laude">Summa Cum Laude</option>
                        <option value="Magna Cum Laude">Magna Cum Laude</option>
                        <option value="Cum Laude">Cum Laude</option>
                        <option value="None of the above.">None of the above.</option>
                    </select>
                    <br>
                    <br>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already registered? <a href="studentfinder.php">Find your name here!</a>
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