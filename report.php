<?php
error_reporting(0);

session_start();
require "config.php";
require "local_time.php";

$reporting_time = $time;
$target_id = $_GET["target"];
$reporter_id = $_SESSION["reg"];

#reporter info
$sql1 = "SELECT * FROM users where reg = $reporter_id;";
$q1 = mysqli_query($con, $sql1);
$reporter = mysqli_fetch_assoc($q1);

#target info
$sql2 = "SELECT * FROM users where reg = $target_id;";
$q2 = mysqli_query($con, $sql1);
$target = mysqli_fetch_assoc($q2);

$url_for_aborting = "other_profile.php?target=" . $target_id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex_css/report.css">
    <script src="js/jquery.min.js"></script>
    <title>Report</title>
</head>
<body>
    <div class="container">
    <div class="title">
        Report Form
    </div>
    <div class="content">
        <form action="" method="POST"enctype = "multipart/form-data">
            <div class="report-title">
                Why do you want to report against
                <?php echo $target["name"]."???"; ?>
            </div>

            <div>
                <textarea name="complain_details"></textarea>
            </div>

            <div class="img-title">
                <p>Any image / screenshot as evidence:</p>
                <input type="file" name="proof">
            </div>

            <div class="btn-grp">
                <input type="submit" value="Report" name="report_button" class="report-btn">
                <input type="reset" value="Clear" class="clear-btn">
            </div>

        </form>
        <div class="abort-btn">
            <a href="<?php echo $url_for_aborting?>"><button>Abort Reporting</button></a>
        </div>

    </div>

    </div> 
   
    <?php
    if(isset($_POST["report_button"]))
    {

        $report_id = mt_rand(1,10000);

        $image_url = $_FILES["proof"]["name"];
        if($image_url!=Null)   
        {
            $tmp_image = $_FILES["proof"]["tmp_name"];
        $evidence_name = $report_id."_re_".$reporter_id."_ag_".$target_id.".png";
		$evidence_destination = "report/".$evidence_name;
		
        move_uploaded_file($tmp_image,$evidence_destination);

        $complain_details = $_POST["complain_details"];

        $sql_for_report = "INSERT INTO reports values($report_id,$reporter_id,$target_id,'$complain_details','$evidence_destination','$reporting_time');";

        $report_query = mysqli_query($con,$sql_for_report);
        

        }
        else
        {
            $complain_details = $_POST["complain_details"];

        $sql_for_report = "INSERT INTO reports values($report_id,$reporter_id,$target_id,'$complain_details','No proof','$reporting_time');";

        $report_query = mysqli_query($con,$sql_for_report);
        

        }
		header("location:$url_for_aborting");

    }

    ?>
</body>

</html>