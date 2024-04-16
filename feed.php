<?php
ob_start();
error_reporting(0);
session_start();
require "config.php";
require "local_time.php";

$reg = $_SESSION["reg"];

$sql1 = "SELECT * FROM posts where reg<>$reg;";
$q1 = mysqli_query($con, $sql1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/feed2.css">
    <script src="js/jquery.min.js"></script>

    <title>Feed</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="sticky-sidebar">
                <div class="nav-container">
                    <a href="profile.php" class="nav-link">My Profile</a>
                    <a href="profile.php#resume" class="nav-link">My Posts</a>
                    <a href="create_post.php" class="nav-link">Create Post</a>
                    <a href="chat.php" class="nav-link">My Chats</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
            </div>
            <div class="main-section" id="main">

                <div class="search_area">
    
                    <div class="form-opt">
                        <form method="post">
                            <input type="text" name="department" placeholder="Search by department" class="int-field">
                            <input type="submit" name="search_dept" value="Search" class="s-btn">
                        </form>
                        <?php
                        if (isset ($_POST["search_dept"])) {
                            $dept = $_POST["department"];
                            $sql = "SELECT * FROM users where dept = '$dept'";
                            $q = mysqli_query($con, $sql);
                            $t = mysqli_num_rows($q);
                            if ($t == 0) {
                                echo "No users available from " . $dept;
                            } else {
                                while ($r = mysqli_fetch_assoc($q)) {
                                    $user_regi = $r["reg"];
                                    $user_name = $r["name"];
                                    $a = "other_profile.php?target=" . $user_regi;
                                    echo "<a href='$a'><button class='search-opt'>$user_name</button></a><br>";
                                }
                            }
                        }
                        ?>
                        
                    </div>

                    <div class="form-opt">
                        <form method="post">
                            <input type="text" name="target_name" placeholder="Search by name" class="int-field">
                            <input type="submit" name="search_name" value="Search" class="s-btn">
                        </form>
                        <?php
                        if (isset ($_POST["search_name"])) {
                            $dept = $_POST["target_name"];
                            $sql = "SELECT * FROM users where name like '%$dept%'";
                            $q = mysqli_query($con, $sql);
                            $t = mysqli_num_rows($q);
                            if ($t == 0) {
                                echo "No users available named " . $dept;
                            } else {
                                while ($r = mysqli_fetch_assoc($q)) {
                                    $user_regi = $r["reg"];
                                    $user_name = $r["name"];
                                    $a = "other_profile.php?target=" . $user_regi;
                                    echo "<a href='$a'><button class='search-opt'>$user_name</button></a><br>";
                                }
                            }
                        }
                        ?>
                        
                    </div>

                    <div class="form-opt">
                        <form method="post">
                            <input type="text" name="topic" placeholder="Search by topic" class="int-field">
                            <input type="submit" name="search_topic" class="s-btn" value="Search">
                        </form>
                        <?php
                        if (isset ($_POST["search_topic"])) {
                            $dept = $_POST["topic"];
                            $sql = "SELECT * FROM users where bio like '%$dept%'";
                            $q = mysqli_query($con, $sql);
                            $t = mysqli_num_rows($q);
                            if ($t == 0) {
                                echo "No users available interested in " . $dept;
                            } else {
                                while ($r = mysqli_fetch_assoc($q)) {
                                    $user_regi = $r["reg"];
                                    $user_name = $r["name"];
                                    $a = "other_profile.php?target=" . $user_regi;
                                    echo "<a href='$a'><button class='search-opt'>$user_name</button></a><br>";
                                }
                            }
                        }
                        ?>
                        
                    </div>
                </div>
                <h1 class="title">All Posts</h1>
                <?php
                while ($r1 = mysqli_fetch_assoc($q1)) {
                    $registration_no = $r1["reg"];

                    $sql2 = "SELECT * FROM users where reg = $registration_no;";
                    $q2 = mysqli_query($con, $sql2);
                    $r2 = mysqli_fetch_assoc($q2);
                    $url = "other_profile.php?target=" . $r2["reg"];

                    echo <<<_END
                <section class="post-container">
                    <div class="card testimonial-card">
                        <div class="card-up"></div>
                        <div class="avatar">
                            
                            <a href='$url' title='$r2[name] from $r2[dept]'>
        <img src='$r2[image]'class="rounded-circle img-fluid"></a>
        _END;
                    ?>
                </div>
                <div class="card-body">
                    <h4 class="card-title font-weight-bold">
                        <?php echo <<<_END
                            <a href="$url"><button class="name-btn"><b>$r2[name] , $r2[dept]</b></button></a>
                            _END;
                        ?>
                    </h4>
                
                    <p class="post-writings">
                        <?php
                        echo <<<_END
                            $r1[post]
                            _END;
                        ?>
                    </p>
                    <p class="post-time">
                        <?php
                        echo <<<_END
                            $r1[post_time]
                            _END;
                        ?>
                    </p>
                </div>
                <div class="card-footer">

                    <?php
                    $sql3 = "SELECT * FROM interaction WHERE post_id = $r1[post_id] and interacted_id = $_SESSION[reg];";
                    $q3 = mysqli_query($con, $sql3);
                    $r3 = mysqli_fetch_assoc($q3);
                    $interaction_count = mysqli_num_rows($q3);

                    if ($interaction_count != 0) {
                        if ($r3["comment"] != Null) {
                            echo "You wrote " . $r3["comment"] . "<br>";
                        } else {
                            echo "You already interact here<br>";
                        }
                    } else {
                        echo <<<_END
                            <div>
                                <form action="interaction.php" method="post">
                                    <input type='text' name='comment' class='interect-int'>
                                    <input type="text" name='post_id' value="$r1[post_id]" hidden>
                                    <input type='submit' name='interact' value='Interact' class='int-btn'>
                                </form>
                            </div>
                            _END;
                    }
                    ?>
                </div>
            </div>
            </section>
        <?php } ?>
    </div>
    </div>
    </div>

    <?php
    ob_end_flush();
    ?>
</body>

</html>