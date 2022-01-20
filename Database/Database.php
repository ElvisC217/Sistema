<?php
    $host = "sql107.epizy.com";
    $user = "epiz_30859758";
    $pass = "kw21iKftlc";
    $dbname = "epiz_30859758_project";
    $conn = new mysqli($host , $user, $pass, $dbname);
    mysqli_query($conn , "SET character_set_result=utf8");
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
?>