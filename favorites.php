<?php
    session_start();
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: .');
        exit;
    }
    $logged_in = $_SESSION['logged_in'];
    $user = $_SESSION['user'];
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    //debug
    echo '<script>console.log("page number: '.$page.'")</script>';
    echo '<script>console.log("logged in: '.$logged_in.'")</script>';
    echo '<script>console.log("user: '.$user.'")</script>';
?>
<html>
    <head>
        <title>reddit walls - favorites</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <div id="content">
            <?php require_once "favoritewallpapers.php"; ?>
        </div>
        <div id="navigation">
            <?php 
            if ($page > 1) {
                echo '<a href="?page='. ($page - 1) .'" class="navbutton">< Previous</a>';
            } 
            if ($dao->moreFavorites($page, $user)){
                echo '<a href="?page='. ($page + 1) .'" class="navbutton">Next ></a>';
            }
            ?>
        </div>
        <?php require_once "footer.php"; ?>
    </body>
</html>