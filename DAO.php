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

    //Checks if the username belongs to a current user
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

    //Gets a user's id
    public function getUserID($username){
        $conn = $this->getConnection();
        $saveQuery = "SELECT id, username FROM user WHERE username=:username";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->execute();
        $result = $q->fetch();
        return $result["id"];
    }

    //Creates a user
    public function createUser($username, $email, $password){
        $conn = $this->getConnection();
        $saveQuery = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->execute();
    }

    //Gets wallpapers
    public function getWallpapers($page) {
        $conn = $this->getConnection();
        $first = $page*10 - 10;
        //$saveQuery = "SELECT id, title, reddit_link, image_link, date FROM wallpaper ORDER BY date desc LIMIT :first,:last";
        $saveQuery = "SELECT id, title, reddit_link, image_link, date FROM wallpaper ORDER BY date desc LIMIT ".$first.",".$this->limit;
        $q = $conn->prepare($saveQuery);
        // $q->bindParam(":first", $first);
        // $q->bindParam(":last", $this->limit);
        $q->execute();
        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //Gets a user's favorites
    public function getFavorites ($page, $user) {
        $conn = $this->getConnection();
        $first = $page*10 - 10;
        // $saveQuery = 
        //     "SELECT wallpaper.id, wallpaper.title, wallpaper.reddit_link, wallpaper.image_link, user.id, favorites.user_id, favorites.wallpaper_id
        //      FROM wallpaper 
        //      JOIN favorites on wallpaper.id = favorites.wallpaper_id
        //      JOIN user on user.id = favorites.user_id 
        //      WHERE user.username = :user
        //      LIMIT ".$first.",".$this->limit;
        $saveQuery = 
            "SELECT wallpaper.id, wallpaper.title, wallpaper.reddit_link, wallpaper.image_link, favorites.user_id, favorites.wallpaper_id
             FROM wallpaper 
             JOIN favorites on wallpaper.id = favorites.wallpaper_id
             WHERE favorites.user_id = :user
             LIMIT ".$first.",".$this->limit;
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user", $user);
        $q->execute();
        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Checks if there are more wallpapers to load
    public function moreWallpapers ($page) {
        $conn = $this->getConnection();
        $start = ($page+1)*10 - 10;
        //$result = $conn->query("select id, date from wallpaper order by date desc limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
        $saveQuery = "SELECT id, date FROM wallpaper ORDER BY date desc LIMIT ".$start.",".$this->limit;
        //$result = $q->fetchAll(PDO::FETCH_ASSOC);
        $q = $conn->prepare($saveQuery);
        $q->execute();
        $count = $q->rowCount();
        if($count > 0){
            return true;
        }
        return false;
    }

    //Checks if there are more favorites
    public function moreFavorites ($page, $user) {
        // $conn = $this->getConnection();
        // $start = ($page+1)*10 - 10;
        // $result = $conn->query("select wallpaper.id, user.id, favorites.user_id, favorites.wallpaper_id 
        //     from wallpaper 
        //     join favorites on wallpaper.id = favorites.wallpaper_id
        //     join user on user.id = favorites.user_id
        //     where user.username = '".$user."' limit ".$start.",".$this->limit, PDO::FETCH_ASSOC);
        // // echo '<script>console.log("morefave result: '.$result->fetchColumn().'")</script>';
        // if($result->fetchColumn() > 0){
        //     return true;
        // }
        // return false;
        $conn = $this->getConnection();
        $first = ($page+1)*10 - 10;
        $saveQuery = 
            "SELECT favorites.wallpaper_id, favorites.user_id
            FROM favorites
            WHERE favorites.user_id = :user
            LIMIT ".$first.",".$this->limit;
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user", $user);
        $q->execute();
        $count = $q->rowCount();
        if($count > 0){
            return true;
        }
        return false;
    }

    //Saves a wallpaper as a favorite
    public function favorite($user, $wallpaper){
        if($this->isFavorite($wallpaper, $user)){
            return;
        }
        $conn = $this->getConnection();
        $saveQuery = "INSERT INTO favorites (user_id, wallpaper_id) VALUES (:user_id, :wallpaper_id)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user_id", $user);
        $q->bindParam(":wallpaper_id", $wallpaper);
        $q->execute();
    }

    public function unfavorite($user, $wallpaper) {
        $conn = $this->getConnection();
        $saveQuery = "DELETE FROM favorites WHERE user_id = :user and wallpaper_id = :wallpaper";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user", $user);
        $q->bindParam(":wallpaper", $wallpaper);
        $q->execute();
      }

    //Checks if a wallpaper is a favorite of a user
    public function isFavorite ($wall, $user) {
        $conn = $this->getConnection();
        // $result = $conn->query("select wallpaper.id, user.id, favorites.user_id, favorites.wallpaper_id 
        //     from wallpaper 
        //     join favorites on wallpaper.id = favorites.wallpaper_id
        //     join user on user.id = favorites.user_id
        //     where user.username = '".$user."' and favorites.wallpaper_id = ".$wall, PDO::FETCH_ASSOC);
        $conn = $this->getConnection();
        $saveQuery = "SELECT user_id, wallpaper_id FROM favorites WHERE user_id=:user and wallpaper_id=:wall";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":user", $user);
        $q->bindParam(":wall", $wall);
        $q->execute();
        $count = $q->rowCount();
        if($count > 0){
            return true;
        }
        return false;

        // if($result->fetchColumn() > 0){
        //     return true;
        // }
        // return false;
    
    }

}
?>