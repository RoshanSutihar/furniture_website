
<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>


<!-- SESSION LOGIN REQURED -->
<?php
if (!$_SESSION['username']) {
    $_SESSION["ErrorMessage"]= "Login required";
      Redirect_to("login.php");
}

?>

<!-- SESSION LOGIN REQURED END -->


<?php 

$admin = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/298dccb308.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="#">
    <title>Admin Pannel</title>
</head>
<body style="background:#343a40;">
    
<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container">
    <a class="navbar-brand " href="index.html" style="text-align: center; margin:auto; position: relative;"><h2>Saptakoshi Furniture</h2></a>
  </div>
</nav>
<div style="height:20px; background:#27aae1;"></div>

<header class="bg-dark text-white py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> <i class="fa fa-blog" style="color:#27aae1;"></i> Admin Section Welcome: <?php echo $admin ?></h2>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="supadmin.php" class="btn btn-success btn-block">
                    <i class=" fas fa-ticket-alt"></i>
                    Tickets
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="contactadmin.php" class="btn btn-info btn-block">
                    <i class="fas fa-phone-square-alt"></i>
                    Contact Requests
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="#" class="btn btn-primary btn-block">
                    <i class=" fas fa-edit"></i>
                    Hire Requests
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="adminlist.php" class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus"></i>
                    Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="dashboard.php" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus"></i>
                    Dashboard
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="#" class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus"></i>
                    Not Fixed
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="#" class="btn btn-success btn-block">
                    <i class="fas fa-user-plus"></i>
                    Not Fixed
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="logout.php" class="btn btn-danger btn-block">
                <i class="fas fa-sign-out-alt"></i>
                    Log Out
                </a>
            </div>
        </div>
    </div>
</header>
<div style="height:20px; background:#27aae1;"></div>

<div class="container-fluid py-1 pb-5 bg-dark" style="background-size:cover" >
<h1 class="my-5" style="text-align:center; color:#ffff;"> Total Overview</h1>
    <div class="row pr-4 pl-4">
        <div class="col-md-3">
            <div class="card mt-2 bg-info" style="border-radius:30px">
                <div class="card-header">
                    <h3 style="text-align:center; color:#fff"> Ticket Status</h3>
                </div>
                <div class="card-body">
                   <h4 style="color:#fff; text-align:center;"> Total Pending Tickets </h4>
                   <h2 style="color:#fff; text-align:center;" > 
                   <?php 
                   $sql = "SELECT * FROM support WHERE clstatus='OFF'";
                   $query_run = mysqli_query($conn, $sql);
                   $total = mysqli_num_rows($query_run);
                   echo $total;
                   ?></h2>
                </div>
                <div class="card-body">
                    <h4 style="color:#fff; text-align:center;"> Total Solved Tickets </h4>
                   <h2 style="color:#fff; text-align:center"> 
                   <?php 
                   $sql = "SELECT * FROM support WHERE clstatus='ON'";
                   $query_run = mysqli_query($conn, $sql);
                   $total = mysqli_num_rows($query_run);
                   echo $total;
                   ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 bg-success" style="border-radius:30px">
                <div class="card-header">
                    <h3 style="text-align:center; color:#fff"> Total Tickes pending</h3>
                </div>
                <div class="card-body">
                   <h4 style="color:#fff; text-align:center;"> Total Pending Requests </h4>
                   <h2 style="color:#fff; text-align:center;" > 
                   <?php 
                   $sql = "SELECT * FROM contactus WHERE clstatus='OFF'";
                   $query_run = mysqli_query($conn, $sql);
                   $total = mysqli_num_rows($query_run);
                   echo $total;
                   ?></h2>
                </div>
                <div class="card-body">
                    <h4 style="color:#fff; text-align:center;"> Contacted </h4>
                   <h2 style="color:#fff; text-align:center"> 
                   <?php 
                   $sql = "SELECT * FROM contactus WHERE clstatus='ON'";
                   $query_run = mysqli_query($conn, $sql);
                   $total = mysqli_num_rows($query_run);
                   echo $total;
                   ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 bg-warning" style="border-radius:30px" >
                <div class="card-header">
                    <h3 style="text-align:center;"> Total Tickes pending</h3>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique provident repellat, aut atque molestiae aliquam possimus li
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 bg-primary" style="border-radius:30px" >
                <div class="card-header">
                    <h3 style="text-align:center; color:#fff"> Admins </h3>
                </div>
                <div class="card-body">
                <h4 style="color:#fff; text-align:center;"> Total No Of Admins </h4>
                   <h2 style="color:#fff; text-align:center"> 
                   <?php 
                   $sql = "SELECT * FROM admins";
                   $query_run = mysqli_query($conn, $sql);
                   $total = mysqli_num_rows($query_run);
                   echo $total;
                   ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>