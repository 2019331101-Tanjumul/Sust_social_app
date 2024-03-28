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
    <script src="js/bootstarp.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title>Registration</title>
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center my-3 mx-4 p-3">
                <div class="col align-items-center">
                    <h2>Registration Form</h2>
                    <p>Please provide correct information</p>

                </div>
            </div>

            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text text-warning">Name</span>
                        <input type="text" name="name" placeholder="Your name" class="form-control">
                        <span class='input-group-text'>Dept</span>
                        <select name="dept" class="form-select form-select-md">
                            <option value="ARC">Architecture</option>
                            <option value="CEP">Chemical Engineering & Polymer Science</option>
                            <option value="CEE">Civil & Environmental Engineering</option>
                            <option value="CSE">Computer Science & Engineering</option>
                            <option value="EEE">Electrical & Electronics Engineering</option>
                            <option value="FET">Food Engineering & Tea Technology</option>
                            <option value="IPE">Industrial & Production Engineering</option>
                            <option value="MEE">Mechanical Engineering</option>
                            <option value="PME">Petroleum & Mining Engineering</option>
                            <option value="BMB">Biochemistry & Molecular Biology</option>
                            <option value="GEB">Genetic Engineering & Biotechnology</option>
                            <option value="CHE">Chemistry</option>
                            <option value="GEE">Geography & Environment</option>
                            <option value="MAT">Mathematics</option>
                            <option value="OCG">Oceanography</option>
                            <option value="PHY">Physics</option>
                            <option value="STA">Statistics</option>
                            <option value="ANP">Anthropology</option>
                            <option value="BNG">Bangla</option>
                            <option value="ECO">Economics</option>
                            <option value="ENG">English</option>
                            <option value="PSS">Political Studies</option>
                            <option value="PAD">Public Administration</option>
                            <option value="SCW">Social Work</option>
                            <option value="SOC">Sociology</option>
                            <option value="FES">Forestry & Environmental Science</option>
                            <option value="BUS">Business Administration</option>
                            <option value="SWE">Software Engineering</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="address" placeholder="e.g Madina Market, Sylhet"
                            name="address">
                        <label for="address">Address</label>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-warning">Email</span>
                        <input type="email" name="email" placeholder="e.g your_email@gmail.com" class="form-control">

                        <span class="input-group-text text-warning">Phone</span>
                        <input type="text" name="phone" placeholder="e.g 01234567891" class="form-control">

                        <span class="input-group-text text-warning">Reg. No</span>
                        <input type="text" name="reg" placeholder="e.g 2019331087" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <p class="text-success">Date of birth</p>
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-warning">Day</span>
                        <input type="number" name="day" class="form-control" min="1" max="31">

                        <span class="input-group-text text-warning">Month</span>
                        <select name="month" class="form-select">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>

                        <span class="input-group-text text-warning">Year</span>
                        <input type="number" name="year" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <p class="text-success">Gender</p>
                    <div class="input-group input-group-md">
                        <select name="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>


                <div class="col">
                    <p class="text-success">Blood Group</p>
                    <div class="input-group input-group-md">
                        <select name="blood" class="form-select">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>

                <div class="col">
                    <p class="text-success">Photo</p>
                    <div class="input-group input-group-md">
                        <input type="file" name="image">
                    </div>
                </div>

            </div>

            <div class="row justify-content-center my-3 mx-4 p-3 shadow-lg ">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Write about your interests as you can help others</h5>
                        </div>
                        <div class="card-body">
                            <textarea name="bio" rows="5" cols="130"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3 mx-4 p-3">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Registration" name="submit">
            </div>
        </form>
    </div>


    <?php
    require "config.php";
    if(isset($_POST['submit']))
    {
        $reg = $_POST["reg"];
        $sql2 = "SELECT * FROM users where reg=$reg;";
        $query2 = mysqli_query($con,$sql2);
        $total2 = mysqli_num_rows($query2);
        if($total2==1)
        {
            echo "user exist";
        }
        else
        {
        $password = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $dept = $_POST["dept"];

        $image_url = $_FILES["image"]["name"];
        
		$tmp_image = $_FILES['image']['tmp_name'];
		$target = "user_image/".$reg.".png";
		move_uploaded_file($tmp_image,$target);
		
        $gender = $_POST["gender"];
        $blood = $_POST["blood"];
        $dob = $_POST["day"]." ".$_POST["month"]." ".$_POST["year"];
        $bio = $_POST["bio"];

        $image = $target;
        $dir_name = "$reg";

        /*
        mkdir("users/".$dir_name);
        mkdir("users/".$dir_name."/posts");
        mkdir("users/".$dir_name."/posts"."/saved_posts");
        mkdir("users/".$dir_name."/assets");
        mkdir("users/".$dir_name."/chats");
        mkdir("users/".$dir_name."/info");
        

        $post_address = "users/".$dir_name."/posts"."/";
        $post = fopen($post_address."myposts.txt","a+");
        
        $friend_address = "users/".$dir_name."/info"."/";
        $friend = fopen($friend_address."myfriends.txt","a+");
        
        $blocked_address = "users/".$dir_name."/info"."/";
        $blocked = fopen($blocked_address."myblocked.txt","a+");
        
        */

        $sql = "INSERT INTO users values";
        $sql.="(
        $reg,
        '$dept',
        '$password',
        '$name',
        '$email',
        '$phone',
        '$address',
        '$image',
        '$gender',
        '$blood',
        '$dob',
        '$bio'     
        );";
        //echo $sql;

        $query = mysqli_query($con,$sql);

        $sql2 = "INSERT INTO status values($reg,'Inactive');";
        $query2 = mysqli_query($con,$sql2);

        $sql3 = "INSERT INTO verification values($reg,'unverified');";
        $query3 = mysqli_query($con,$sql3);

        
        exit(header("location:sign_in.php"));

        }
        
    }
    ?>

    <?php
    ob_end_flush();
    ?>
</body>

</html>