<?php
error_reporting(0);

$proof = $_GET["proof"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Proof</title>
</head>
<body>
    <div>
    <img src=<?php echo $proof?>>
    </div>
    <div>
    <button onclick="history.go(-1);">Go Back</button>
    </div>
    
</body>
</html>