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
            <div class="search-container">
                <form action="?page=search" method="post" id="search-form">
                    <button type="submit">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="121.702px" height="122.881px" viewBox="0 0 121.702 122.881" enable-background="new 0 0 121.702 122.881" xml:space="preserve"><g><path d="M53.617,0c14.806,0,28.21,6.001,37.913,15.705c9.703,9.703,15.704,23.107,15.704,37.913 c0,10.832-3.213,20.914-8.737,29.346l23.205,25.291l-16.001,14.627L83.322,98.258c-8.503,5.67-18.718,8.977-29.705,8.977 c-14.806,0-28.21-6.002-37.913-15.705C6.001,81.826,0,68.422,0,53.617c0-14.806,6.001-28.21,15.704-37.913 C25.407,6.001,38.812,0,53.617,0L53.617,0z M87.3,19.934c-8.619-8.62-20.528-13.951-33.683-13.951s-25.063,5.332-33.683,13.951 c-8.62,8.62-13.952,20.529-13.952,33.683s5.332,25.063,13.952,33.682c8.62,8.621,20.528,13.951,33.683,13.951 S78.681,95.92,87.3,87.299c8.62-8.619,13.951-20.527,13.951-33.682S95.92,28.554,87.3,19.934L87.3,19.934z"/></g></svg>
                    </button>
                    <input type="text" name="search-value" id="search-value" placeholder="Search here">   
                </form>
                <span id="clear-button" onclick="clearInput()">&#10005</span>
            </div>

            <div class="menu-list-container">
                <?php
                $currentUrl = isset($_GET['page']) ? $_GET['page'] : 'home';
                ?>
                <a href="?page=home" class="<?php echo ($currentUrl === 'home') ? 'active' : ''; ?>">Home</a>
                <a href="?page=anime" class="<?php echo ($currentUrl === 'anime') ? 'active' : ''; ?>">Anime</a>
                <a href="?page=manga" class="<?php echo ($currentUrl === 'manga') ? 'active' : ''; ?>">Manga</a>
            </div>
            
        </nav>
    </header>
    <script src="view/assets/js/script.js"></script>
    <script src="view/assets/js/pagination.js"></script>
</body>
</html>