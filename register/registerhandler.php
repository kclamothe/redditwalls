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

    $_SESSION['message']=array();
    $valid = true;

    //Check if username is empty
    if($username == ""){
        array_push($_SESSION['message'] , "Username field cannot be left blank.");
        header('Location: .');
        $valid = false;
    }

    //Check if username is valid
    if (!preg_match("/^[A-Za-z0-9_]{3,20}$/",$username)){
        array_push($_SESSION['message'] , "Username can only contain letters, numbers, or _ and must be 3-20 characters.");
        $valid = false;
    }

    //Check if username is available (only check if username entered was valid)
    if ($valid && $dao->isUser($username)){
        array_push($_SESSION['message'] , "The username '".$username."' is not available.");
        $valid = false;
    }

    //Check valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($_SESSION['message'] , "Email must be a valid email address.");
        $valid = false;
    }

    //Check if password is empty
    if($password == "" || $passwordconfirm == ""){
        array_push($_SESSION['message'] , "Password fields cannot be left blank.");
        header('Location: .');
        $valid = false;
    }

    //Check if passwords match
    if ($password != $passwordconfirm){
        array_push($_SESSION['message'] , "Passwords did not match.");
        $valid = false;
    }

    //if not valid, exit and notify user of errors
    if(!$valid){
        header('Location: .');
        exit;
    }

    //If all information entered was valid, create the user
    $dao->createUser($username, $email, $password);
    unset($_SESSION['presets']['email']);
    header('Location: ../login');
    exit;

?>