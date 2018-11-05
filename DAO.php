<?php
session_start();

class Dao {
    private $host = "us-cdbr-iron-east-01.cleardb.net";
    private $db = "heroku_a9d8c3a5ddb125b";
    private $user = "b28f51fa4923ce";
    private $pass = "3cd476c7";
    private $limit = 10;

    public function getConnection () {
        $conn= new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        return $conn;
    }

    public function getWallpapers ($page) {
        $conn = $this->getConnection();
        $start = $page*10 - 10;
        return $conn->query("select id, title, reddit_link, image_link, date from wallpaper order by date desc limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
    }

    public function moreWallpapers ($page) {
        $conn = $this->getConnection();
        $start = ($page+1)*10 - 10;
        $result = $conn->query("select id, date from wallpaper order by date desc limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
        echo '<script>console.log("morewp result: '.$result->fetchColumn().'")</script>';
        if($result->fetchColumn() > 0){
            return true;
        }
        return false;
    
    }

}
?>