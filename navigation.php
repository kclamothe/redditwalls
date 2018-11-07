<?php
    session_start();
    //$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    require_once 'DAO.php';
    $dao = new DAO();
?>
<div id="navigation">
    <?php 
    if ($page > 1) {
        echo '<a href="?page='. ($page - 1) .'" class="navbutton">< Previous</a>';
    } 
    if ($dao->moreWallpapers($page)){
        echo '<a href="?page='. ($page + 1) .'" class="navbutton">Next ></a>';
    }
    ?>

</div>