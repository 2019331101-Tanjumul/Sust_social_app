<?php
ob_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="custome_css/sign_in_page.css">
    
    <script src="js/bootstarp.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <title>Sign In</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="assets/login_animation.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Hello Sustian
        </div>
        <form class="p-3 mt-3"method="post"action="">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="number" name="reg" id="userName" placeholder="Registration No">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <input type="submit" name="sign_in" value="Sign In"class="btn mt-3">
        </form>
        
    <?php
    require "config.php";
    session_start();
    if (isset($_POST["sign_in"])) {
        $reg = $_POST["reg"];
        $password = $_POST["password"];

        if ($reg == 999 and $password == "999") {
            header("location:admin_granted.php");
        } else {
            $sql = "SELECT * FROM users where reg = $reg;";


            $query = mysqli_query($con, $sql);

            $total1 = mysqli_num_rows($query);
            if ($total1 == 1) {
                $r1 = mysqli_fetch_assoc($query);
                /*
                echo "<pre>";
                print_r($r1);
                echo "</pre>";
                */

                $actual_password = $r1["password"];
                $user_name = $r1["name"];


                $_SESSION["name"] = $user_name;
                $_SESSION["reg"] = $reg;
                $_SESSION["dept"] = $r1["dept"];
                $_SESSION["email"] = $r1["email"];

                $_SESSION["phone"] = $r1["phone"];
                $_SESSION["address"] = $r1["address"];
                $_SESSION["image"] = $r1["image"];
                $_SESSION["gender"] = $r1["gender"];

                $_SESSION["blood"] = $r1["blood"];
                $_SESSION["dob"] = $r1["dob"];
                $_SESSION["bio"] = $r1["bio"];


                if ($actual_password === $password) {
                    $admin_check = "SELECT * from verification where reg = $reg;";
                    $admin_query = mysqli_query($con, $admin_check);
                    $admin_status = mysqli_fetch_assoc($admin_query);
                    if ($admin_status["status"] === "verified") {

                        $activation_sql = "UPDATE status SET status = 'Active' WHERE reg = $reg;";
                        $activation_query = mysqli_query($con, $activation_sql);

                        exit(header("location:profile.php"));

                    } else {
                        echo "Hello " . $user_name . "<br>Wait till being verified.";
                    }
                } else {
                    echo "Hello " . $user_name . "<br>You insert wrong password.Try the exact one.";
                }
            } else {
                echo "no user found";
            }


        }

    }
    ?>
    <div class="text-center fs-6">
            <a href="forget_pass.php">Forget password?</a> or <a href="sign_up.php">Sign up</a>
        </div>
    </div>
    <?php 
    ob_end_flush();
     ?>
</body>
</html>