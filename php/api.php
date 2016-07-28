// PUT THIS OUTSIDE PUBLIC WEB DIRECTORY


<?php

include("/config.php");
date_default_timezone_set('EST');
$current = file_get_contents($LOGFILE);
$conn = mysqli_connect($MYSQL_HOST, $MYSQL_USERNAME, $MYSQL_PASSWORD);

if (!$conn){
	$current .= date(DATE_RFC2822) .  mysqli_connect_error() . "\n";
	file_put_contents($LOGFILE, $current);
	die("Connection failed: " . mysqli_connect_error());
}
$current .= date(DATE_RFC2822) . " Connected \n";
file_put_contents($LOGFILE, $current);

if(isset($_GET["database"])){
	$dbs = mysqli_select_db($conn, $_GET["database"]);
}
if(!$dbs){
	$current .= date(DATE_RFC2822) . " Database " . $_GET["database"] . " not selected \n";
	file_put_contents($LOGFILE, $current);
        die("Database not selected.");
} else {
	$current .= date(DATE_RFC2822) . " Database selected \n";
	file_put_contents($LOGFILE, $current);
}

if(!isset($_GET["table"])){
	$current .= date(DATE_RFC2822) . " Table not selected \n";
	file_put_contents($LOGFILE, $current);
}
else {
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
