<?php
define('PAGE_TITLE', 'Home');
include('inc/nav.php'); 
include('../admin/inc/connect.php');
include('../admin/inc/functions.php');
include("../admin/inc/config.php");
secure(); 
// Query to fetch all jobs
$query = 'SELECT * FROM `jobs`';
$jobs = mysqli_query($con, $query);

$query_user = 'SELECT * 
               FROM applicants 
               WHERE applicant_id='.$_SESSION['id'];
$user = mysqli_query($con, $query_user);
$row= mysqli_fetch_assoc($user);

?>
<div class="full-width-banner d-flex" style="background-image:url('../admin/inc/images/banner.jpg');background-size: cover; height:600px;">
   
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="display-5 mt-3 mb-5">
                Hello, <?=$row['full_name']; ?>
            </h2>
            <h3>Available jobs</h3>
        </div>
    </div>

    <div class="row">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Company</th>
                    <th scope="col">Location</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Date</th>
                    <th scope="col">Apply </th>
                </tr>
            </thead>
            <tbody>
                <?php

                $counter = 1; 
                 // Looping through each job and displaying its detail
                foreach ($jobs as $job) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $counter; ?></td>
                        <td><?php echo $job['title']; ?></td>
                        <td><?php echo $job['description']; ?></td>
                        <td><?php echo $job['company']; ?></td>
                        <td><?php echo $job['location']; ?></td>
                        <td><?php echo $job['salary'].' CAD'; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($job['posted_at'])); ?></td>
                        <td><a href="register.php?job_id=<?= $job['job_id']; ?>">APPLY NOW</a></td>
                    </tr>
                    <?php
                    $counter++; 
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('../admin/inc/footer.php');