<?php
class Database{
    protected static $connection;
    protected $logfile;

    public function connect() {
        $config = require_once('config.php');

        if(!isset(self::$connection)) {
            self::$connection = new mysqli($config['MYSQL_HOST'], $config['MYSQL_USERNAME'], $config['MYSQL_PASSWORD'], $config['MYSQL_DB']);
        }

        if(self::$connection === false) {
            error_log(self::$connection->error);
        }
        return self::$connection;
    }

    public function query($query) {
        $connection = $this->connect();
        $result = $connection->query($query);
        if($result === false){
            error_log(self::$connection->error);
        }
        return result;
    }

    public function select($query){
        $rows = array();
        $result =  $this->query($query);
        if($result === false) {
            return false;
        }
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function escape($value) {
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }
}
?>
