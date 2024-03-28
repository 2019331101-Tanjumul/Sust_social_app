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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstarp.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <style>
        body {
            background-color: #f5f7fa;
        }

        .testimonial-card .card-up {
            height: 120px;
            overflow: hidden;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        .aqua-gradient {
            background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
        }

        .testimonial-card .avatar {
            width: 120px;
            margin-top: -60px;
            overflow: hidden;
            border: 5px solid #fff;
            border-radius: 50%;
        }
    </style>
    <title>Registration</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 px-1 bg-dark position-fixed" id="sticky-sidebar">
                <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2">
                    <a href="profile.php" class="nav-link">My Profile</a>
                    <a href="profile.php#resume" class="nav-link">My Posts</a>
                    <a href="create_post.php" class="nav-link">Create Post</a>
                    <a href="chat.php" class="nav-link">My Chats</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
            </div>
            <div class="col-9 offset-3" id="main">

                <div class="search_area">
                    <div>
                        <form method="post">
                            <input type="text" name="department" placeholder="Search by department">
                            <input type="submit" name="search_dept">
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
                                    echo "<a href='$a'><button>$user_name</button></a><br>";
                                }
                            }
                        }
                        ?>
                        <hr>
                    </div>

                    <div>
                        <form method="post">
                            <input type="text" name="target_name" placeholder="Search by name">
                            <input type="submit" name="search_name">
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
                                    echo "<a href='$a'><button>$user_name</button></a><br>";
                                }
                            }
                        }
                        ?>
                        <hr>
                    </div>

                </div>
                <h1>All Posts</h1>
                <?php
                while ($r1 = mysqli_fetch_assoc($q1)) {
                    $registration_no = $r1["reg"];

                    $sql2 = "SELECT * FROM users where reg = $registration_no;";
                    $q2 = mysqli_query($con, $sql2);
                    $r2 = mysqli_fetch_assoc($q2);
                    $url = "other_profile.php?target=" . $r2["reg"];

                    echo <<<_END
                <section class="mx-auto my-5" style="max-width: 23rem;">
                    <div class="card testimonial-card mt-2 mb-3">
                        <div class="card-up aqua-gradient"></div>
                        <div class="avatar mx-auto white">
                            
                            <a href='$url' title='$r2[name] from $r2[dept]'>
        <img src='$r2[image]'class="rounded-circle img-fluid"></a>
        _END;
                    ?>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold">
                        <?php echo <<<_END
                            <a href="$url"><button class="btn btn-warning"><b>$r2[name] , $r2[dept]</b></button></a>
                            _END;
                        ?>
                    </h4>
                    <hr>
                    <p><i class="fas fa-quote-left"></i>
                        <?php
                        echo <<<_END
                            $r1[post]
                            _END;
                        ?>
                    </p>
                    <p>
                        <?php
                        echo <<<_END
                            $r1[post_time]
                            _END;
                        ?>
                    </p>
                </div>
                <div class="card-footer text-center">

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
                                    <input type='text' name='comment'>
                                    <input type="text" name='post_id' value="<?php echo $r1[post_id] ?>" hidden>
                                    <input type='submit' name='interact' value='Interact'>
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