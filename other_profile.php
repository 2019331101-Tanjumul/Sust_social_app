<?php
error_reporting(0);

    session_start();
    require "config.php";
    require "local_time.php";

    $target = $_GET["target"];
    $sql = "SELECT * FROM users where reg=$target;";
    $q = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($q);
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
    <title><?php echo $r["name"]?></title>
</head>
<body>
    <?php
    if($_SESSION["reg"]==$target)
    {
        header("location:profile.php");
    }
    else{

    ?>
    <div>
        <a href="profile.php"><button class="btn btn-warning">My Profile</button></a>

        <a href="feed.php"><button class="btn btn-secondary">My Feeds</button></a>

        <a href="chat.php"><button class="btn btn-danger">My Chats</button></a>

    </div>
    <img src="<?php echo $r['image']?>"class="img rounded rounded-circle"style="width:50%;height:50%;">
    <br>
    <?php
    echo<<<_END
    <span class='display-2'>$r[name]</span>
    <br>
    <span class='text-muted'>Department of $r[dept]</span>
    <p class='text-dark'>$r[bio]</p>
    _END;
    $start_chat = "start_chat.php?target=".$target;
    $make_report = "report.php?target=".$target;
    
    ?>

    <div id="status">
        
    </div>
    <input type="text" id="to"value="<?php echo $target ?>"hidden>
    <?php
    }
    ?>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                    url:"status_check_for_message.php",
                    method:"POST",
                    data:{
                        to_id: $("#to").val(),
                    },
                    success:function(data){
                        $("#status").html(data);
                    }
                });

            },700);
        });
    </script>
</body>
</html>