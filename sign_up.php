<?php
ob_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/sign_up.css">
    
    <title>Registration</title>
</head>

<body>
<div class="brand-name"><a href="index.html">Freshers' Guidline</a></div>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Department</span>
        
            <select name="dept">
                            
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
          <div class="input-box">
            <span class="details">Email</span>
            <input name="email" type="email" placeholder="Enter your email" required>
          </div>
    
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Registration No</span>
            <input type="text" name="reg" placeholder="Enter your reg no" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your phone no" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" id="address" placeholder="Enter your address" required>
          </div>
          <div class="input-box">
            <span class="details">Blood Group</span>
               
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
       
       <div class="birth-container">
            <span class="birth-title">Date of Birth</span>
            <div class="birth-group">
                <div class="birth-item">

                  <input type="number" name="day" min="1" max="31" placeholder="Day">
                </div>

                <div class="birth-item">
                        <select name="month">
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
                </div>

                <div class="birth-item">
                        <input type="number" name="year" placeholder="Year">
                </div>
            
            </div>

          </div>
        <div class="user-details">
        <div class="input-box">
            <span class="details">Gender</span>
        
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
            

          </div>
          <div class="input-box" id="file-select">
            <span class="details">Profile Photo</span>
            <input type="file" name="image">
          </div>
        </div>
        <div class="text-container">
            <span class="text-title">Write about your interests as you can help</span>
            <textarea name="bio"></textarea>
        </div>
       
        <div class="button">
          <input type="submit" value="Register" name="submit">
        </div>
        <div id="description" style="margin: 10px 0px;
  color: #595959;
  font-size: 16px;">
               Already have an account?
               <a href="sign_in.php" style=" color: #e20641eb;
  text-decoration: none;">signin now</a>
        </div>
      </form>
    </div>
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