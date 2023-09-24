<section class="anime-outer-container search-anime">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["search-value"])) {
                $searchValue = $_POST["search-value"];
        
                $query = '{
                    AnimeSearch:Page{
                        media(search: "' . $searchValue . '", type: ANIME) {
                            id
                            title {
                                userPreferred
                            }
                            coverImage {
                                large
                            }
                            startDate {
                                year
                                month
                                day
                            }
                        }
                    }
                    MangaSearch:Page{
                        media(search: "' . $searchValue . '", type: MANGA) {
                            id
                            title {
                                userPreferred
                            }
                            coverImage {
                                large
                            }
                            startDate {
                                year
                                month
                                day
                            }
                        }
                    }
                }';
                $config = new config($query); 
                $data = $config->getData();
                if (isset($data['data'])) {
                    echo '<div class="anime-inner-container"><h1 class="label result">Search: ' . $searchValue . '</h1><div>'; 
                    $animeSearchResults = $data['data']['AnimeSearch']['media'];
                    echo '<div class="anime-inner-container">'; 
                        echo "<h1 class='label'>Anime Result</h1>";
                        echo '<div class="card-container">';
                            foreach ($animeSearchResults as $anime) {
                                ?>
                                <a href="?page=animeDetails&id=<?php echo $anime['id'] ?>">
                                    <div class="card">
                                        <div class="poster">
                                            <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo $anime['title']['userPreferred'] ?>">
                                        </div>
                                        <div class="card-description">
                                            <div class="title">
                                                <?php
                                                echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['userPreferred'];
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

                    $mangaSearchResults = $data['data']['MangaSearch']['media'];
                    echo '<div class="anime-inner-container">'; 
                        echo "<h1 class='label'>Manga Result</h1>";
                        echo '<div class="card-container">';
                            foreach ($mangaSearchResults as $anime) {
                                ?>
                                <a href="?page=animeDetails&id=<?php echo $anime['id'] ?>">
                                    <div class="card">
                                        <div class="poster">
                                            <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo $anime['title']['userPreferred'] ?>">
                                        </div>
                                        <div class="card-description">
                                            <div class="title">
                                                <?php
                                                echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['userPreferred'];
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

                } else {
                    echo "<div class='no-internet'>No Internet</div>";
                }
            } else {
                echo "Search Value not set in POST data.";
            }
        }
    ?>
    </div>
</section>
