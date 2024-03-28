<?php 
error_reporting(0);

session_start();
require "config.php";
$reg = $_POST["target"];
$sql = "UPDATE verification set status = 'unverified' where reg = $reg";
$q = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstarp.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <title>Disabled</title>
</head>
<body>
    <?php
    echo "Disabling Done . <button onclick='history.go(-1);'>Go Back</button>";
    ?>
</body>
</html>