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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $name;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_pro/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_pro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_pro/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_pro/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_pro/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_pro/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_pro/css/style.css" rel="stylesheet">

  <!-- =======================================================
  
  ======================================================== -->

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <?php
        echo <<<_END
        <img src="$image" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="profile.php">$name</a></h1>
      _END;
        ?>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Myself</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>My Posts</span></a>
          </li>
          <li><a href="chat.php" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>My Chats</span></a>
          </li>
          <li><a href="feed.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>My Feeds</span></a></li>
          <li><a href="update_account.php" class="nav-link scrollto"><i class="bx bx-server"></i>
          <span>Update Account</span></a></li>

          <li><a href="delete_account.php" class="nav-link scrollto"><i class="bx bx-book"></i>
          <span style="color:red;">Delete Account</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-end align-items-center">
    <div class="hero-container me-3" data-aos="fade-in">
      <h1>
        <?php echo $name; ?>
      </h1>
      <p><span class="typed" data-typed-items="<?php echo "Department of $dept"; ?>"></span></p>

      <p>
        <?php echo $bio; ?>
      </p>

      <p>
        <a href="logout.php"><button>Logout</button></a>
      </p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <?php echo <<<_END
          <p>$bio</p>
          _END;
          ?>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <?php
            echo <<<_END
            <img src="$image" class="img-fluid" alt="">
            _END;
            ?>

          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>
              <?php echo "I am studying at Department of $dept"; ?>
            </h3>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>
                      <?php echo $dob; ?>
                    </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>
                      <?php echo $email; ?>
                    </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>
                      <?php echo $phone; ?>
                    </span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span>
                      <?php echo $gender; ?>
                    </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Blood:</strong> <span>
                      <?php echo $blood; ?>
                    </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Address</strong> <span>
                      <?php echo $address; ?>
                    </span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container mt-5">

        <div class="section-title">
          <h2>My Posts</h2>
          
          <?php
          $sql = "SELECT * FROM posts where reg = $reg;";
          $q = mysqli_query($con, $sql);
          $total_post = mysqli_num_rows($q);
          ?>
          <a href="create_post.php"><button class="btn btn-warning">Create Post</button></a>
          <?php
          if ($total_post == 0) {

            echo <<<_END
                <div>
                    You haven't post yet.
                </div>
            _END;
          } else {
            while ($post = mysqli_fetch_assoc($q)) {
              ?>
              <div id="post_details">
                Posted at: <b>
                  <?php echo $post["post_time"] ?>
                </b><br>
                <?php echo $post["post"] ?>
                <?php
                $url_update = "update_post.php?post_id=" . $post["post_id"];

                $url_delete = "delete_post.php?post_id=" . $post["post_id"];

                echo "<br><a href='$url_update'><button class='btn btn-success text-white'>UPDATE</button></a>";


                echo "<a href='$url_delete'><button class='btn btn-danger'>DELETE</button></a><br>";

                echo "<hr>Post Notification<hr>";

                $search_interaction_sql = "SELECT * FROM interaction where post_id = $post[post_id];";

                $search_interaction_query = mysqli_query($con, $search_interaction_sql);

                $total_interaction = mysqli_num_rows($search_interaction_query);

                if ($total_interaction == 0) {
                  echo "Nobody Interacts Yet<br>";
                } else {
                  while ($rows = mysqli_fetch_assoc($search_interaction_query)) {
                    $interactor_id = $rows["interacted_id"];

                    $search_interactor_sql = "SELECT * from users where reg = $interactor_id;";

                    $search_interactor_query = mysqli_query($con, $search_interactor_sql);

                    $interactor_details = mysqli_fetch_assoc($search_interactor_query);

                    $interactor_profile = "other_profile.php?target=" . $interactor_details["reg"];

                    echo <<<_END

                        <a href='$interactor_profile' title='$interactor_details[name] from $interactor_details[dept]'>
                        <img src='$interactor_details[image]'class='img rounded rounded-circle'style='width:10%;height:10%;'></a>

                        <a href="$interactor_profile" title = 'from $interactor_details[dept]'><button class="btn btn-warning">$interactor_details[name] , <b>$interactor_details[dept]</b></button></a>
                        _END;

                    if ($rows["comment"] != Null) {
                      echo " says ";

                      echo <<<_END
                            <mark>$rows[comment]</mark><br>
                            _END;

                    } else {
                      echo " wants to interact with you.<br>";
                    }


                  }
                }

                ?>
              </div>

              <script src="js/jquery.min.js"></script>
              <script>
                $(document).ready(function () {

                  setInterval(function () {
                    $("#post_details").load(location.href + " #post_details");
                  }, 1000);

                });
              </script>

              <?php
            }
          }
          ob_end_flush();
          ?>


        </div>


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Campus SUST</span></strong>
      </div>
    </div>
  </footer><!-- End  Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets_pro/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_pro/vendor/aos/aos.js"></script>
  <script src="assets_pro/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_pro/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_pro/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets_pro/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_pro/vendor/typed.js/typed.umd.js"></script>
  <script src="assets_pro/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets_pro/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_pro/js/main.js"></script>
<?php 
ob_end_flush();
?>
</body>

</html>
<!-- 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #d53369;">
    <div class="w-full flex flex-row flex-wrap">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .round {
    border-radius: 50%;
  }
</style>


<div class="w-full bg-indigo-100 h-screen flex flex-row flex-wrap justify-center ">
  
  <!-- Begin Navbar 
  
  <div class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
    <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
  </div>
  
  <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
    <div class="p-5 bg-white sticky top-0">
      <img class="border border-indigo-100 shadow-lg round" src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg">
      <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
        Name Of Person
      </div>
    </div>
    <div class="w-full h-screen antialiased flex flex-col hover:cursor-pointer">
      <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-comment text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Messages</a>
      <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-cog text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Settings</a>
      <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-arrow-left text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Log out</a>
    </div>
  </div>
  
  <!-- End Navbar 
  
  <div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
    <div class="bg-white w-full shadow rounded-lg p-5">
      <textarea class="bg-pink-150 w-full rounded-lg shadow border p-2" rows="5" placeholder="Ask anything on FreshersGuideline"></textarea>
      
      <div class="w-full flex flex-row flex-wrap mt-3">
        <div class="w-1/3">
          <select class="w-full p-2 rounded-lg bg-gray-200 shadow border float-left">
            <option>Public</option>
            <option>Private</option>
          </select>
        </div>
        <div class="w-2/3">
          <button type="button" class="float-right bg-indigo-400 hover:bg-indigo-300 text-white p-2 rounded-lg">Submit</button>
        </div>
      </div>
    </div>
    
    <div class="mt-3 flex flex-col">
      
      
      <div class="bg-white mt-3">
        <img class="border rounded-t-lg shadow-lg " src="https://images.unsplash.com/photo-1572817519612-d8fadd929b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
        <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
          A Pretty Cool photo from the mountains. Image credit to @danielmirlea on Unsplash.
        </div>
        <div class="bg-white p-1 border shadow flex flex-row flex-wrap">
          <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
        </div>
        
        <div class="bg-white border-4 bg-gray-300 border-white rounded-b-lg shadow p-5 text-xl text-gray-700 content-center font-semibold flex flex-row flex-wrap">
          <div class="w-full">
            <div class="w-full text-left text-xl text-gray-600">
              @Some Person
            </div>
           Working on Profile for FreshersGUideline
          </div>
        </div>
      </div>
      
      
      <div class="bg-white mt-3">
        <img class="border rounded-t-lg shadow-lg " src="https://cdn.daily-sun.com/public/news_images/2022/08/11/sust.jpg">
        <div class="bg-white border shadow p-5 text-2xl text-gray-700 font-semibold">
          A new gate is launched in the front side of the SUST and it looks amazing. 
        </div>
        <div class="bg-white p-1 rounded-b-lg border shadow flex flex-row flex-wrap">
          <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
        </div>
      </div>
      
      
      <div class="bg-white mt-3">
        <img class="border rounded-t-lg shadow-lg " src="https://www.eyenews.news/media/imgAll/2023February/en/sust-2304071503.jpg">
        <div class="bg-white border shadow p-5 text-2xl text-gray-700 font-semibold">
          Sust is now have a pretty good and responsive application fully loaded with helpful and open minded place to get help from the users around the University. 
        </div>
        <div class="bg-white p-1 rounded-b-lg border shadow flex flex-row flex-wrap">
          <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 border-r- text-center text-xl text-gray-700 font-semibold">Share</div>
          <div class="w-1/3 hover:bg-gray-200 border-l-4 text-center text-xl text-gray-700 font-semibold">Comment</div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html> -->
