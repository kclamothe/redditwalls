<html>
    <head>
        <title>reddit walls - favorites</title>
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    </head>
    <body>
        <header id="navbar">
            <div class="logo"><a href="."><img src="images/logo.png"></a></div>
            <nav class="menu">
                <ul>
                    <li><a id="current_page" href="favorites.php">Favorites</a></li>
                    <li><a href="login.php">Login/Register</a></li>
                </ul>
            </nav>
        </header>
        <div id="spacer"></div>
        <div id="content">
            <?php require_once "testimages.php"; ?>
        </div>
        <?php require_once "navigation.php"; ?>
        <?php require_once "footer.php"; ?>
    </body>
</html>