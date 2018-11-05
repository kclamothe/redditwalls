<?php
    session_start();
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $_SESSION['page'] = $page;
    $logged_in = $_GET['logged_in'];
    //debug
    echo '<script>console.log("page number: '.$page.'")</script>';

?>
<html>
    <head>
        <title>reddit walls</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <div id="content">
            <?php require_once "wallpapers.php"; 
            //final site's images will link to full image and 
            //the title will link to reddit source
            ?>
        </div>
        <?php require_once "navigation.php"; ?>
        <?php require_once "footer.php"; ?>
    </body>
</html>