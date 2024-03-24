<?php
define('PAGE_TITLE', 'Apply');
include('inc/nav.php'); 
include('../admin/inc/connect.php');
include('../admin/inc/functions.php');
include("../admin/inc/config.php");
secure(); 
?>

    <?php

$job_id = $_GET['job_id']; // Assuming you are passing the job ID through GET parameter
//$applicant = $_GET['applicant_id'];
$query = "SELECT * FROM jobs WHERE job_id = $job_id";
$result = mysqli_query($con, $query);

// Check if job exists
if(mysqli_num_rows($result) > 0) {
    $job = mysqli_fetch_assoc($result);
    ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col text-center">
            <h2 class="display-5 mt-3 mb-5">
                Apply For <?= $job['title']; ?>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow mb-5">
                <div class="card-body">
                    <p class="card-text lead"><strong>Description:</strong> <?= $job['description']; ?></p>
                    <p class="card-text"><strong>Company:</strong> <?= $job['company']; ?></p>
                    <p class="card-text"><strong>Location:</strong> <?= $job['location']; ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Salary:</strong> <?= $job['salary']; ?> CAD</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Date:</strong> <?= $job['posted_at']; ?></p>
                        </div>
                    </div>
                    <form method="POST" action="../admin/inc/addapplication.php?job_id=<?= $job_id; ?>&applicant_id=<?= $_SESSION['id']; ?>">
                        <div class="text-center mt-4">
                            <button type="submit" name="addapplication" class="btn btn-outline-primary btn-lg">Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
        } else {
        echo "Job not found.";
        }
        ?> 
    </div>
<?php include('../admin/inc/footer.php');