<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php



if (isset($_GET["closecontact"])) {
    $SearchQueryParameter = $_GET["closecontact"];
    global $conn;
    $sql = "DELETE FROM contactus WHERE cid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Contact Deleted Successfully";
        Redirect_to("contactadmin.php");
    }else{
        $_SESSION["ErrorMessage"]= "Contact Did Not Delete ";
        Redirect_to("contactadmin.php");
    }
}




?>