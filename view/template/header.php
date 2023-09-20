<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Website</title>
    <link rel="stylesheet" href="view/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo-container">
                AMS
            </div>
            <div class="menu-list-container">
                <?php
                $currentUrl = isset($_GET['page']) ? $_GET['page'] : 'home';
                ?>
                <a href="?page=home" class="<?php echo ($currentUrl === 'home') ? 'active' : ''; ?>">Home</a>
                <a href="?page=anime" class="<?php echo ($currentUrl === 'anime') ? 'active' : ''; ?>">Anime</a>
                <a href="?page=manga" class="<?php echo ($currentUrl === 'manga') ? 'active' : ''; ?>">Manga</a>
                <a href="?page=collection" class="<?php echo ($currentUrl === 'collection') ? 'active' : ''; ?>">Collection</a>
            </div>
            
        </nav>
    </header>
    <script src="view/assets/js/script.js"></script>
</body>
</html>