<?php
error_reporting(0);

require "config.php";

    $keyword = $_POST["searched_for"];

    $sql = "SELECT * from users where name like '%$keyword%';";
    $q = mysqli_query($con, $sql);
    while ($r = mysqli_fetch_assoc($q)) {
        $url = "audit.php?reg = ".$r["reg"];
        $output = "<a href='$url'><button>" . $r["name"]."-".$r["dept"] . "</button></a>";
        echo $output;

    }


?>