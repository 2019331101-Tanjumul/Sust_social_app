<?php
ob_start();
error_reporting(0);

session_start();
require "config.php";
require "local_time.php";

$post_id = $_GET["post_id"];
$present_time = $time;

$delete_sql = "DELETE FROM posts where post_id = $post_id;";
$delete_query = mysqli_query($con, $delete_sql);

$interaction_clear_sql = "DELETE FROM interaction where post_id = $post_id;";

$interaction_clear_query = mysqli_query($con, $interaction_clear_sql);

exit(header("location:profile.php#resume"));

ob_end_flush();

?>