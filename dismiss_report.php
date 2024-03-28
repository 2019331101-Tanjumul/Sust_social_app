<?php
error_reporting(0);

require("config.php");
$report_id = $_POST["target"];
$sql2 = "SELECT * FROM reports where report_id='$report_id';";
$q2 = mysqli_query($con,$sql2);
$r = mysqli_fetch_assoc($q2);

unlink("$r[proof]");

$sql = "DELETE FROM reports where report_id='$report_id';";
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

    <title>Dismissed</title>
</head>
<body>
    <?php
echo "Report Dismissed. <button onclick='history.go(-1);'>Go Back</button>";
?>
</body>
</html>