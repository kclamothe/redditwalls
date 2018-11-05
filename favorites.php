<?php
    session_start();
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: .');
        exit;
    }
    $logged_in = $_SESSION['logged_in'];
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
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
            <?php require_once "testimages.php"; ?>
        </div>
        <?php require_once "navigation.php"; ?>
        <?php require_once "footer.php"; ?>
    </body>
</html>