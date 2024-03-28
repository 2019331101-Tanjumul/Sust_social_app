
<?php
//echo "Hello";

ob_start();
error_reporting(0);
session_start();
require "config.php";
require "local_time.php";
echo "start";
$post_id = $_POST['post_id'];
$comment = $_POST['comment'];
echo $post_id." - ".$comment;
$sql1 = "SELECT * FROM posts WHERE post_id = $post_id;";
$q1 = mysqli_query($con,$sql1);
$r1 = mysqli_fetch_assoc($q1);

$poster = $r1["reg"];
$post_time = $r1["post_time"];
$post = $r1["post"];
$interacted_id = $_SESSION["reg"];

echo $sql1;

echo "<pre>";
print_r($r1);
echo "</pre>";

echo "Comment : $comment<br>";



$sql2 = "INSERT INTO interaction values($post_id,$poster,'$post','$post_time',$interacted_id,'$comment') ;";

echo "$sql2";

$r2 = mysqli_query($con,$sql2);
exit(header("location:feed.php"));
ob_end_flush();

?>