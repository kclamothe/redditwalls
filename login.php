<html>
    <head>
        <link href="login.css" type="text/css" rel="stylesheet" />
    </head>
<?php
//TODO: make into a modal instead of a new page
?>
<div class="modal_fade" id="login_modal">
    <div class="modal_dialog">
        <div class="loginmodal_container">
            <h1>Login</h1><br>
            <form action="index.php">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" class="loginmodal_submit" value="Login">
            <input type="submit" name="cancel" class="loginmodal_submit" value="Cancel">
            </form>
            
            <div class="login_help">
            <a href="#">Register</a>
            </div>
        </div>
    </div>
</div>

</html> 