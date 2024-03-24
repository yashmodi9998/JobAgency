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
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title"><?= $applicant_details['full_name']; ?></h5>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Update Profile
                    </button>
                </div>
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
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteJob<?= $application['job_id']; ?>">
                            Delete
                            </button>
                        <hr>
                    <?php }
                    ?>
                </div>
            </div>
            <?php }else{
                //if there is no application from the candidate
            ?><div class="alert alert-info mt-3" role="alert">
        Right now, You have not applied for any Jobs.
        </div>
        <?php
        }
        ?>
    </div>
</div>

<div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="inc/updateProfile.php">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProfileModalLabel">Edit Profile</h1>
                </div>
                <div class="modal-body">
                    <!-- Input fields for updating profile details -->
                    <div class="mb-3">
                        <label for="edit_full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="edit_full_name" value="<?= $applicant_details['full_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="edit_email" value="<?= $applicant_details['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Resume</label>
                        <?php if(isset($applicant_details['resume_link'])): ?>
                            <div>
                                Current Resume: <a href="<?= $applicant_details['resume_link']; ?>" target="_blank"><?= basename($applicant_details['resume_link']); ?></a>
                            </div>
                            <input type="hidden" name="current_resume_link" value="<?= $applicant_details['resume_link']; ?>">
                        <?php endif; ?>
                        <input type="file" name="resume" accept=".pdf, .doc, .docx" class="form-control" id="resume">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="applicant_id" value="<?= $applicant_details['applicant_id']; ?>">
                    <button type="submit" name="updateProfile" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    foreach ($applications as $application) {
?>

<div class="modal fade" id="confirmDeleteJob<?= $application['job_id']; ?>" tabindex="-1" aria-labelledby="confirmDeleteLabel<?= $application['job_id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel<?= $application['job_id']; ?>">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this job application?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="inc/deleteJob.php">
                    <input type="hidden" name="job_id" value="<?= $application['job_id']; ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
}
?>
<?php include('../admin/inc/footer.php');
