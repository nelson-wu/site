<?php
// Load the Database class
require_once('../php/Database.php');
$database = new Database();
if(isset($_GET["table"])){
    $table = $_GET["table"];
    $rows = $database->select("SELECT * FROM $table");
    echo json_encode($rows);
} else {
    error_log("No table selected");
}
?>
