<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>

<?php

if (isset($_POST["contactsubmit"])) {
    $SName = $_POST['contname'];
    $SPhone = $_POST['contphone'];
    $SSub = $_POST['contsub'];
    $SMes = $_POST['contmessage'];
    $Clstatus = "OFF";

    date_default_timezone_set("Asia/Kathmandu");
    $CurrentTime= time();
    $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);


    if (empty($SName)||empty($SPhone)||empty($SSub)||empty($SMes)) {
       $_SESSION["ErrorMessage"]= "All Fields Must Be Filled Out";
        Redirect_to("contact.php");
    }elseif(strlen($SPhone)<10){
        $_SESSION["ErrorMessage"]= "Please enter a valid number";
        Redirect_to("contact.php");
    }else{
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into contactus(cname, cphone, csubject, cmessage, condate, clstatus) values(?,?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $SName, $SPhone, $SSub, $SMes, $DateTime,$Clstatus);
            $Execute = $stmt->execute();
            if($Execute){
            $_SESSION["SuccessMessage"]= "Thank You For Writing Us Our Team Will Contact You Soon";
            Redirect_to("contact.php");
            $stmt->close();
		    $conn->close();
            }else{
            $_SESSION["ErrorMessage"]= "Data entry failed";
            Redirect_to("contact.php");
            $stmt->close();
		    $conn->close();
            }
        }

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
    <link rel="stylesheet" href="css/contctus.css">
    <title>SF Contact</title>
</head>
<body>
    
<!-- NAVIGATION -->
<header>
<nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top"  >
  <div class="container">
    <a class="navbar-brand " href="index.html" style=" color:#05386b;"><h3> Saptakoshi Furniture</h3></a>
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
        <li><a href="login.php" class="btn btn-block" style="background-color:#05386b ; color:#edf5e1">LogIn</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
<!-- NAV ENDS -->


<section class="contact-page set-bg" data-setbg="">
    <div class="row">
      <div class="col-lg-4">
        <div class="contact-text text-white">
          <h2>Get in touch</h2>
          <p>Maecenas facilisis facilisis consequat. Curabitur fringilla pellen-tesque neque, imperdiet efficitur urna gravida vel. Cras augue diam, sollicitudin sit amet felis ut, eleifend faucibus dui. Proin euis-mod suscipit lacus, et scelerisque nisi aliquam a. Nunc feugiat mattis quam, ut luctus enim ultrices at.</p>
          <ul>
            <li><h6>Address:</h6>Basundhara, Kathmandu, Nepal</li>
            <li><h6>Phone:</h6>+977 9851044148</li>
            <li><h6>Mail:</h6>furnituresaptakoshi@gmail.com</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-7 offset-lg-1">
      <?php
        echo ErrorMessage();
        echo SuccessMessage();
      ?>
        <form class="contact-form" action="contact.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <input type="text" placeholder="Your Name" name="contname">
            </div>
            <div class="col-md-6">
              <input type="text" placeholder="Your Phone.no" name="contphone" maxlength="10" size="10">
            </div>
            <div class="col-md-12">
              <input type="text" placeholder="Subject" name="contsub">
              <textarea placeholder="Message" name="contmessage"></textarea>
              <button class="site-btn" name="contactsubmit"><span>Send</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>

</section>



<!-- FOOTER -->

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
                <li>furnituresaptokshi@gmail.com</li>
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>