<?php
    include("config.php");
    $conn = mysqli_connect($MYSQL_HOST, $MYSQL_USERNAME, $MYSQL_PASSWORD);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $dbs = mysqli_select_db($conn, "sitedata");
    if(!$dbs){
        die("Database not selected.");
    }

    /*
    if(isset($_GET["id"]) && isset($_GET["category"])){
        $articleID = $_GET["id"];
        $tableName = $_GET["category"];
        $result = mysqli_query($conn, "SELECT * FROM $tableName WHERE id=$articleID");
        $resultArray = mysqli_fetch_row($result);
        echo json_encode($resultArray);
    } else */

    if(isset($_GET["category"])){
        $tableName = $_GET["category"];
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        $resultArray = mysqli_fetch_row($result);
        echo json_encode($resultArray);
        mysqli_free_result($result);
    }
?>
