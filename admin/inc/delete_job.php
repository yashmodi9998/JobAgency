<?php
include('connect.php');

if(isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];

    $query = "DELETE FROM jobs WHERE job_id = $job_id";
    $result = mysqli_query($con, $query);

    if($result) {
        header('Location:../index.php'); 
    } else {
        echo "Error deleting job.";
    }
} else {
    echo "Job ID not provided.";
}
?>
