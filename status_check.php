<?php

error_reporting(0);
session_start();
require "config.php";

$to_id = $_POST["to_id"];

$sql1 = "SELECT * FROM users where reg = $to_id;";
$q1 = mysqli_query($con,$sql1);
$r1 = mysqli_fetch_assoc($q1);

$status_sql = "SELECT status FROM status where reg = $to_id;";
$status_query = mysqli_query($con,$status_sql);
$status_check = mysqli_fetch_assoc($status_query);
$status_info = $status_check["status"];

if($status_info=="Inactive")
{
    echo<<<_END
    <div class='chat-img-container'><img src='$r1[image]''class='chat-img'></div>
    <p class="h3 text-white status-text">$r1[name]<sup class='h6 text-white'>Offline</sup></p>
    _END;
}
if($status_info=="Active")
{
    echo<<<_END
    <div class='chat-img-container'><img src='$r1[image]''class='chat-img'></div>
    <p class="h3 text-white status-text">$r1[name]<sup class='h6 text-white'>Online</sup></p>
    _END;
}
?>