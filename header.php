<?php
    session_start();
?>
<header id="navbar">
    <div class="logo"><a href="."><img src="images/logo.png"></a></div>
    <nav class="menu">
        <ul>
            <?php
            if($logged_in){
                echo '<li><a href="favorites.php">Favorites</a></li>';
                echo '<li><a href="#">Logout</a></li>';
            }else{
                echo '<li><a href="login">Login/Register</a></li>';
            }
            ?>
            <!-- <li><a href="favorites.php">Favorites</a></li> -->
            <!-- <li><a href="login">Login/Register</a></li> -->
        </ul>
    </nav>
</header>
<div id="spacer"></div>