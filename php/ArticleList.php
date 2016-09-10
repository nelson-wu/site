<?php
class ArticleList{
    public $articles;
    public $titles;

    function readTitles(){
        require_once('Database.php');
        $db = new Database();
        $query = "SELECT `title` from `articles`";
        return $db->select($query);
    }

    function readArticles(){
        require_once('Article.php');
        require_once('Database.php');
        $db = new Database();
        $query = "SELECT * from `articles`";
        $results = $db->select($query);

        if(count($results)){
            foreach($results as $row){
                $article = new Article();
                $article->title = $row["title"];
                $article->content = $row["content"];
                $article->id = $row["id"];
                $article->date = $row["date"];
                $articles[] = $article;
            }
        }
    }
}
?>
