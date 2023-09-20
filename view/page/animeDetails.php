<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    $query = '{
        Media(id: ' . $id . ') {
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
            bannerImage
            status
            averageScore
        }
    }';

    // Replace 'Config' with the appropriate class for your GraphQL client
    $config = new config($query);

    $data = $config->getData();

    if (isset($data['errors'])) {
        echo 'GraphQL Error: ' . print_r($data['errors'], true);
    } else {
        $anime = $data['data']['Media'];
        if ($anime !== null) {
            ?>
            <section class="anime-details">
                <div class="anime-header-container" style="background-image:linear-gradient(to bottom, rgba(18, 18, 18, 0.2), rgba(18, 18, 18, .8)),url('<?php echo $anime['bannerImage']?>')">
                    <div class="title-outer-container">
                        <div class="title-inner-container">
                            <img class="poster" src="<?php echo $anime['coverImage']['large']; ?>" alt="<?php echo $anime['title']['romaji']; ?>">
                            <div class="title">
                                <h1><?php echo $anime['title']['romaji']; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-outer-container">
                    <div class="content-inner-container">
                        <div class="left">

                        </div>
                        <div class="summary">
                            <p>Description: <?php echo $anime['description']; ?></p>
                        </div>
                        <div class="more-details">
                            <p><span>Genres:</span> <?php echo implode(', ', $anime['genres']); ?></p>
                            <p><span>Episodes:</span> <?php echo $anime['episodes']; ?></p>
                            <p><span>Start Date: </span><?php echo $anime['startDate']['year'] . '-' . $anime['startDate']['month'] . '-' . $anime['startDate']['day']; ?></p>
                            <p><span>Status: </span><?php echo $anime['status']; ?></p>
                            <p><span>Average Score:</span> <?php echo $anime['averageScore']; ?></p>
                        </div>
                    </div>
                </div>
            </section>   
            <?php
        } else {
            echo 'Anime not found.';
        }
    }
}
?>
<section class="anime-outer-container top-anime">
    <div class="anime-inner-container">
        <h1 class="label">Anime Recomendation</h1>
            <div class="card-container">
            <?php
            $query = '{
                Page(page: 1, perPage: 5) {
                    media(type: ANIME, sort: TRENDING_DESC) {
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
                            <img src="<?php echo $anime['coverImage']['large'] ?>" alt="<?php echo $anime['title']['romaji'] ?>">
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