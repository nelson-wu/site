<?php
require_once('/../php/Database.php');
session_start();
$db = new Database();
$username = $db->sanitize($_POST['username']);
$password = $db->sanitize($_POST['password']);
$query = "SELECT * FROM `users` WHERE `username`=" . $username;
$results = $db->select($query);
$row = $results[0];

if(password_verify($password, $row['password'])){
    $_SESSION['user_session'] = $row['id'];
    echo json_encode(array("text" => "success"));
} else {
    echo json_encode(array("text" => "mismatch"));
}
?>
