<?php
// Include database connection
include('../../admin/inc/connect.php');

if(isset($_POST['updateProfile'])) {
    // Retrieve form data
    $applicant_id = $_POST['applicant_id']; // Assuming you store the applicant's ID in a session
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $resume_link = $_POST['current_resume_link']; // Retrieve the current resume link from the hidden field

    // If a new resume file is uploaded, update the resume link
    if(isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $resume_tmp_name = $_FILES['resume']['tmp_name'];
        $resume_name = $_FILES['resume']['name'];
        $upload_dir = '../../admin/inc/uploads/';
        $resume_link = $upload_dir . $resume_name;
        if(move_uploaded_file($resume_tmp_name, $resume_link)) {
            // Update the resume link in the database only if the file is successfully uploaded
            $resume_link = mysqli_real_escape_string($con, $resume_link);
        } else {
            // Handle file upload error
            echo "Error uploading resume file.";
            exit;
        }
    }

    // Update profile details in the database
    $query = "UPDATE applicants SET 
                full_name = '" . mysqli_real_escape_string($con, $full_name) . "', 
                email = '" . mysqli_real_escape_string($con, $email) . "',
                resume_link = '$resume_link' 
               
                WHERE applicant_id = $applicant_id";
              
    $result = mysqli_query($con, $query);

    if($result) {
        header('Location:../profile.php'); // Redirect to the profile page after updating
    } else {
        echo "Error updating profile details.";
    }
} else {
    echo "Form submission not detected.";
}
?>
