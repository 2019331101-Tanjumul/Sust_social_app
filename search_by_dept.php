<?php
error_reporting(0);

session_start();
require("config.php");
$dept = $_POST["dept"];
$dept_array = array("ARC","CEP","CEE","CSE","EEE","FET","IPE","MEE","PME","BMB","GEB","CHE","GEE","MAT","OCG","PHY","STA","ANP","BNG","ECO","ENG","PSS","PAD","SCW","SOC","FES","BUS","SWE");

if ($dept == "All") {
    $sql_dept = "SELECT * FROM users;";
    $q_dept = mysqli_query($con, $sql_dept);
    $total_dept = mysqli_num_rows($q_dept);

    echo "<div class='container'><p class='all-title'>There are <b>" . $total_dept ."</b> students</p><div>";

    if ($total_dept > 0) {
        echo <<<_END
        <table class='container all-table'>
        <tr align='center'>
        <th>Reg. No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Blood Group</th>
        <th>Address</th>
        <th>Action</th>
        </tr>
        _END;

        while ($r = mysqli_fetch_assoc($q_dept)) {
            $verification_status_check_sql = "SELECT * FROM verification where reg = $r[reg];";
            $verification_status_check_query = mysqli_query($con, $verification_status_check_sql);
            $verification_status = mysqli_fetch_assoc($verification_status_check_query);

            $image = "<img src='$r[image]'class='img'style='width:2rem;height:2rem;border-radius:50%;object-fit:cover;object-position:center;'>";

            $verify = "verify.php?target=" . $r["reg"];

            $verify_button = "<a href=$verify><button>Verify</button></a>";

            $unverify = "unverify.php?target=" . $r["reg"];

            $unverify_button = "<a href=$unverify><button>Disable Account</button></a>";


            echo "<tr align='center'>";
            echo "<td>" . $r["reg"] . "</td><td>" . $image . "</td>";

            echo "<td>" . $r["name"] . "</td>";
            echo "<td>" . $r["email"] . "</td>";
            echo "<td>" . $r["phone"] . "</td>";
            echo "<td>" . $r["blood"] . "</td>";
            echo "<td>" . $r["address"] . "</td>";
            if ($verification_status["status"] == "unverified") {
                $output = "<td><form method='POST'action='verify.php'>
            <input type='text'name='target'value='$r[reg]'hidden>
            <input type='submit'value='Verify' class='verify-btn'>
            </form></td>";
                echo $output;
            } else {
                $output = "<td><form method='POST'action='unverify.php'>
            <input type='text'name='target'value='$r[reg]'hidden>
            <input type='submit'value='Disable' class='disable-btn'>
            </form></td>";
                echo $output;
            }


            echo "</tr>";

        }
        echo "</table>";

    }


}
elseif($dept=="all_posts")
{
    $sql_dept = "SELECT * FROM posts;";
$q_dept = mysqli_query($con, $sql_dept);
$total_dept = mysqli_num_rows($q_dept);

echo "<div class='container'><p class='all-title'>Total <b>" . $total_dept . "</b> posts</p></div>";

if ($total_dept > 0) {
    echo <<<_END
        <table class='container all-post-table'>
        <tr align='center'>
        <th>User</th>
        <th>Post</th>
        <th>Time</th>
        <th>Action</th>
        </tr>
        _END;

    while ($r = mysqli_fetch_assoc($q_dept)) {
        
        $user = $r["reg"];
        $post = $r["post"];
        $post_time = $r["post_time"];
        
        $verification_status_check_sql = "SELECT * FROM verification where reg = $user;";
        $verification_status_check_query = mysqli_query($con,$verification_status_check_sql);
        $verification_status = mysqli_fetch_assoc($verification_status_check_query);
        
        $verify = "verify.php?target=".$user;

        $verify_button = "<a href=$verify><button>Verify</button></a>";

        $unverify = "unverify.php?target=".$user;

        $unverify_button = "<a href=$unverify><button>Disable Account</button></a>";

        echo "<tr align='center'>";
        echo "<td>".$user."</td>";
        echo "<td>".$post."</td>";
        echo "<td>".$post_time."</td>";
        echo "<td>";
        if($verification_status["status"]=="unverified")
        {
            $output = "<form method='POST'action='verify.php'>
            <input type='text'name='target'value='$user'hidden>
            <input type='submit'value='Verify' class='verify-btn'>
            </form>";
            $dismiss = "<form method='POST'action='dismiss_post.php'>
            <input type='text'name='target'value='$r[post_id]'hidden>
            <input type='submit'value='Delete' class='delete-btn'>
            </form>";
            echo $output.$dismiss;
        }
        else
        {
            $output = "<form method='POST'action='unverify.php'>
            <input type='text'name='target'value='$user'hidden>
            <input type='submit'value='Disable'class='disable-btn'>
            </form>";
            $dismiss = "<form method='POST'action='dismiss_post.php'>
            <input type='text'name='target'value='$r[post_id]'hidden>
            <input type='submit'value='Delete' class='delete-btn'>
            </form>";
            echo $output.$dismiss;
        }

        
        echo "</td></tr>";
        
    }
    echo "</table>";

}


}
elseif($dept=="reported")
{
    $sql_dept = "SELECT * FROM reports;";
$q_dept = mysqli_query($con, $sql_dept);
$total_dept = mysqli_num_rows($q_dept);

echo "<div class='container'><p class='all-title'>Total <b>" . $total_dept . "</b> reported users</p></div>";

if ($total_dept > 0) {
    echo <<<_END
        <table class='container report-table'>
        <tr align='center'>
        <th>Reporter</th>
        <th>Complaint</th>
        <th>Details</th>
        <th>Proof</th>
        <th>Time</th>
        <th>Action</th>
        </tr>
        _END;

    while ($r = mysqli_fetch_assoc($q_dept)) {
        
        $reporter = $r["reporter_id"];
        $target = $r["target_id"];
        $report_details = $r["report_details"];
        $proof = $r["proof"];
        $reporting_time = $r["reporting_time"];
        
        $verification_status_check_sql = "SELECT * FROM verification where reg = $target;";
        $verification_status_check_query = mysqli_query($con,$verification_status_check_sql);
        $verification_status = mysqli_fetch_assoc($verification_status_check_query);
        
        $verify = "verify.php?target=".$target;

        $verify_button = "<a href=$verify><button>Verify</button></a>";

        $unverify = "unverify.php?target=".$target;

        $unverify_button = "<a href=$unverify><button>Disable Account</button></a>";

        echo "<tr align='center'>";
        echo "<td>".$reporter."</td>";
        echo "<td>".$target."</td>";
        echo "<td>".$report_details."</td>";
        echo "<td>";
        
        if($proof=="No proof")
        {
            echo "Proofless";
        }
        else
        {
            echo "<a href='proof.php?proof=$proof'><button class='verify-btn'>See Proof</button></a>";
        }

        echo "</td>";
        echo "<td>".$reporting_time."</td>";
        echo "<td>";
        if($verification_status["status"]=="unverified")
        {
            $output = "<form method='POST'action='verify.php'>
            <input type='text'name='target'value='$target'hidden>
            <input type='submit'value='Verify' class='verify-btn'>
            </form>";
            $dismiss = "<form method='POST'action='dismiss_report.php'>
            <input type='text'name='target'value='$r[report_id]'hidden>
            <input type='submit'value='Dismiss' class='delete-btn'>
            </form>";
            echo $output.$dismiss;
        }
        else
        {
            $output = "<form method='POST'action='unverify.php'>
            <input type='text'name='target'value='$target'hidden>
            <input type='submit'value='Disable' class='verify-btn'>
            </form>";
            $dismiss = "<form method='POST'action='dismiss_report.php'>
            <input type='text'name='target'value='$r[report_id]'hidden>
            <input type='submit'value='Dismiss' class='delete-btn'>
            </form>";
            echo $output.$dismiss;
        }

        
        echo "</td></tr>";
        
    }
    echo "</table>";

}

}
elseif(in_array($dept,$dept_array)==1)
{
    $sql_dept = "SELECT * FROM users where dept = '$dept';";
$q_dept = mysqli_query($con, $sql_dept);
$total_dept = mysqli_num_rows($q_dept);

echo "<div class='container'><p class='all-title'>There are <b>" . $total_dept . "</b> users from Department of <b>" . $dept . "</b></p><div>";

if ($total_dept > 0) {
    echo <<<_END
        <table class='container  dept-table'>
        <tr align='center'>
        <th>Reg. No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Blood Group</th>
        <th>Address</th>
        <th>Action</th>
        </tr>
        _END;

    while ($r = mysqli_fetch_assoc($q_dept)) {
        $verification_status_check_sql = "SELECT * FROM verification where reg = $r[reg];";
        $verification_status_check_query = mysqli_query($con,$verification_status_check_sql);
        $verification_status = mysqli_fetch_assoc($verification_status_check_query);
        
        $image = "<img src='$r[image]'class='img'style='width:2rem;height:2rem;border-radius:50%;object-fit:cover;object-position:center;'>";

        $verify = "verify.php?target=".$r["reg"];

        $verify_button = "<a href=$verify><button>Verify</button></a>";

        $unverify = "unverify.php?target=".$r["reg"];

        $unverify_button = "<a href=$unverify><button>Disable Account</button></a>";

        
        echo "<tr align='center'>";
        echo "<td>".$r["reg"]."</td><td>".$image."</td>";

        echo "<td>".$r["name"]."</td>";
        echo "<td>".$r["email"]."</td>";
        echo "<td>".$r["phone"]."</td>";
        echo "<td>".$r["blood"]."</td>";
        echo "<td>".$r["address"]."</td>";
        if($verification_status["status"]=="unverified")
        {
            $output = "<td><form method='POST'action='verify.php'>
            <input type='text'name='target'value='$r[reg]'hidden>
            <input type='submit'value='Verify' class='verify-btn'>
            </form></td>";
            echo $output;
        }
        else
        {
            $output = "<td><form method='POST'action='unverify.php'>
            <input type='text'name='target'value='$r[reg]'hidden>
            <input type='submit'value='Disable' class='disable-btn'>
            </form></td>";
            echo $output;
        }

        
        echo "</tr>";
        
    }
    echo "</table>";

}

}
else
{
    echo "";
}


?>