<?php 
error_reporting(0);

	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "sust3";
	$port = 3306;


	$con = mysqli_connect($hostname,$user,$password,$database,$port);	

    /*
    if($con)
    {
        echo "connected";
    }
    else
    {
        echo "disconnected";
    }
    */
?>