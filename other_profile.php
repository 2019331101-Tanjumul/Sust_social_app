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
    <link rel="stylesheet" href="ex_css/other_profile.css">
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
    <div class="nav">
    <div class="container btn-grp">
        <a href="profile.php"><button class="btn-1">My Profile</button></a>

        <a href="feed.php"><button class="btn-1">My Feeds</button></a>

        <a href="chat.php"><button class="btn-1">My Chats</button></a>

    </div>
    </div>
   
    <div class="container profile-container">
        <div class="img-container">
        <img src="<?php echo $r['image']?>">
        </div>
        <?php
         echo<<<_END
           <div class='profile-info'>

           <p class='profile-name'>$r[name]</p>
           
           <p class='dept-name'>Department of $r[dept]</p>
           <p class='bio-details'>$r[bio]</p>
           </div>
          
    _END;
    $start_chat = "start_chat.php?target=".$target;
    $make_report = "report.php?target=".$target;
    
    ?>
    <div id="status" class="btn-container">
        
     </div>
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