<?php
    session_start();
    require_once '../DAO.php';
    $dao = new DAO();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

    $_SESSION['presets']['username'] = $username;
    $_SESSION['presets']['email'] = $email;

    //echo '<script>console.log("valid user: '.$dao->isValidLogin($username, $password).'")</script>';

    //Check if fields empty
    if($username == ""){
        $_SESSION['message'] = "Username field cannot be left blank.";
        header('Location: .');
        exit;
    }

    if($password == "" || $passwordconfirm == ""){
        $_SESSION['message'] = "Password fields cannot be left blank.";
        header('Location: .');
        exit;
    }

    //Check if username is available
    if ($dao->isUser($username)){
        $_SESSION['message'] = "The username '".$username."' is not available.";
        header('Location: .');
        exit;
    }

    //Check if username is valid
    if (!preg_match("/^[A-Za-z0-9_]{3,20}$/",$username)){
        $_SESSION['message'] = "Username can only contain letters, numbers, or _ and must be 3-20 characters.";
        header('Location: .');
        exit;
    }

    //Check valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Please enter a valid email address.";
        header('Location: .');
        exit;
    }

    //Check if passwords match
    if ($password != $passwordconfirm){
        $_SESSION['message'] = "Passwords do not match.";
        header('Location: .');
        exit;
    }

    //Check if password is valid
    if (!preg_match("/^[A-Za-z0-9_\-!@#$%^&*.]{6,64}$/",$password)){
        $_SESSION['message'] = "Password can only contain letters, numbers, or _.-!@#$%^&* and must be 6-64 characters.";
        header('Location: .');
        exit;
    }

    //Create user
    $dao->createUser($username, $email, $password);
    unset($_SESSION['presets']['email']);
    unset($_SESSION['presets']['username']);
    header('Location: ../login');
    exit;

?>