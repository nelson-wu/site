<?php
require_once("/../../php/connection.php");
require_once("/../../php/Article.php");
$database = new Database();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $database->escape($database->sanitize($_POST['title']));
    $content = $database->escape($database->sanitize($_POST['content']));
    $article = new Article();
    $article->title = $title;
    $article->content = $content;
    $article->update();
}
?>

