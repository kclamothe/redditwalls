<?php
    session_start();
    require_once '../DAO.php';
    $dao = new DAO();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['presets']['username'] = $username;

    if ($dao->isValidLogin($username, $password)){
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['user_id'] = $dao->getUserID($username);
        unset($_SESSION['presets']['username']);
        header('Location: ..');
        exit;
    }

    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "Invalid username and/or password. Please try again.";
    header('Location: .');
    exit;

?>