<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>
<?php



if (isset($_GET["close"])) {
    $SearchQueryParameter = $_GET["close"];
    global $conn;
    $sql = "DELETE FROM admins WHERE userid='$SearchQueryParameter'";
    $Execute = $conn->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"]= "Admin Deleted Successfully";
        Redirect_to("adminlist.php");
    }else{
        $_SESSION["ErrorMessage"]= "Something Went Wrong";
        Redirect_to("adminlist.php");
    }
}




?>