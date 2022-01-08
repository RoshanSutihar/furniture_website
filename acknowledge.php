<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php

$admin = $_SESSION['username'];



if (isset($_GET["ack"])) {
    $SearchQueryParameter = $_GET["ack"];
    global $conn;

    $sql = "UPDATE support SET sstatus='Acknowledged' WHERE supid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Ticket Acknowledged Successfully";
        Redirect_to("supadmin.php");
    }else{
        $_SESSION["ErrorMessage"]= "Ticket Did Not Close ";
        Redirect_to("supadmin.php");
    }
}

?>