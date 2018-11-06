<?php
    session_start();
    require_once 'DAO.php';
    $dao = new DAO();
?>

<div class="image_column">

    <?php
    $wallpapers = $dao->getWallpapers($page);
    $rowCount = 0;
    foreach ($wallpapers as $wallpaper) {
        if ($rowCount%2==0){
            echo "<div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\" target=\"_blank\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\" target=\"_blank\">". $wallpaper['title'] ."</a>
                            <div class=\"fav\">";
                                echo"<a href='favoritehandler.php?wallpaper=".$wallpaper['id']."'/>Favorite</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        $rowCount+=1;
    }
    ?>

</div>

<div class="image_column">

    <?php
    $wallpapers = $dao->getWallpapers($page);
    $rowCount = 0;
    foreach ($wallpapers as $wallpaper) {
        if ($rowCount%2==1){
            echo "<div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\" target=\"_blank\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\" target=\"_blank\">". $wallpaper['title'] ."</a>
                            <div class=\"fav\">";
                                echo"<a href='favoritehandler.php?wallpaper=".$wallpaper['id']."'/>Favorite</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        $rowCount+=1;
    }
    ?>

</div>