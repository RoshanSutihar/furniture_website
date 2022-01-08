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
<body style="background-color:#f4fa9c;">
    
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
                <a href="#" class="btn btn-info btn-block">
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





<div class="container py-2" style="margin-top: 30px;">
    <div class="row">
        <div class="col-lg-12 " style="text-align:center; margin-top:30px;">
            <div class="card " >
                <div class="card-header" style="text-align: center; background-color:#086972; color:white;">
                 <i class="fas fa-headset" style="font-size: 60px;"></i>   
                <h3>Contact Requests</h3>
                </div>
                <div class="card-body" style="background-color:#17b978;">
                    <?php
                        $query = "SELECT * FROM contactus WHERE clstatus='OFF'";
                        $query_run = mysqli_query($conn, $query);
                    ?>
                    <?php
                        echo ErrorMessage();
                        echo SuccessMessage();
                    ?>
                    <div class="table-responsive">
                    
                        <table class="table table-bordered table-dark table-striped rounded">
                            <thead>
                                <tr>
                                    <th scope="col"> ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone N0.</th>
                                    <th scope="col">Subject </th>
                                    <th scope="col"> Message </th>
                                    <th scope="col"> Date</th>
                                    <th scope="col"> Close</th>
                                    <th scope="col"> Delete </th>
                                </tr>
                            </thead>
                            <?php
                                if($query_run){
                            foreach($query_run as $row)
                                    {
                                ?>
                            <tbody>
                                <tr>
                                    <td> <?php echo $row['cid']; ?> </td>                            
                                    <td> <?php echo $row['cname']; ?> </td>                            
                                    <td> <?php echo $row['cphone']; ?> </td>                            
                                    <td> <?php echo $row['csubject']; ?> </td>                            
                                    <td> <?php echo $row['cmessage']; ?> </td>
                                    <td> <?php echo $row['condate']; ?> </td>                       
                                    <td> 
                                       <a href="closecontact.php?closecontact=<?php echo $row['cid']; ?>" class="btn btn-success editbtn"> Close</a>
                                    </td> 
                                    <td>
                                        <a href="deletecontact.php?closecontact=<?php echo $row['cid']; ?>" class="btn btn-danger deletebtn"> Delete </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php           
                                    }
                                }
                                else 
                                {
                                    $_SESSION["ErrorMessage"]= "No Records Found!";
                                    Redirect_to("contactadmin.php");
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- CLOSED COMMENTS -->
<div class="container py-2" style="margin-top: 30px; ">
    <div class="row">
        <div class="col-lg-12 col-sm-12 " style="text-align:center; margin-top:30px;">
            <div class="card " >
                <div class="card-header" style="text-align: center; background-color:#086972; color:white;">
                    <h3>Contacted</h3>
                </div>
                <div class="card-body" style="background-color:#17b978;">
                    <?php
                        $query = "SELECT * FROM contactus WHERE clstatus='ON'";
                        $query_run = mysqli_query($conn, $query);
                    ?>
                    
                    <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                    ?>
                    <div class="table-responsive">
                    
                        <table class="table table-hover table-bordered table-dark table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col"> ID</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col"> Subject</th>
                                    <th scope="col"> Phone no.</th>
                                    <th scope="col"> Message </th>
                                    <th scope="col"> Closed By</th>
                                    <th scope="col"> Status</th>
                                </tr>
                            </thead>
                            <?php
                                if($query_run){
                            foreach($query_run as $row)
                                    {
                                ?>
                            <tbody>
                                <tr>
                                    <td> <?php echo $row['cid']; ?> </td>                            
                                    <td> <?php echo $row['cname']; ?> </td>                            
                                    <td> <?php echo $row['csubject']; ?> </td>                                                        
                                    <td> <?php echo $row['cphone']; ?> </td>
                                    <td> <?php echo $row['cmessage']; ?> </td>
                                    <td> <?php echo $row['clby']; ?> </td>
                                    <td> <button type="button" class="btn btn-primary deletebtn"> Contacted </button> </td>                             
                                </tr>
                            </tbody>
                            <?php           
                                    }
                                }
                                else 
                                {
                                    $_SESSION["ErrorMessage"]= "No Records Found!";
                                    Redirect_to("contactadmin.php");
                                }
                            ?>
                        </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>