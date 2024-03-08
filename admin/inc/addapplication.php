<?php 
if (isset($_POST['addapplication'])) {
$job_id = $_POST['jobs'];
$applicant_id = $_POST['applicants'];
$status = $_POST['status'];
include('connect.php');

    $query = 'INSERT 
                INTO `applications` (`job_id`,`applicant_id`,`status`) 
                VALUES (
                    "' . mysqli_real_escape_string($con, $job_id) . '",
                    "' . mysqli_real_escape_string($con, $applicant_id) . '",
                    "' . mysqli_real_escape_string($con, $status) . '")';
    $applicantion = mysqli_query($con, $query);
    if ($applicantion) {
        header('Location:../applications.php?job_id='.$job_id);
    } else {
        echo mysqli_error($con);
    }
} else {
    echo "no data";
}
