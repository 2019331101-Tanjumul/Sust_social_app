<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv = "refresh" content = "3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstarp.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title>Chats</title>
</head>
<body>
<div>
        <a href="profile.php"><button class="btn btn-warning">My Profile</button></a>

        <a href="feed.php"><button class="btn btn-secondary">My Feeds</button></a>

    </div>
<?php
require "config.php";
session_start();
$sender_reg = $_SESSION["reg"];

$sql = "SELECT DISTINCT to_id FROM chats WHERE from_id = '$sender_reg';";
$q = mysqli_query($con,$sql);
$total_chats = mysqli_num_rows($q);
echo "<div class='bg-primary display-2 text-white font-weight-bolder m-2'>All Chats</div><br><hr>";
if($total_chats==0)
{
    echo<<<_END
    You have no chats
    _END;
}
else
{
    while($r = mysqli_fetch_assoc($q))
    {
        $start_chat = "other_profile.php?target=".$r["to_id"];
        $sql2 = "SELECT name,dept,image from users where reg=$r[to_id];";
        $q2 = mysqli_query($con,$sql2);
        $r2 = mysqli_fetch_assoc($q2);
        echo<<<_END
        <a href='$start_chat' title='$r2[name] from $r2[dept]'>
        <img src='$r2[image]'class='img rounded rounded-circle'style='width:10%;height:10%;'></a>
        
        <a href='$start_chat' title='Department of $r2[dept]'><button>$r2[name] , $r2[dept]</button></a>
        
        <br>
        _END;
        
    }
}

?>
<?php
echo <<<_END
<div class='bg-success display-2 text-white font-weight-bolder m-2'>Chat Request</div><br><hr>
_END;

$chat_request_sql = "SELECT DISTINCT from_id from chats where to_id='$sender_reg' AND from_id NOT IN(SELECT DISTINCT to_id from chats where from_id='$sender_reg');";
$chat_request_query = mysqli_query($con,$chat_request_sql);
$total_request = mysqli_num_rows($chat_request_query);

if($total_request==0)
{
    echo<<<_END
    You have no chat requests
    _END;
}
else
{
    while($requests = mysqli_fetch_assoc($chat_request_query))
    {
        $start_chat = "other_profile.php?target=".$requests["from_id"];
        $sql3 = "SELECT name,dept,image from users where reg=$requests[from_id];";
        $q3 = mysqli_query($con,$sql3);
        $r3 = mysqli_fetch_assoc($q3);
        echo<<<_END
        
        <a href='$start_chat' title='$r3[name] from $r3[dept]'>
        <img src='$r3[image]'class='img rounded rounded-circle'style='width:10%;height:10%;'></a>
        
        <a href='$start_chat' title='Department of $r3[dept]'><button>$r3[name] , $r3[dept]</button></a>
        _END;
    }
}

?>

</body>
</html>