<?php
ob_start();
error_reporting(0);

    require "config.php";
    require "local_time.php";
    session_start();
    $reg = $_SESSION["reg"];
    $post_id = mt_rand(1,10000);    
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
    <title>Create Post</title>
</head>
<body>
        <form action=""method="post">
        Post Details:<br>
        <textarea name="post"cols="100" rows="10"></textarea>

        <input type="submit"name="post_submit"value="POST">
    </form>
    <?php
        if(isset($_POST["post_submit"]))
        {
            $post_details = $_POST["post"];
            $post_time = $time;
            $post_content = $post_details;

            $post = "Posted at ".$post_time;
            $post.= "<br>$post_content<br><hr><br>";
   
            file_put_contents("users/".$reg."/posts/myposts.txt",$post,FILE_APPEND|LOCK_EX);
            
            $sql = "INSERT INTO posts values($post_id,$reg,'$post_details','$post_time');";
            $q = mysqli_query($con,$sql);

            exit(header("location:profile.php#resume"));
        }
    ob_end_flush();
    ?>
</body>
</html>