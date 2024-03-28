<?php
error_reporting(0);

session_start();
require "config.php";
require "local_time.php";
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
    <title>Admin</title>
</head>

<body>
    Hello Admin
    <div id="footer">
        <button onclick="window.location.href='sign_in.php'">Logout</button>
    </div>

    <div>
        Search By Any Topic:
        <select id="dept">

            <option value="None">None</option>

            <option value="All">All Users</option>

            <option value="reported">Reported Users</option>
            <option value="all_posts">All Posts</option>

            <option value="ARC">Architecture</option>
            <option value="CEP">Chemical Engineering & Polymer Science</option>
            <option value="CEE">Civil & Environmental Engineering</option>
            <option value="CSE">Computer Science & Engnieering</option>
            <option value="EEE">Electrical & Electronics Engineering</option>
            <option value="FET">Food Engineering & Tea Technology</option>
            <option value="IPE">Industrial & Production Engineering</option>
            <option value="MEE">Mechanical Engineering</option>
            <option value="PME">Petroleum & Mining Engineering</option>
            <option value="BMB">Biochemistry & Molecular Biology</option>
            <option value="GEB">Genetic Engineering & Biotechnology</option>
            <option value="CHE">Chemistry</option>
            <option value="GEE">Geoggraphy & Environment</option>
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
        <button id="search_button_by_dept" value="Search">Search</button>
    </div>
    <div id="result">

        <div>



            <script>
                $(document).ready(function () {
                    $("#search_button_by_dept").click(function () {
                        $.ajax({
                            method: "POST",
                            url: "search_by_dept.php",
                            data: {
                                dept: $("#dept").val(),
                            },
                            success: function (data) {
                                $("#result").html(data);
                            }

                        });
                    });
                });
            </script>
</body>

</html>