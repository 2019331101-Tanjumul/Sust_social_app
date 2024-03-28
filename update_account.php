<?php
ob_start();
error_reporting(0);

require "config.php";
session_start();

$name = $_SESSION["name"];
$reg = $_SESSION["reg"];
$dept = $_SESSION["dept"];
$email = $_SESSION["email"];
$phone = $_SESSION["phone"];
$address = $_SESSION["address"];
$image = $_SESSION["image"];
$gender = $_SESSION["gender"];
$blood = $_SESSION["blood"];
$dob = $_SESSION["dob"];
$bio = $_SESSION["bio"];


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
    <title>Account Update</title>
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center my-3 mx-4 p-3">
                <div class="col align-items-center">
                    <h2>Update Account</h2>
                    <p>Some informations can't be changed</p>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text text-warning">Name</span>
                        <input type="text" value="<?php echo $name ?>" class="form-control" readonly>

                        <span class='input-group-text'>Dept</span>
                        <input type="text" class="form-control" value="<?php echo 'Department of ' . $dept ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="form-control" id="password" name="password2"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="address" placeholder="e.g Madina Market, Sylhet"
                            name="address2" value="<?php echo $address ?>">
                        <label for="address">Address</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-warning">Email</span>
                        <input type="email" name="email2" value="<?php echo $email ?>"
                            placeholder="e.g your_email@gmail.com" class="form-control">

                        <span class="input-group-text text-warning">Phone</span>
                        <input type="text" name="phone2" value="<?php echo $phone ?>" placeholder="e.g 01234567891"
                            class="form-control">

                        <span class="input-group-text text-warning">Reg. No</span>
                        <input type="text" name="reg" placeholder="e.g 2019331087" value="<?php echo $reg ?>"
                            class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <p class="text-success">Date of birth</p>
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control" value="<?php echo $dob ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <p class="text-success">Gender</p>
                    <div class="input-group input-group-md">
                    <input type="text"class="form-control" value="<?php echo $gender ?>" readonly>
                    </div>
                </div>


                <div class="col">
                    <p class="text-success">Blood Group</p>
                    <div class="input-group input-group-md">
                    <input type="text"class="form-control" value="<?php echo $blood ?>" readonly>
                    </div>
                </div>

                <div class="col">
                    <p class="text-success">Photo</p>
                    <div class="input-group input-group-md">

                    <input type="file" name="updated_photo">
                    </div>
                </div>

            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <p class="text-success">About Yourself</p>
                    <div class="input-group input-group-md">
                        <input type="text"name="bio2" class="form-control" value="<?php echo $bio; ?>">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Update" name="update">
            </div>
        </form>
    </div>


    <?php
    require "config.php";
    if (isset ($_POST["update"])) {
        $password2 = $_POST["password2"];
        $email2 = $_POST["email2"];
        $phone2 = $_POST["phone2"];
        $address2 = $_POST["address2"];
        $bio2 = $_POST["bio2"];

        $password = $password2;
        $email = $email2;
        $phone = $phone2;
        $address = $address2;
        $bio = $bio2;

        $_SESSION["email"] = $email;
        $_SESSION["phone"] = $phone;
        $_SESSION["address"] = $address;
        $_SESSION["bio"] = $bio;

        $updated_image_url = $_FILES["updated_photo"]["name"];
        if ($updated_image_url != Null) {
            $updated_tmp_image = $_FILES["updated_photo"]["tmp_name"];
            unlink("user_image/" . $reg . ".png");
            $photo_target = "user_image/" . $reg . ".png";
            move_uploaded_file($updated_tmp_image, $photo_target);

            $sql = "UPDATE users SET image = '$photo_target',password='$password2' , email = '$email2', phone = '$phone2' , address = '$address2' , bio = '$bio2' where reg = $reg;";


        } else {

            $sql = "UPDATE users SET password='$password2' , email = '$email2', phone = '$phone2' , address = '$address2' , bio = '$bio2' where reg = $reg;";


        }

        //echo $sql;
    
        $query = mysqli_query($con, $sql);
        exit(header("location:profile.php"));

    }
    /*
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    */
    ob_end_flush();
    ?>
</body>

</html>