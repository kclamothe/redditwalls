<?php
    session_start();
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    unset($_SESSION['message']);
?>
<html>
    <head>
        <title>reddit walls - login</title>
        <link href="login.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    </head>

<div id="login">
    <div class="dialog">
        <div class="login_container">
            <div class="logo"><img src="../images/loginlogo.png"></div>

            <?php if(!empty($message)) { ?>
                <div id="message"><?php echo $message; ?></div>
            <?php } ?>

            <form method="post" action="loginhandler.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" maxlength="20" value="<?php echo isset($_SESSION['presets']['username']) ? $_SESSION['presets']['username'] : ''; ?>">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" maxlength="64">
            
            <div class="flexbox">
                <a href=".." class="login_submit" id="cancel">Cancel</a>
                <input type="submit" name="login" class="login_submit" value="Login">
            </div>
            </form>
            
            <div class="login_help">
            Don't have an account? <a href="../register">Click here to register.</a>
            </div>
        </div>
    </div>
</div>

</html> 