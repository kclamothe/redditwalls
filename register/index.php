<?php
    session_start();
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    unset($_SESSION['message']);
?>
<html>
    <head>
        <title>reddit walls - register</title>
        <link href="register.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="../images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    </head>
<?php
//TODO: make into a modal instead of a new page
?>
<div class="modal_fade" id="register_modal">
    <div class="modal_dialog">
        <div class="registermodal_container">
            <div class="logo"><img src="../images/registerlogo.png"></div>

            <?php if(!empty($message)) { ?>
                <div id="message"><?php echo $message; ?></div>
            <?php } ?>

            <form method="post" action="registerhandler.php">
            <input type="text" name="username" placeholder="Username" maxlength="20" value="<?php echo isset($_SESSION['presets']['username']) ? $_SESSION['presets']['username'] : ''; ?>">
            <input type="text" name="email" placeholder="Email" maxlength="256" value="<?php echo isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : ''; ?>">
            <input type="password" name="password" placeholder="Password" maxlength="64">
            <input type="password" name="passwordconfirm" placeholder="Confirm Password" maxlength="64">
            <input type="submit" name="register" class="registermodal_submit" value="Register">
            <a href=".." class="registermodal_submit" id="cancel">Cancel</a>
            </form>

            <div class="register_help">
            Already have an account? <a href="../login">Click here to log in.</a>
            </div>
            </div>
        </div>
    </div>
</div>

</html> 