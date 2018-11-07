<?php
    session_start();
    $logged_in = $_SESSION['logged_in'];
    if(!$logged_in){
        $_SESSION['message'] = "Please log in to favorite wallpapers.";
        header("Location: login");
        exit;
    }
    require_once 'DAO.php';
    $dao = new DAO();
    $wallpaper = $_GET['wallpaper'];
    $user = $_SESSION['user_id'];
    $dao->favorite($user, $wallpaper);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;

?>