<?php
error_reporting(0);

session_start();
require "config.php";
$reg = $_SESSION["reg"];
$blocked_id = $_GET["target"];

$sql = "INSERT INTO blocked VALUES($reg, $blocked_id);";
$q = mysqli_query($con,$sql);
$url = "other_profile.php?target=".$blocked_id;
header("location:$url");
?>