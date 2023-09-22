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
               <a  href="?page=home">AMS</a>
            </div>
            <div class="search-container" >
                    <a href="?page=search&search=">
                       <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </a>
                    <input type="text" name="search-value" placeholder="Search here"  onchange="searchInput(event)">
                    <span onclick="removeInputValue(this)"> &#10005</span>
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