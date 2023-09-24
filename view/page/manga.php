<section class="anime-outer-container top-anime">
<?php
    $query = '{
        Page{
            media(type: MANGA) {
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

   $config = new config($query); 

    $data = $config->getData();

    if (isset($data['data'])) {
        echo '<div class="anime-inner-container">'; 
            echo "<h1 class='label'>Manga</h1>";
            echo '<div class="card-container all-manga">';
                foreach ($data['data']['Page']['media'] as $anime) {
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
                                <p class="year"><?php echo $anime['startDate']['year'] ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            echo '</div>';
            echo '<div class="pagination-container all-anime" id="pagination-container"></div>';
        echo '</div>';
    }else{
        echo "<div class='no-internet'>No Internet</div>";
    }
?>
</section>