<?php
error_reporting(0);

require("config.php");
$post_id = $_POST["target"];

$sql = "DELETE FROM posts where post_id='$post_id';";
$q = mysqli_query($con,$sql);


$sql2 = "DELETE FROM interaction where post_id='$post_id';";
$q2 = mysqli_query($con,$sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/dismiss.css">
    <script src="js/jquery.min.js"></script>

    <title>Deleted</title>
</head>
<body>
    <?php
echo "<div class='container'><p>Post <span class='delete'>Deleted</span></p> <button onclick='history.go(-1);' class='back-btn'>Go Back</button></div>";
?>
</body>
</html>