<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php

$admin = $_SESSION['username'];



if (isset($_GET["closecontact"])) {
    $SearchQueryParameter = $_GET["closecontact"];
    global $conn;

    date_default_timezone_set("Asia/Kathmandu");
    $CurrentTime= time();
    $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);

    $sql = "UPDATE contactus SET clstatus='ON', clby='$admin' WHERE cid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Contact Closed Successfully";
        Redirect_to("contactadmin.php");
    }else{
        $_SESSION["ErrorMessage"]= "Contact Did Not Close ";
        Redirect_to("contactadmin.php");
    }
}

?>