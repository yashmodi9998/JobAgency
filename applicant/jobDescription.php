<?php
// Include database connection
define('PAGE_TITLE', 'Description');
include('inc/nav.php'); 
include('../admin/inc/connect.php');
include('../admin/inc/functions.php');
include("../admin/inc/config.php");
secure(); 
// Fetch job details from the database
$job_id = $_GET['job_id']; // Assuming you are passing the job ID through GET parameter
$query = "SELECT * FROM jobs WHERE job_id = $job_id";
$result = mysqli_query($con, $query);

// Check if job exists
if(mysqli_num_rows($result) > 0) {
    $job = mysqli_fetch_assoc($result);
?>
<div class="container mt-3">
    <div class="card mb-4 shadow">
        <div class="card-body">
            <h1 class="card-title"><?= $job['title']; ?></h1>
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
        </div>
    </div>
</div>


<?php
} else {
    echo "Job not found.";
}
?>
<?php include('../admin/inc/footer.php');