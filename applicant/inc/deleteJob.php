<?php
// Include database connection
include('../../admin/inc/connect.php');

if(isset($_POST['job_id'])) {
    // Retrieve job ID from the form submission
    $job_id = $_POST['job_id'];

    // Query to delete the job application based on the job ID
    $query = "DELETE FROM applications WHERE job_id = $job_id";

    // Execute the query
    $result = mysqli_query($con, $query);

    if($result) {
        // If the deletion is successful, redirect back to the profile page or any other appropriate page
        header('Location: ../profile.php');
    } else {
        // If there's an error, display an error message
        echo "Error deleting job application.";
    }
} else {
    // If the job ID is not received, display an error message
    echo "Job ID not provided.";
}
?>
