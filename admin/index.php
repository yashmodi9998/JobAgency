<?php
define('PAGE_TITLE', 'Home');
include('inc/nav.php'); 
include('inc/connect.php');
include('inc/functions.php');

include('inc/config.php');
secure();

   // Query to fetch all jobs
   $query = 'SELECT * FROM `jobs`';
   $jobs = mysqli_query($con, $query);
?>
<div class="full-width-banner d-flex" style="background-image:url('inc/images/banner.jpg');background-size: cover; height:600px;">
   
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="display-5 mt-3 mb-5">
                Available Jobs
            </h1>
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
                        <td><a href="applications.php?job_id=<?= $job['job_id']; ?>"><?php echo $job['title']; ?></a></td>
                        <td><?php echo $job['description']; ?></td>
                        <td><?php echo $job['company']; ?></td>
                        <td><?php echo $job['location']; ?></td>
                        <td><?php echo $job['salary'].' CAD'; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($job['posted_at'])); ?></td>
                    </tr>
                    <?php
                    $counter++; 
                } ?>
            </tbody>
        </table>
    </div>
    <div class="mb-4">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Add New Job
      </button>
    </div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="Post" action="inc/addJobs.php">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Job</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>   
        <div class="mb-3">
          <label for="description" class="form-label">Job Description</label>
          <input type="text" name="description"  class="form-control" id="description" >
        </div>
        <div class="mb-3">
          <label for="company" class="form-label">Company</label>
          <input type="text" name="company"  class="form-control" id="company" >
        </div>
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" name="location"  class="form-control" id="location" >
        </div>

        <div class="mb-3">
          <label for="salary" class="form-label">Salary</label>
          <input type="number" name="salary"  class="form-control" id="salary" >
        </div>
        <div class="mb-3">
          <label for="posted_at" class="form-label">Date</label>
          <input type="date" name="posted_at"  class="form-control" id="posted_at" >
        </div>
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addJobs" class="btn btn-outline-primary">Submit</button>
    </div>
  </form>
    </div>
  </div>
</div>
</div>
<?php include('inc/footer.php');