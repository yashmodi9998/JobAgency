<?php
include("./admin/inc/connect.php");
include("./admin/inc/config.php");
include("./admin/inc/functions.php");
if($_POST){
$query = 'SELECT *
                FROM applicants
                WHERE email = "'.$_POST['email'].'"
                AND password = "'.md5( $_POST['password'] ).'"';
$result = mysqli_query( $con, $query );
if( mysqli_num_rows( $result ) )
{

$record = mysqli_fetch_assoc( $result );
$_SESSION['id'] = $record['applicant_id'];
$_SESSION['email'] = $record['email'];
header( 'Location: applicant/index.php' );
die();

}
elseif($_POST['email'] == "admin@gmail.com" && $_POST['password']=="password")
{
    $_SESSION['email'] = $_POST['email'];

header( 'Location: admin/index.php' );
die();

}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login/Signup Form with Tabs</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./admin/inc/styles.css">
   
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg " style="background-color:#093A3E;">
        <div class="container-fluid ">
            <a class="navbar-brand heading-text" href="index.php">YM AGENCY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
        </div>
    </nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
          
            <ul class="nav nav-tabs mb-3" id="authTabs">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup">Signup</a>
                </li>
            </ul>

          
            <div class="tab-content">
               
                <div class="tab-pane fade show active" id="login">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name = "email">
                               
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>

             
                <div class="tab-pane fade" id="signup">
                    <div class="card">
                        <div class="card-header">
                            Signup
                        </div>
                        <div class="card-body">
                        <form action="./admin/inc/addapplicant.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" required>
                            </div>   
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email"  class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Resume</label>
                                <input type="file" name="resume" accept=".pdf, .doc, .docx" class="form-control" id="resume" required>
                            </div>
                            <button type="submit" name="addApplicant" class="btn btn-outline-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
