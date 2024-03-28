<?php
error_reporting(0);

require "config.php";
require "local_time.php";
$chat_id = mt_rand(1,10000);
$from = $_POST["from_id"];
$to = $_POST["to_id"];
$msg = $_POST["msg"];

$sql = "INSERT into chats values('$chat_id','$from','$to','$msg','$time');";
$q = mysqli_query($con,$sql);

?>