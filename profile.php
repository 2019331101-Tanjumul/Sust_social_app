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
  <link href="assets_pro/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_pro/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_pro/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_pro/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="ex_css/profile.css" rel="stylesheet">

  <!-- =======================================================
  
  ======================================================== -->

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
 

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <?php
        echo <<<_END
        <div class="img-container"><img src="$image" alt=""></div>
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
          <span style="color: #800c33;">Delete Account</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-end align-items-center">
    <div class="hero-container me-3" data-aos="fade-in">
      <h1>
        <span><?php echo $name; ?></span>
      </h1>
      <p><span class="typed" data-typed-items="<?php echo "Department of $dept"; ?>"></span></p>

      <p>
        <?php echo $bio; ?>
      </p>

      <p>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
      </p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container about-container">

        <div class="section-title">
          <h2>About</h2>
          <?php echo <<<_END
          <p>$bio</p>
          _END;
          ?>
        </div>

        <div class="row">
          
          <div class="content" data-aos="fade-left">
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
      <div class="container posts-container">

        <div class="section-title">
          <h2>My Posts</h2>
          
          <?php
          $sql = "SELECT * FROM posts where reg = $reg;";
          $q = mysqli_query($con, $sql);
          $total_post = mysqli_num_rows($q);
          ?>
          <a href="create_post.php"><button class="create-btn">Create Post</button></a>
          <?php
          if ($total_post == 0) {

            echo <<<_END
                <div class="not-post">
                    You haven't posted yet.
                </div>
            _END;
          } else {
            while ($post = mysqli_fetch_assoc($q)) {
              ?>
              <div id="post_details">
                <p class="post-time">Posted at: <b>
                  <?php echo $post["post_time"] ?>
                </b></p>
               <div class="post-writings"> <?php echo $post["post"] ?></div>
                <?php
                $url_update = "update_post.php?post_id=" . $post["post_id"];

                $url_delete = "delete_post.php?post_id=" . $post["post_id"];

                echo "<br><a href='$url_update'><button class='update-btn'>UPDATE</button></a>";


                echo "<a href='$url_delete'><button class='delete-btn'>DELETE</button></a><br>";

                echo "<hr><p class='notifi'>Post Notification</p><hr>";

                $search_interaction_sql = "SELECT * FROM interaction where post_id = $post[post_id];";

                $search_interaction_query = mysqli_query($con, $search_interaction_sql);

                $total_interaction = mysqli_num_rows($search_interaction_query);

                if ($total_interaction == 0) {
                  echo "<p class='interect-title'>Nobody Interacts Yet</p>";
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