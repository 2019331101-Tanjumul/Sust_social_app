<?php
error_reporting(0);

session_start();
require "config.php";
$from = $_POST["from"];
$to = $_POST["to"];

#receiver info
$sql1 = "SELECT * FROM users where reg = $to;";
$q1 = mysqli_query($con, $sql1);
$receiver = mysqli_fetch_assoc($q1);

#let from blocks to
$sql3 = "SELECT * FROM blocked where reg = $from and blocked_id = $to;";
$q3 = mysqli_query($con, $sql3);
$r3 = mysqli_num_rows($q3);

#let to blocks from
$sql4 = "SELECT * FROM blocked where reg = $to and blocked_id = $from;";
$q4 = mysqli_query($con, $sql4);
$r4 = mysqli_num_rows($q4);


$url = "other_profile.php?target=" . $to;

if ($r3 == 1 and $r4 == 0) {
    echo "You blocked ".$receiver["name"];
    $unblock_url = "unblock.php?target=" . $to;
    echo "<a href='$unblock_url'><button class='btn btn-warning'>Click to Unblock</button></a>";
} elseif ($r3 == 0 and $r4 == 1) {
    echo $receiver["name"]." blocked you";
} else {
    $output = "<a href='$url'><button>$receiver[name] just unblocks you</button></a>";
    echo $output;
}


?>