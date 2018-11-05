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
<?php
//TODO: make into a modal instead of a new page
?>
<div class="modal_fade" id="login_modal">
    <div class="modal_dialog">
        <div class="loginmodal_container">
            <div class="logo"><img src="../images/loginlogo.png"></div>

            <?php if(!empty($message)) { ?>
                <div class="message"><?php echo $message; ?></div>
            <?php } ?>

            <form method="post" action="loginhandler.php">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" name="login" class="loginmodal_submit" value="Login">
            <a href=".." class="loginmodal_submit" id="cancel">Cancel</a>
            <!-- <button name="cancel" class="loginmodal_submit" id="cancel" value="Cancel"> -->
            </form>
            
            <div class="login_help">
            Don't have an account? <a href="../register">Click here to register.</a>
            </div>
        </div>
    </div>
</div>

</html> 