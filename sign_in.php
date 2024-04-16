<?php
ob_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/sign_in.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Sign In</title>
</head>
<body>
<div class="brand-name"><a href="index.html">Freshers' Guidline</a></div>
<div class="content">
       
        <div class="text">
            Hello Sustian
         </div>
         <form action="" method="post">
            <div class="field">
               <span class="fas fa-user"></span>
               <input type="number" name="reg" id="userName" placeholder="Registration No" required>
            </div>
            <div class="field">
               <span class="fas fa-lock"></span>
               <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <div class="forgot-pass">
               <a href="forget_pass.php">Forgot Password?</a>
            </div>
            <input type="submit" name="sign_in" value="Sign In" class="btn"></input>
            
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
                        echo '<span style="color:red;">Hello </span>' . $user_name . '<br><span style="color:red;">Wait till being verified.</span>';
                    }
                } else {
                    echo '<span style="color:red;">Hello </span>' . $user_name . '<br><span style="color:red;">You insert wrong password.Try the exact one.</span>';
                }
            } else {
                echo '<span style="color:red;margin:1rem 0;"> no user found </span>';
            }


        }

    }
    ?>
    <div class="sign-up">
               Not a member?
               <a href="sign_up.php">signup now</a>
    </div>
    </div>
    <?php 
    ob_end_flush();
     ?>
</body>
</html>