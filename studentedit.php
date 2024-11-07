<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
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
        <a href="#">Change Profile</a>
        <a href="php/logout.php"> <button class="btn"> Log Out </button> </a>
        <a href="studentinfo.php"> <button class="btn"> Go Back </button> </a>
    </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $middlename = $_POST['middlename'];
                $emailaddress = $_POST['emailaddress'];
                $birthday = $_POST['birthday'];
                $telephone = $_POST['telephone'];
                $address = $_POST['address'];
                $sex = $_POST['sex'];
                $civilstatus = $_POST['civilstatus'];
                $batch = $_POST['batch'];
                $course = $_POST['course'];
                $latin = $_POST['latin'];
                $employstatus= $_POST['employstatus'];

                $studentID = $_SESSION['studentID'];

                $edit_query = mysqli_query($con, "UPDATE register_alumni2 SET firstname='$firstname', lastname='$lastname', middlename='$middlename', emailaddress='$emailaddress', birthday='$birthday', telephone='$telephone', 
                address='$address', sex='$sex', civilstatus='$civilstatus', batch='$batch', course='$course', latin='$latin', employstatus='$employstatus' WHERE studentID=$studentID ") or die("error occurred");

                if ($edit_query) {
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
                    echo "<a href='studentinfo.php'><button class='btn'>Go Back</button>";

                }
            } else {

                $studentID = $_SESSION['studentID'];
                $query = mysqli_query($con, "SELECT*FROM register_alumni2 WHERE studentID=$studentID ");

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
                }

                ?>      

                <header>Change Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname" value="<?php echo $res_firstname; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" value="<?php echo $res_lastname; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="middlenaame">Middle Name:</label>
                        <input type="text" name="middlename" id="middlename" value="<?php echo $res_middlename; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="emailaddress">Email Address:</label>
                        <input type="text" name="emailaddress" id="emailaddress" value="<?php echo $res_email; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="birthday">birthday:</label>
                        <input type="date" name="birthday" id="birthday" value="<?php echo $res_birthday; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="telephone">Telephone Number:</label>
                        <input type="text" name="telephone" id="telephone" value="<?php echo $res_telephone; ?>"
                            autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="address">Full Address:</label>
                        <input type="text" name="address" id="address" value="<?php echo $res_address; ?>"
                            autocomplete="off" required>
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
                    <select class="form-select" aria-label="Default select example" name="civilstatus" id="civilstatus"
                        required>
                        <option selected>Civil Status:</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Single Parent">Single Parent</option>
                        <option value="Widow or Widower">Widow or Widower</option>
                    </select>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="employstatus" id="employstatus" required>
                        <option selected>Employment Status: </option>
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                    <br>
                    <br>
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
                        <option selected>Latin Honors</option>
                        <option value="Summa Cum Laude">Summa Cum Laude</option>
                        <option value="Magna Cum Laude">Magna Cum Laude</option>
                        <option value="Cum Laude">Cum Laude</option>
                        <option value="None of the above.">None of the above.</option>
                    </select>
                    <br>
                    <br>
                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Update" required>
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