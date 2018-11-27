<?php
    session_start();
    require_once 'DAO.php';
    $dao = new DAO();
    $wallpaper = $_GET['wallpaper'];
    $user = $_SESSION['user_id'];
    $dao->unfavorite($user, $wallpaper);
    //header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;

?>