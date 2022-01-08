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

<?php

if (isset($_POST["Reg-submit"])) {
    $firstname = $_POST['adfname'];
    $lastname = $_POST['adlname'];
    $username = $_POST['adusername'];
    $number = $_POST['adphonenumber'];
    $LogpassWord = $_POST['adpassword'];
    $confirmadnpassword = $_POST['confirmadpassword'];

    date_default_timezone_set("Asia/Kathmandu");
    $CurrentTime= time();
    $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);


    if (empty($firstname)||empty($lastname)||empty($username)||empty($number)||empty($LogpassWord)||empty($confirmadnpassword)) {
       $_SESSION["ErrorMessage"]= "All Fields Must Be Filled Out";
        Redirect_to("adminlist.php");
    }elseif(strlen($LogpassWord)<6){
        $_SESSION["ErrorMessage"]= "Password To Short";
        Redirect_to("adminlist.php");
    }elseif($LogpassWord !== $confirmadnpassword){
        $_SESSION["ErrorMessage"]= "Password Donot Match";
        Redirect_to("adminlist.php");
    }else{
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into admins(fname, lname, username, phone, lpassword, datetime, addedby) values(?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("sssisss", $firstname, $lastname, $username, $number, $LogpassWord, $DateTime, $admin);
            $Execute = $stmt->execute();
            if($Execute){
            $_SESSION["SuccessMessage"]= "New Admin Added Successfully";
            Redirect_to("adminlist.php");
            $stmt->close();
		    $conn->close();
            }else{
            $_SESSION["ErrorMessage"]= "Something Went Worng";
            Redirect_to("adminlist.php");
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
    <link rel="stylesheet" href="#">
    <title>Admin List</title>
</head>
<body style="background-color:#a7ff83;">
    
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
                <h2> <i class="fa fa-blog" style="color:#27aae1;"></i> Admin Section Welcome: <?php echo $admin;?> <?php ?></h2>
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

<div class="container py-2" style="margin-top: 30px;">
    <div class="row">

        <!-- LISTS OF ADMINS -->

        <div class="col-sm-6 col-md-9 " style="min-height: 400px;">
            <div class="card" style="margin-top:30px;">
               <div class="card-header" style="text-align: center; background-color: #f85959;">
                   <h4>Lists of Admins</h4>
               </div> 
               <div class="card-body" style="background-color:#ffb174;">
                    <?php
                    $query = "SELECT * FROM admins";
                    $query_run = mysqli_query($conn, $query);
                    ?>
                    <?php
                        echo ErrorMessage();
                        echo SuccessMessage();
                    ?>
                    <div class ="table-responsive">

                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col"> Username </th>
                                <th scope="col"> Phone </th>
                                <th scope="col"> Datetime </th>
                                <th scope="col"> Added By </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>
                        <?php
                            if($query_run){
                        foreach($query_run as $row)
                                  {
                            ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['userid']; ?> </td>                            
                                <td> <?php echo $row['fname']; ?> </td>                            
                                <td> <?php echo $row['lname']; ?> </td>                            
                                <td> <?php echo $row['username']; ?> </td>                            
                                <td> <?php echo $row['phone']; ?> </td>
                                <td> <?php echo $row['datetime']; ?> </td>
                                <td> <?php echo $row['addedby']; ?> </td>                            
                                <td>
                                    <a href="deleteadmin.php?close=<?php echo $row['userid']; ?>" class="btn btn-danger deletebtn"> DELETE </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                                }
                            }
                            else 
                            {
                                echo "No Record Found";
                            }
                        ?>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <!-- END OF LISTS -->
      <div class="col-sm-6 col-md-3 " style="min-height: 400px;">
        <div class="card" style="background-color:#fef4a9; margin-top:30px;">
          <div class="clard-header" style="text-align: center; margin-top: 20px;">
            <img src="img/download.png" style="height: 80px; width: 80px; margin-bottom: 20px;">
            <h4>SignUp Here!</h4>
          </div>
          <div class="card-body">

            <!-- ERROR OUTPUT -->
              <?php
              echo ErrorMessage();
              echo SuccessMessage();
              ?>
            <!-- ERROR OUTPUT ENDS -->

            <form action="" class="adminlist.php" method="post">
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adfname" id="fname" placeholder="Enter Your Firstname">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adlname" id="alname" placeholder="Enter Your Lastname">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adusername" id="username" placeholder="Enter a Username">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="adphonenumber" maxlength="10" size="10" id="phone_number" placeholder="Enter Your Phonenumber">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="adpassword" id="password" placeholder="Enter Your Password">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="confirmadpassword" id="password" placeholder="Repeat The Password">
                </div>
              </div>
              <input type="submit" class="btn btn-primary btn-block" name="Reg-submit" value="Add New Admin">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




</body>
</html>