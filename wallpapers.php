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
            echo "
                <div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\">". $wallpaper['title'] ."</a>
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
            echo "
                <div class=\"container\">
                    <a href=\"" . $wallpaper['image_link'] . "\"><img src=\"" . $wallpaper['image_link'] . "\"></a>
                    <div class=\"info\">
                        <div class=\"title\">
                            <a href=\"". $wallpaper['reddit_link'] ."\">". $wallpaper['title'] ."</a>
                        </div>
                    </div>
                </div>";
        }
        $rowCount+=1;
    }
    ?>

</div>