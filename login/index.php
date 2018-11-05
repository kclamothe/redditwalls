<?php
    session_start();

?>
<html>
    <head>
        <link href="login.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    </head>
<?php
//TODO: make into a modal instead of a new page
?>
<div class="modal_fade" id="login_modal">
    <div class="modal_dialog">
        <div class="loginmodal_container">
            <div class="logo"><img src="../images/loginlogo.png"></div>
            <form action="..">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" class="loginmodal_submit" value="Login">
            <!-- <a href=".." class="loginmodal_submit" id="cancel">Cancel</a> -->
            <input type="submit" name="cancel" class="loginmodal_submit" id="cancel" value="Cancel">
            </form>
            
            <div class="login_help">
            Don't have an account? <a href="../register">Click here to register.</a>
            </div>
        </div>
    </div>
</div>

</html> 