<?php
error_reporting(0);

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
    <title>All Chats</title>
</head>
<body>

<?php
session_start();
require "config.php";
$from = $_POST["from_id"];
$to = $_POST["to_id"];
$sql = "SELECT * FROM chats where from_id='$from' and to_id='$to' or from_id='$to' and to_id='$from';";
$q = mysqli_query($con, $sql);
/*
$r = mysqli_fetch_assoc($q);

echo "<pre>";
print_r($q);
echo "</pre>";
*/



while ($r = mysqli_fetch_assoc($q)) {
    if ($r["from_id"] == $_SESSION["reg"]) {
        echo <<<_END
        <div style='text-align:right;'title='$r[sent_time]'>
        <br>
        <p style='background-color:#d53369;max width:70%;display:inline-block;word-wrap:break-word;padding:5px 10px;border-radius:10px; color:white;'>
        $r[msg]
        </p>
        <br>
        </div>

        _END;

    } else {
        echo <<<_END
        <div style='text-align:left;'title='$r[sent_time]'>
        <br>
        <p style='background-color:lightblue;max width:70%;display:inline-block;word-wrap:break-word;padding:5px 10px;border-radius:10px'>
        $r[msg]
        </p>
        <br>
        </div>

        _END;

    }
}

?>    
</body>
</html>
