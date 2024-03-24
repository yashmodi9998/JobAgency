<?php 
define('PAGE_TITLE', 'Profile');
include('inc/nav.php'); 
include('inc/connect.php');
include('inc/functions.php');
include('inc/config.php');
secure();
// Get the applicant_id from the URL parameter
    $app_id = $_GET['app_id'];
    // Query to fetch details of the applicant
    $applicatiant_query = 'SELECT * FROM applicants WHERE applicant_id='.$app_id;
    $applicatiant_result = mysqli_query($con, $applicatiant_query);
//check if there is an applicant
    if ($applicatiant_result) {
          // Query to get job application details for the specific applicant
        $query = 'SELECT 
                    A.applicant_id,
                    AP.application_id,
                    AP.application_date,
                    AP.status AS application_status,
                    J.job_id,
                    J.title AS job_title,
                    J.description AS job_description,
                    J.company AS job_company,
                    J.location AS job_location,
                    J.salary AS job_salary
                FROM `applicants` A
                JOIN `applications` AP ON A.applicant_id = AP.applicant_id
                JOIN `jobs` J ON AP.job_id = J.job_id
                WHERE A.applicant_id = '.$app_id;

        $applications = mysqli_query($con, $query);
        // To get applicant details
        $applicant_details = mysqli_fetch_assoc($applicatiant_result);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_status = $_POST['status'];

        $application_id = $_POST['application_id'];
        $update_query = "UPDATE applications SET status = '$new_status' WHERE application_id = $application_id";
        mysqli_query($con, $update_query);
        
        header("Location: {$_SERVER['PHP_SELF']}?app_id=$app_id");
        exit();
    }
?>

<div class="container mt-4">
    <div class="row">
     
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= $applicant_details['image_URL']; ?>" class="card-img-top" alt="Profile Picture">
                <div class="card-body">
                    <h5 class="card-title"><?= $applicant_details['full_name']; ?></h5>
                    <p class="card-text"><?= $applicant_details['email']; ?></p>
                    <p class="card-text">
                        <?php if($applicant_details['resume_link']){?>
                    <a href="<?= $applicant_details['resume_link']; ?>" target="_blank" download>
                        Download Resume
                  </a>
<?php }?>
                </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
        <?php
        //check if there is an application for a candidate 
        if(mysqli_num_rows($applications) > 0 ){ 
?>
            <div class="card">
                <div class="card-header">
                    Job Application Details
                </div>
                <div class="card-body">
                    <?php while ($application = mysqli_fetch_assoc($applications)) { ?>
                        <h5 class="card-title"><?= $application['job_title']; ?></h5>
                        <p class="card-text"><?= $application['job_description']; ?></p>
                        <p class="card-text">
                            Status:
                            <?php
                            $status = $application['application_status'];
                            $statusColorClass = '';

                            switch ($status) {
                                case 'applied':
                                    $statusColorClass = 'text-primary';
                                    break;
                                case 'in-review':
                                    $statusColorClass = 'text-warning';
                                    break;
                                case 'rejected':
                                    $statusColorClass = 'text-danger';
                                    break;
                                    case 'accepted':
                                        $statusColorClass = 'text-success';
                                        break;
                                default:
                                    break;
                            }
                        // Display the status of application with color
                            echo '<span class="' . $statusColorClass . '">' . $status . '</span>';
                            ?>
                            <form method="post">
                                <label for="status">Change Status:</label>
                                <select name="status" id="status">
                                    <?php
                                        // Define available status options
                                        $statusOptions = array('applied', 'in-review', 'rejected', 'accepted');
                                        
                                        // Iterate through status options
                                        foreach ($statusOptions as $statusOption) {
                                            // Check if the current status matches the option
                                            $selected = ($application['application_status'] == $statusOption) ? 'selected' : '';
                                            // Output the option with the selected attribute if matched
                                            echo "<option value='$statusOption' $selected>".ucfirst($statusOption)."</option>";
                                        }
                                    ?>
                                </select>
                                <!-- Hidden input to store the application ID -->
                                <input type="hidden" name="application_id" value="<?php echo $application['application_id']; ?>">
                                <input type="submit" value="Update Status">
                        </form>
                        </p>
                        
                        <hr>
                    <?php }
                    ?>
                </div>
            </div>
            <?php }else{
                //if there is no application from the candidate
            ?><div class="alert alert-info mt-3" role="alert">
        Right now, Candidate has not applied for any Jobs.
    </div><?php
        }?>
        </div>
        
    </div>
</div>
<?php include('inc/footer.php');
