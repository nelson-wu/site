<?php
    include("config.php");
    $conn = mysqli_connect($MYSQL_HOST, $MYSQL_USERNAME, $MYSQL_PASSWORD);
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_GET["database"])){
        $dbs = mysqli_select_db($conn, $_GET["database"]);
    }
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

    if(isset($_GET["table"])){
        $tableName = mysqli_real_escape_string($conn, $_GET["table"]);
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        $rownums = mysqli_num_rows($result);
        $resultArray = array($rownums);
        while($resultRow = mysqli_fetch_assoc($result)){
            $resultArray[] = $resultRow;
        }
        echo json_encode($resultArray);
        mysqli_free_result($result);
    }
?>
