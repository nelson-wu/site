<?php
    class Article{
        public $title;
        public $date;
        public $content;
        public $id;

        function update(){
            require_once('Database.php');
            $db = new Database();
            $this->title = $db->escape($this->title);
            $this->date = $db->escape($this->date);
            $this->content = $db->escape($this->content);
            $this->id = $db->escape($this->id);

            // Do we have an existing article
            if (isset($id)){
                $query = "UPDATE `sitedata` SET" .
                    " `title`=" . $this->title .
                    " `content`=" . $this->content .
                    " WHERE id=" . $this->id;
                $result = $db->query($query);
                return $result;
            } else {
                $query = "INSERT INTO `articles` (`title`, `content`) VALUES(" .
                    $this->title . ", " .
                    $this->content . ")";
                $result = $db->query($query);
                return $result;
            }
        }
    }
?>
