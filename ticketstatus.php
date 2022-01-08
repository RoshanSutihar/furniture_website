<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/298dccb308.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/ticketstatus.css">
    <title>Ticket Status</title>
</head>
<body>
    
<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top"  >
  <div class="container">
    <a class="navbar-brand " href="index.html" style=" color:#05386b;"><h3> Company Name</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon " ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto pu-1" style="margin: auto; position:relative"  >
          <li class="nav-item" >
              <a href="index.html" class="nav-link active h5" style=" color:#05386b;">Home</a>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link h5" style=" color:#05386b;">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="support.php" class="nav-link h5" style=" color:#05386b;">Support</a>
          </li>
          <li class="nav-item">
              <a href="contact.php" class="nav-link h5" style=" color:#05386b;">Contact us</a>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php" class="btn btn-block" style="background-color:#05386b ; color:#edf5e1">LogIn</a></li>
      </ul>
    </div>
  </div>
</nav>




<div class="container-fluid" style="margin-top: 70px; margin-bottom: 90px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-6">
            <div class="card card-radius">
                <div class="card-header" style="padding-right:auto; padding-left:auto;">
                <form action="ticketstatus.php" method="post" name="searchticket" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="searchid" class="form-control" placeholder="Enter Ticket Id" required>
                    </div>
                    <button class="btn btn-primary ml-2" name="searchbutton"> Search</button>
                </form>
                </div>
                <div class="card-body">
                    <div class="card-tittle"> <h4 class="py-2" style="text-align:center; ">Ticket Has been Opened With Following Details</h4> </div>
                    <?php
                    if (isset($_POST['searchbutton'])) {
                        $id= $_POST['searchid'];
            
                        $query = "SELECT * FROM support WHERE supid='$id'";
                        $query_run = mysqli_query($conn, $query);
                      
                    ?>
                    <?php
                        echo ErrorMessage();
                        echo SuccessMessage();
                    ?>
                    <div class="table-responsive">
                    <table class="table table-dark table-bordered" style="border-radius:10px">
                    <?php if($row = mysqli_fetch_array($query_run)){ 
                    
                     ?>
                            <tr><td>Ticket Id</td>          <td><?php echo $row['supid']; ?></td></tr>
                            <tr><td>Name</td>               <td><?php echo $row['sname']; ?></td></tr>
                            <tr><td>Support Type</td>       <td><?php echo $row['suptype']; ?></td></tr>
                            <tr><td>Ticket Status</td>       <td><?php echo $row['sstatus']; ?></td></tr>
                            <tr><td>Opened On</td>          <td><?php echo $row['sdatetime']; ?></td></tr>
                            <tr><td>Closed By</td>          <td><?php echo $row['closedby']; ?></td></tr>
                            <tr><td>Closed On</td>          <td><?php echo $row['cldt']; ?></td></tr>
                        <?php } 
                    }
                      
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="contactuslast">
    <footer class="footer-section set-bg" data-setbg="./img/ws.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="footer-about">
              <img src="#" alt="">
              <p style="color: #fff;">Maecenas facilisis facilisis consequat. Curabitur fringilla pellen-tesque neque, imperdiet efficitur urna gravida vel. Cras augue diam, sollicitudin sit amet felis ut, eleifend faucibus dui. Proin euis-mod suscipit lacus, et scelerisque nisi aliquam a. Nunc feugiat mattis quam, ut luctus enim ultrices at.</p>
            </div>	
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h6>Talk to us </h6>
              <ul>
                <li>+34 5667 4332 244</li>
                <li>Contact@sportify25.com</li>
                <li>office@sportify25.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h6>Location</h6>
              <ul>
                <li>Basundhara, Kathmadu</li>
                <li>44600</li>
              </ul>
            </div>
          </div>
        </div>
    
         <p style="color: #fff;"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Saptakoshi Furniture || Created by <a href="#" target="_blank">Roshan Sutihar</a></p>
      </div>
    </footer>
    </div>


<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>