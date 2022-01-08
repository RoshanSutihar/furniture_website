
<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>



<?php
if (isset($_POST['Login-submit'])) {
  $UserName = $_POST['lusername'];
  $PassWord = $_POST['lapassword'];

  $query = "SELECT * FROM admins WHERE username='$UserName' AND lpassword='$PassWord' ";
  $query_run = mysqli_query($conn, $query);
  if (mysqli_fetch_array($query_run)) {
    $_SESSION['username'] = $UserName;
    $_SESSION['lpassword'] = $PassWord;
    header('location:dashboard.php');
  }
    else{
      $_SESSION["ErrorMessage"]= "Please Enter Valid Username And Password!";
      Redirect_to("login.php");
    }
  }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/298dccb308.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Admin login</title>
    <style>
      
html{
    scroll-behavior: smooth;
}

.footer-section {
    padding: 116px 0 130px;
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('img/ws.jpg');
    margin-top:90px;
  }

.footer-about {
    max-width: 470px;
    color: #fff;
}

.footer-about img {
	margin-bottom: 35px;
}

.footer-about p {
	color: #fff;
}

/* ----------------
  7. Footer section
---------------------*/

.footer-info {
    padding-top: 27px;
    color: #fff;
}

.footer-info h6 {
	color: #fff;
	text-transform: uppercase;
	margin-bottom: 27px;
	font-weight: 500;
    letter-spacing: 3px;
    margin-left: 40px;
}

.footer-info ul {
	list-style: none;
}

.footer-info ul li {
	color: #fff;
	font-size: 14px;
	text-transform: uppercase;
	margin-bottom: 15px;
}
    </style>
</head>
<body style="background: #5cdb95;">
    
<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top"  >
  <div class="container">
    <a class="navbar-brand " href="index.html" style=" color:#05386b;"><h3>Saptakoshi Furniture</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon " ></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto pu-1" style="margin: auto; position:relative"  >
          <li class="nav-item" >
              <a href="index.html" class="nav-link active h5" style=" color:#05386b;">Home</a>
          </li>
          <li class="nav-item">
              <a href="gallery.html" class="nav-link h5" style=" color:#05386b;">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="support.php" class="nav-link h5" style=" color:#05386b;">Support</a>
          </li>
          <li class="nav-item">
              <a href="contact.php" class="nav-link h5" style=" color:#05386b;">Contact us</a>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html" class="btn btn-block" style="background-color:#05386b ; color:#edf5e1">Back To Home</a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- LOGIN FORM -->
<div class="container py-2" style="margin-top: 50px;">
  <div class="row">
    <div class="offset-sm-3 col-sm-6" style="min-height: 400px;">
      <div class="card" style="border-radius:30px;">
        <div class="class-header" style="text-align: center; margin-top: 30px;">
          <img src="img/download.png" style="height: 100px; width: 100px; margin-bottom: 20px;">
          <h4>LogIn Here!</h4>
          <p>Note: LogIn Available To The Admins Only</p>
        </div>
        <div class="card-body">
        <?php
              echo ErrorMessage();
              echo SuccessMessage();
        ?>
          <form action="login.php" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="lusername" id="username" placeholder="Enter Your Username">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="lapassword" id="password" placeholder="Enter Your Password">
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="Login-submit" value="Login">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LOGINFORM ENDS -->


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
                <li>+977 9851044148</li>
                <li>furnituresaptakoshi@gmail.com</li>
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
    
         <p style="color: #fff;"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Saptakoshi Furniture || Created by <a href="https://www.facebook.com/sutihar.roshan" target="_blank">Roshan Sutihar</a></p>
      </div>
    </footer>
    </div>

    <!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>