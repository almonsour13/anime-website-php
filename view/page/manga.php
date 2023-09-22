<section class="anime-outer-container top-anime">
    <div class="anime-inner-container">
        <h1 class="label">Manga</h1>
            <div class="card-container">
            <?php
            $query = '{
                Page(page: 1, perPage: 60) {
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

            if (isset($data['errors'])) {
                echo 'GraphQL Error: ' . print_r($data['errors'], true);
            } else {
                foreach ($data['data']['Page']['media'] as $anime) {
                    ?>
                    <a href="?page=animeDetails&id=<?php echo $anime['id'] ?>">
                        <div class="card">
                            <div class="poster">
                            <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo $anime['title']['romaji'] ?>">
                            </div>
                            <div class="card-description">
                                <div class="title">
                                    <?php
                                    // Display English title if available, otherwise display native title
                                    echo !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['native'];
                                    ?>
                                </div>
                                <p class="year"><?php echo $anime['startDate']['year'] ?></p>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
            </div>
        </div>
    </div>
</section>