<?php
// print_r($_POST);
if (isset($_POST['addJobs'])) {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $date = $_POST['posted_at'];
    $image_URL = 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/'.$randomNumber.'.jpg';

    include('connect.php');
    $query = 'INSERT 
                INTO `jobs` (`title`,`description`,`company`,`location`,`salary`,`posted_at`) 
                VALUES (
                    "' . mysqli_real_escape_string($con, $title) . '",
                    "' . mysqli_real_escape_string($con, $description) . '",
                    "' . mysqli_real_escape_string($con, $company) . '",
                    "' . mysqli_real_escape_string($con, $location) . '",
                    "' . mysqli_real_escape_string($con, $salary) . '",
                    "' . mysqli_real_escape_string($con, $date) . '"
                    )';
    $jobs = mysqli_query($con, $query);
    if ($jobs) {
        header('Location:../index.php');
    } else {
        echo mysqli_error($con);
    }
} else {
    echo "no data";
}
