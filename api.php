<?php
    $file = 'phplog';
    date_default_timezone_set('EST');
    $current = file_get_contents($file);
    include("config.php");
    $conn = mysqli_connect($MYSQL_HOST, $MYSQL_USERNAME, $MYSQL_PASSWORD);
    if (!$conn){
	$current .= date(DATE_RFC2822) .  mysqli_connect_error() . "\n";
	file_put_contents($file, $current);
        //die("Connection failed: " . mysqli_connect_error());
    }
	$current .= date(DATE_RFC2822) . " Connected \n";
	file_put_contents($file, $current);
    
    if(isset($_GET["database"])){
        $dbs = mysqli_select_db($conn, $_GET["database"]);
    }
    if(!$dbs){
	$current .= date(DATE_RFC2822) . " Database " . $_GET["database"] . " not selected \n";
	file_put_contents($file, $current);
//        die("Database not selected.");
   } else {
	$current .= date(DATE_RFC2822) . " Database selected \n";
	file_put_contents($file, $current);
	}

    if(!isset($_GET["table"])){
	$current .= date(DATE_RFC2822) . " Table not selected \n";
	file_put_contents($file, $current);
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
        $result = mysqli_query($conn, "SELECT * FROM $tableName limit 20");
        $rownums = mysqli_num_rows($result);
        $resultArray = array($rownums);
        while($resultRow = mysqli_fetch_assoc($result)){
            $resultArray[] = $resultRow;
        }
        echo json_encode($resultArray);
        mysqli_free_result($result);
    }
?>
