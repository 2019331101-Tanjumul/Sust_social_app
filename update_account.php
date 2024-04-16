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
    <link rel="stylesheet" href="ex_css/update.css">
    <script src="js/jquery.min.js"></script>
    <title>Account Update</title>
</head>

<body>
    <div class="container">
        <div class="title">Update Account</div>
        <p>Some informations can't be changed</p>
        <div class="content">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $name ?>" class="form-control" readonly>
               </div>
               <div class="input-box">
                
                        <span class='details'>Dept</span>
                        <input type="text" class="form-control" value="<?php echo 'Department of ' . $dept ?>" readonly>
               </div>
               <div class="input-box">
                       <span class="details">Email</span>
                        <input type="email" name="email2" value="<?php echo $email ?>"
                            placeholder="e.g your_email@gmail.com" class="form-control">
                </div>
                <div class="input-box">
                         <span class="details">Password</span>
                        <input type="password" class="form-control" id="password" name="password2"
                            placeholder="Password">

                </div>
                 <div class="input-box">
                        <span class="details">Reg. No</span>
                        <input type="text" name="reg" placeholder="e.g 2019331087" value="<?php echo $reg ?>"
                            class="form-control" readonly>
                 </div>
                 <div class="input-box">
                         <span class="details">Phone</span>
                        <input type="text" name="phone2" value="<?php echo $phone ?>" placeholder="e.g 01234567891"
                            class="form-control">
                 </div>
                 <div class="input-box">
                       <span class="details">Address</span>
                          <input type="text" class="form-control" id="address" placeholder="e.g Madina Market, Sylhet"
                            name="address2" value="<?php echo $address ?>">
                       
                 </div>
       
              <div class="input-box">
                <span class="details">Blood Group</span>
                <input type="text"class="form-control" value="<?php echo $blood ?>" readonly>
              </div>
              <div class="input-box">
              <span class="details">Date of Birth</span>
              <input type="text" class="form-control" value="<?php echo $dob ?>" readonly>
              </div>

              <div class="input-box">
              <span class="details">Gender</span>
              <input type="text"class="form-control" value="<?php echo $gender ?>" readonly>
              </div>

            </div>
            <div class="file-box">
              <span class="details">Profile-photo</span><br>
              <input type="file" name="updated_photo" id="file-select">
              </div>

            <div class="text-container">
            <span class="text-title">About Yourself</span><br>
            <input type="text"name="bio2" class="form-control" value="<?php echo $bio; ?>">
            </div>
           
           

           
            <div class="button">
                <input type="submit" value="Update" name="update">
            </div>
        </form>
        </div>

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