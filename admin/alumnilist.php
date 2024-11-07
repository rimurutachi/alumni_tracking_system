<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Tracking System - ADMIN</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Alumni Details:
                            <a href="logout.php" class="btn btn-danger float-end">LOG OUT</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Alumni ID:</th>
                                    <th>First Name:</th>
                                    <th>Last Name:</th>
                                    <th>Middle Name:</th>
                                    <th>Email Address:</th>
                                    <th>Birthday:</th>
                                    <th>Telephone Number:</th>
                                    <th>Full Address:</th>
                                    <th>Sex:</th>
                                    <th>Civil Status:</th>
                                    <th>Batch:</th>
                                    <th>Course:</th>
                                    <th>Latin Honors:</th>
                                    <th>Employment Status:</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM register_alumni2";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $studentID) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $studentID['studentID']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['firstname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['lastname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['middlename']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['emailaddress']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['birthday']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['telephone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['sex']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['civilstatus']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['batch']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['course']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['latin']; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentID['employstatus']; ?>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student"
                                                        value="<?= $studentID['studentID']; ?>"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
        <div class="footer-wrapper">
            <p class="footer-txt">Copyright © 2024. ITEC50. By: <a href="https://www.facebook.com/jimmmmmaaaaarrrrr"
                    class="footer-sname" target="_blank">Jimmar D.Idioma</a> BSCS 2-3</p>
        </div>
    </footer>
</body>

</html>