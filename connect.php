<?php 

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "db_shop";

    $con = mysqli_connect($host, $user, $password, $db) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้เนื่องจาก : ".mysqli_connect_error());

    mysqli_set_charset($con, "utf8");

    
?>