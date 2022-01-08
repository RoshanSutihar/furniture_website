<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php

$admin = $_SESSION['username'];



if (isset($_GET["close"])) {
    $SearchQueryParameter = $_GET["close"];
    global $conn;

    date_default_timezone_set("Asia/Kathmandu");
    $CurrentTime= time();
    $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);

    $sql = "UPDATE support SET clstatus='ON', closedby='$admin', sstatus='Closed', cldt='$DateTime' WHERE supid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Ticket Closed Successfully";
        Redirect_to("supadmin.php");
    }else{
        $_SESSION["ErrorMessage"]= "Ticket Did Not Close ";
        Redirect_to("supadmin.php");
    }
}

?>