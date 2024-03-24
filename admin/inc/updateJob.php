<?php
include('connect.php');

if(isset($_POST['updateJob'])) {
    $job_id = $_POST['job_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $date = $_POST['posted_at'];
    
    $query = "UPDATE jobs SET 
            title = '" . mysqli_real_escape_string($con, $title) . "', 
            description = '" . mysqli_real_escape_string($con, $description) . "', 
            company = '" . mysqli_real_escape_string($con, $company) . "', 
            location = '" . mysqli_real_escape_string($con, $location) . "', 
            salary = '" . mysqli_real_escape_string($con, $salary) . "', 
            posted_at = '" . mysqli_real_escape_string($con, $date) . "' 
        WHERE job_id = $job_id";

    $result = mysqli_query($con, $query);

    if($result) {
        header('Location:../index.php'); 
    } else {
        echo mysqli_error($con);
    }
} else {
    echo "Form submission not detected.";
}
?>
