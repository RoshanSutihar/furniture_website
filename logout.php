<?php  require_once('includes/db.php');  ?>
<?php  require_once('includes/functions.php');  ?>
<?php  require_once('includes/session.php');  ?>


<?php 
$_SESSION['username'] = null;
$_SESSION['lpassword'] = null;
session_destroy();
Redirect_to("login.php")
?>


