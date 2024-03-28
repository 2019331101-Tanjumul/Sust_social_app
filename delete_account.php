<?php
ob_start();
error_reporting(0);

require "config.php";
session_start();
$reg = $_SESSION["reg"];
$sql = "DELETE FROM users where reg = $reg;";
$query = mysqli_query($con,$sql);

unlink("user_image/".$reg.".png");

//status removal
$sql2 = "DELETE FROM status where reg = $reg;";
$query2 = mysqli_query($con,$sql2);

//post removal
$sql3 = "DELETE FROM posts where reg = $reg;";
$query3 = mysqli_query($con,$sql3);

//interaction removal
$sql4 = "DELETE FROM interaction where interacted_id = $reg;";
$query4 = mysqli_query($con,$sql4);

//chats removal
$sql5 = "DELETE FROM chats where from_id = '$reg' or to_id = '$reg';";
$query5 = mysqli_query($con,$sql5);

$sql6 = "DELETE FROM verification where reg = $reg";
$query6 = mysqli_query($con,$sql6);


/*
unlink("users/".$reg."/posts/myposts.txt");
unlink("users/".$reg."/info/myblocked.txt");
unlink("users/".$reg."/info/myfriends.txt");



rmdir("users/".$reg."/posts/saved_posts");

rmdir("users/".$reg."/posts");

rmdir("users/".$reg."/assets");

rmdir("users/".$reg."/chats");

rmdir("users/".$reg."/info");

rmdir("users/".$reg);

*/
session_unset();
session_destroy();

exit(header("location:sign_in.php"));
ob_end_flush();
?>