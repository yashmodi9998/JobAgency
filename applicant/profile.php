<?php 
define('PAGE_TITLE', 'Profile');
include('inc/nav.php');
include('../admin/inc/connect.php');
include('../admin/inc/functions.php');
include("../admin/inc/config.php");
secure(); 

    // Query to fetch details of the applicant
    $applicatiant_query = 'SELECT * 
                            FROM applicants 
                            WHERE applicant_id='.$_SESSION['id'];
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
                WHERE A.applicant_id = '.$_SESSION['id'];

        $applications = mysqli_query($con, $query);
        // To get applicant details
        $applicant_details = mysqli_fetch_assoc($applicatiant_result);
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
<?php include('../admin/inc/footer.php');
