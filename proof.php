<?php
error_reporting(0);

$proof = $_GET["proof"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/proof1.css">
    <title>Proof</title>
</head>
<body>
    <div class="container">
    <div class="img-container">
    <img src=<?php echo $proof?>>
    </div>
    <div class="btn-container">
    <button onclick="history.go(-1);">Go Back</button>
    </div>
    </div>

    
</body>
</html>