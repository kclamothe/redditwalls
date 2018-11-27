<?php
    session_start();
    require_once 'DAO.php';
    $dao = new DAO();
?>

<div class="image_column">

    <?php
    $wallpapers = $dao->getFavorites($page, $user);
    $rowCount = 0;
    foreach ($wallpapers as $wallpaper) {
        if ($rowCount%2==0){
            echo "<div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\" target=\"_blank\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\" target=\"_blank\">". htmlentities(utf8_encode($wallpaper['title'])) ."</a>
                            <div class=\"fav\">";
                                echo"<a class=\"favbutton\" href='unfavoritehandler.php?wallpaper=".$wallpaper['wallpaper_id']."'/>Unfavorite</a>
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
    $wallpapers = $dao->getFavorites($page, $user);
    $rowCount = 0;
    foreach ($wallpapers as $wallpaper) {
        if ($rowCount%2==1){
            echo "<div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\" target=\"_blank\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\" target=\"_blank\">". htmlentities(utf8_encode($wallpaper['title'])) ."</a>
                            <div class=\"fav\">";
                                echo"<a class=\"favbutton\" href='unfavoritehandler.php?wallpaper=".$wallpaper['wallpaper_id']."'/>Unfavorite</a>
                            </div>
                        </div>
                    </div>
                </div>"; 
        }
        $rowCount+=1;
    }
    ?>

</div>