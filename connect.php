<?php 

    $hname = "localhost";
    $uname = "root";
    $pass = getenv('MYSQL_SECURE_PASSWORD');
    $db = "hospital";

    $conn = mysqli_connect($hname,$uname,$pass,$db);

    if(!$conn)
    {
        echo "CONNECTION ERROR";
        die();
    }
?>
