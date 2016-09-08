<?php
require_once("../php/connection.php");
$database = new Database();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $database->escape(htmlspecialchars($_POST['title']));
    $content = $database->escape(htmlspecialchars($_POST['content']));
    $titleQuery = "INSERT INTO `title-articles` (`title`) VALUES ('$title')";
    $contentQuery = "INSERT INTO `articles` (`title`, `content`) VALUES ('$title', '$content')";
    $result = $database->query($titleQuery);
    $result = $database->query($contentQuery);
}
?>

