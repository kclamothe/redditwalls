<?php
    session_start();
    $wallpaper = $_GET['wallpaper'];
    echo '<script>console.log("wp: '.$wallpaper.'")</script>';

    header("Location: .");
    exit;

?>