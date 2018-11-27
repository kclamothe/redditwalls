<?php
    session_start();
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: .');
        exit;
    }
    $logged_in = $_SESSION['logged_in'];
    //$user = $_SESSION['user'];
    $user = $_SESSION['user_id'];
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    //debug
    //echo '<script>console.log("page number: '.$page.'")</script>';
    //echo '<script>console.log("logged in: '.$logged_in.'")</script>';
?>
<html>
    <head>
        <title>reddit walls - favorites</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="javascript/favorites.js"></script>
    </head>
    <body>
        <header id="navbar">
            <div class="logo"><a href="."><img src="images/logo.png"></a></div>
            <nav class="menu">
                <ul>
                    <?php
                    if($logged_in){
                        echo '<li><a id="current_page" href="favorites.php">Favorites</a></li>';
                        echo '<li><a href="login/logout.php">Log out</a></li>';
                    }else{
                        echo '<li><a href="login">Log in/Register</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <div id="spacer"></div>
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