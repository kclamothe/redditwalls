<?php
    session_start();
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    //$_SESSION['page'] = $page;
    $logged_in = $_SESSION['logged_in'];
    //debug
    //echo '<script>console.log("page number: '.$page.'")</script>';
    //echo '<script>console.log("logged in: '.$logged_in.'")</script>';

?>
<html>
    <head>
        <title>reddit walls</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="javascript/redditwalls.js"></script>
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <div id="content">
            <?php require_once "wallpapers.php";
            ?>
        </div>

        <?php //require_once "navigation.php"; ?>
        <div id="navigation">
            <?php 
            if ($page > 1) {
                echo '<a href="?page='. ($page - 1) .'" class="navbutton">< Previous</a>';
            } 
            if ($dao->moreWallpapers($page)){
                echo '<a href="?page='. ($page + 1) .'" class="navbutton">Next ></a>';
            }
            ?>
        </div>

        <?php require_once "footer.php"; ?>
    </body>
</html>