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

    //Checks if username and password form a valid login
    public function isValidLogin($user, $pass){
        $conn = $this->getConnection();
        $saveQuery = "SELECT username, password FROM user WHERE username=:username";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $user);
        $q->execute();
        $result = $q->fetch();
        if($result["username"] === $user && $result["password"] === $pass){
            return true;
        }
        return false;
    }

    //Checks if the username is a current user
    public function isUser ($username){
        $conn = $this->getConnection();
        $saveQuery = "SELECT username FROM user WHERE username=:username";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->execute();
        $count = $q->rowCount();
        if($count > 0){
            return true;
        }
        return false;
    }

    //Gets wallpapers
    public function getWallpapers ($page) {
        $conn = $this->getConnection();
        $start = $page*10 - 10;
        return $conn->query("select id, title, reddit_link, image_link, date from wallpaper order by date desc limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
    }
    //Gets a user's favorites
    public function getFavorites ($page, $user) {
        $conn = $this->getConnection();
        $start = $page*10 - 10;
        return $conn->query("select wallpaper.id, wallpaper.title, wallpaper.reddit_link, wallpaper.image_link, user.id, favorites.user_id, favorites.wallpaper_id 
            from wallpaper 
            join favorites on wallpaper.id = favorites.wallpaper_id
            join user on user.id = favorites.user_id 
            where user.username = '".$user."' limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
    }

    //Checks if there are more wallpapers to load
    public function moreWallpapers ($page) {
        $conn = $this->getConnection();
        $start = ($page+1)*10 - 10;
        $result = $conn->query("select id, date from wallpaper order by date desc limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
        // echo '<script>console.log("morewp result: '.$result->fetchColumn().'")</script>';
        if($result->fetchColumn() > 0){
            return true;
        }
        return false;
    
    }

    //Checks if there are more favorites
    public function moreFavorites ($page, $user) {
        $conn = $this->getConnection();
        $start = ($page+1)*10 - 10;
        $result = $conn->query("select wallpaper.id, user.id, favorites.user_id, favorites.wallpaper_id 
            from wallpaper 
            join favorites on wallpaper.id = favorites.wallpaper_id
            join user on user.id = favorites.user_id
            where user.username = '".$user."' limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
        // echo '<script>console.log("morefave result: '.$result->fetchColumn().'")</script>';
        if($result->fetchColumn() > 0){
            return true;
        }
        return false;
    
    }

    //Checks if a wallpaper is a favorite of a user
    public function isFavorite ($wall, $user) {
        $conn = $this->getConnection();
        $result = $conn->query("select wallpaper.id, user.id, favorites.user_id, favorites.wallpaper_id 
            from wallpaper 
            join favorites on wallpaper.id = favorites.wallpaper_id
            join user on user.id = favorites.user_id
            where user.username = '".$user."' and favorites.wallpaper_id = ".$wall, PDO::FETCH_ASSOC);
        // echo '<script>console.log("morefave result: '.$result->fetchColumn().'")</script>';
        if($result->fetchColumn() > 0){
            return true;
        }
        return false;
    
    }

}
?>