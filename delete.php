<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php



if (isset($_GET["close"])) {
    $SearchQueryParameter = $_GET["close"];
    global $conn;
    $sql = "DELETE FROM support WHERE supid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Ticket Deleted Successfully";
        Redirect_to("supadmin.php");
    }else{
        $_SESSION["ErrorMessage"]= "Ticket Did Not Delete ";
        Redirect_to("supadmin.php");
    }
}




?>