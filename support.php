<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>

<?php

if (isset($_POST["openTicket"])) {
    $SName = $_POST['supportname'];
    $SPhone = $_POST['supportphone'];
    $SAdd = $_POST['supportaddress'];
    $SType = $_POST['supporttype'];
    $SInfo = $_POST['supportinfo'];
    $admin = "RoshanSutihar";
    $Clstatus = "OFF";
    $Sstatus = "Pending";

    date_default_timezone_set("Asia/Kathmandu");
    $CurrentTime= time();
    $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);


    if (empty($SName)||empty($SPhone)||empty($SType)) {
       $_SESSION["ErrorMessage"]= "All Fields Must Be Filled Out";
        Redirect_to("support.php");
    }elseif(strlen($SPhone)<10){
        $_SESSION["ErrorMessage"]= "Please enter a valid number";
        Redirect_to("support.php");
    }else{
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into support(sname, sphone, address, suptype, addinfo, sdatetime, clstatus, sstatus) values(?,?, ?, ?, ?, ?,?,?)");
            $stmt->bind_param("ssssssss", $SName, $SPhone, $SAdd, $SType, $SInfo, $DateTime,$Clstatus, $Sstatus);
            $Execute = $stmt->execute();
            if($Execute){
            $_SESSION["SuccessMessage"]= "Ticket Opened Succesfully with id: ".$conn->insert_id ;
            Redirect_to("support.php");
            $stmt->close();
		    $conn->close();
            }else{
            $_SESSION["ErrorMessage"]= "Data entry failed";
            Redirect_to("support.php");
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
    <link rel="stylesheet" href="css/support.css">
    <title>Support</title>
</head>
<body>
    
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


<!-- NAVIGATION ENDS -->

    <div class="container-fluid " style="margin-top: 40px; margin-bottom: 90px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6">
                <div class="card card-radius" >
                    <div class="class-header" style="text-align: center; margin-top: 30px;">
                        <i class="fas fa-ticket-alt text-success" style="font-size: 60px;"></i>
                        <div class="form-group" style="text-align: center;">
                            <h4>Support Ticket</h4>
                            <p>Field with * sign is mandetory!</p>
                            <p style="color: red;">Please note the <b> Ticket Id </b>for further inquiry!</p>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        echo ErrorMessage();
                        echo SuccessMessage();
                    ?>
                        <form class="form-container" action="support.php" method="post">
                            <div class="form-group">
                            <label for="name"><b>Name</b><sup class="text-danger h6">*</sup></label>
                            <input type="text" class="form-control" name="supportname" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                            <label for="phone"><b>Phone No.</b><sup class="text-danger h6">*</sup></label>
                            <input type="text" class="form-control" name="supportphone" maxlength="10" size="10"placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-group">
                            <label for="phone"><b>Address</b></label>
                            <input type="text" class="form-control" name="supportaddress" placeholder="Enter your address" required>
                            </div>
                            <div class="form-group">
                                <label for="sel1"><b>Support type</b> <sup class="text-danger h6">*</sup></label>
                                <select class="form-control" name="supporttype" required>
                                <option value="">-----Select Support Type-----</option>
                                <option value="01">read</option>
                                <option value="02">asjdh</option>
                                <option value="03">asdhghfgjsad</option>
                                <option value="04">asasdgsad</option>
                                <option value="05">asdhgsad</option>
                                <option value="06">asdbrhd</option>
                                <option value="07">asdhgfdfhsad</option>
                                <option value="08">asdhgmfgfsad</option>
                                <option value="09">asdhgmfgfsad</option>
                                <option value="10">asdhgmfgfsad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment"><b>Additional Information</b></label>
                                <textarea class="form-control" rows="5" id="comment" name="supportinfo"></textarea>
                            </div>
                            <div class=" form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                <label class="custom-control-label" for="customCheck1">I agree to <a href="#" style=""> Terms and Conditions</a></label>
                            </div>
                            <input type="submit" name="openTicket" class="btn btn-success w-100" value="Open Ticket">
                        </form>
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