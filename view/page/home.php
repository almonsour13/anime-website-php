<section class="anime-outer-container top-anime">
<?php

    $queryAnime = '{
        Page{
            anime: media(type: ANIME, sort: TRENDING_DESC) {
                id
                title {
                    romaji
                    english
                    native
                }
                description
                genres
                episodes
                startDate {
                    year
                    month
                    day
                }
                coverImage {
                    large
                }
                status
                averageScore
            }
        }
    }';

    $config = new config($queryAnime); 
    $animedata = $config->getData();
    if (isset($animedata['data'])) {
        $anime = $animedata['data']['Page']['anime'];
        echo '<div class="anime-inner-container">'; 
            echo "<h1 class='label'>Top Anime</h1>";
            echo '<div class="card-container">';
                foreach ($anime as $anime) {
                    ?>
                    <a href="?page=animeDetails&id=<?php echo $anime['id'] ?>">
                        <div class="card">
                            <div class="poster">
                                <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['native'] ?>">
                            </div>
                            <div class="card-description">
                                <div class="title">
                                    <?php
                                     echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['native'];
                                    ?>
                                </div>
                                <p class="year"><?php echo isset($anime['startDate']['year']) ? $anime['startDate']['year'] : 'Year not available'; ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            echo '</div>';
            echo '<div class="pagination-container" id="pagination-container"></div>';
        echo '</div>';
    }

    $queryManga = '{
        Page{
            manga: media(type: MANGA, sort: TRENDING_DESC) {
                id
                title {
                    romaji
                    english
                    native
                }
                description
                genres
                chapters
                startDate {
                    year
                    month
                    day
                }
                coverImage {
                    large
                }
                status
                averageScore
            }
        }
    }';
    $configs = new config($queryManga); 
            
    $mangeData = $configs->getData();
    if (isset($mangeData['data'])) {
        $manga = $mangeData['data']['Page']['manga'];
        echo '<div class="anime-inner-container">'; 
        echo "<h1 class='label'>Top Manga</h1>";
            echo '<div class="card-container">';
                foreach ($manga as $anime) {
                    ?>
                    <a href="?page=animeDetails&id=<?php echo $anime['id'] ?>">
                        <div class="card">
                            <div class="poster">
                                <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['native'] ?>">
                            </div>
                            <div class="card-description">
                                <div class="title">
                                    <?php
                                    echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['native'];
                                    ?>
                                </div>
                                <p class="year"><?php echo isset($anime['startDate']['year']) ? $anime['startDate']['year'] : 'Year not available'; ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            echo '</div>';
            echo '<div class="pagination-container" id="pagination-container"></div>';
        echo '</div>';
    }else{
        echo "<div class='no-internet'>No Internet</div>";
    }
?>
</section>