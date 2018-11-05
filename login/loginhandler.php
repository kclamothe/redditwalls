<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'kclamothe' && $password == '123456') {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $username;
        header('Location: ..');
        exit;
    }

    $_SESSION['logged_in'] = false;
    $_SESSION['message'] = "Username or password invalid";
    header('Location: .');
    exit;

?>