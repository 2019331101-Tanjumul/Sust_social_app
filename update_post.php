<?php
ob_start();
error_reporting(0);

session_start();
require "config.php";
require "local_time.php";

$post_id = $_GET["post_id"];
$present_time = $time;

$post_sql = "SELECT * FROM posts where post_id = $post_id;";
$post_query = mysqli_query($con,$post_sql);
$r = mysqli_fetch_assoc($post_query);

$sql = "UPDATE posts SET ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/update_post.css">
    <script src="js/jquery.min.js"></script>
    <title>Post Update</title>
</head>
<body>


    <div class="container">
    <form action=""method="post">
       <textarea name='new_post'><?php echo $r['post'] ?></textarea>

       <div class="btn-div">  <input type="submit" name="repost" value="Repost" class="post-btn"></div>
    </form>
    </div>


    <?php
    if (isset($_POST['repost'])) {
        $new_post = $_POST["new_post"];
        $sql .= "post ='$new_post',post_time='$present_time' WHERE post_id = $post_id ;";
        
        $final_query = mysqli_query($con,$sql);
        exit(header("location:profile.php#resume"));
    }
    ob_end_flush();
    ?>
</body>

</html>