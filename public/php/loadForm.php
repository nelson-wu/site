<?php
session_start();
if(isset($_SESSION['user_session'])){
    readfile("/../private/submissionform.html");
}
?>
