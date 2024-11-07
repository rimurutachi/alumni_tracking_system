<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
    $studentID = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM register_alumni2 WHERE studentID='$studentID' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: alumnilist.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: alumnilist.php");
        exit(0);
    }
}

?>