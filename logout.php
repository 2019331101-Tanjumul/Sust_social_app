<?php
error_reporting(0);

require "config.php";
session_start();

$activation_sql = "UPDATE status SET status = 'Inactive' WHERE reg = $_SESSION[reg];";
$activation_query = mysqli_query($con,$activation_sql);
                
session_unset();
session_destroy();
header("location:sign_in.php");
?>