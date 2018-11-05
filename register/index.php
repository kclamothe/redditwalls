<?php
    session_start();

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
            <form action="..">
            <input type="text" name="user" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="passconfirm" placeholder="Confirm Password">
            <input type="submit" name="register" class="registermodal_submit" value="Register">
            <input type="submit" name="cancel" class="registermodal_submit" id="cancel" value="Cancel">
            </form>
            </div>
        </div>
    </div>
</div>

</html> 