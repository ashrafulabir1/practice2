<?php 
include("connection.php");
?>
<?php 
session_unset();
session_destroy();
echo file_get_contents("C:/xampp/htdocs/practice3/index.html");
?>
