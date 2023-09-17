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
                            <p>Genres: <?php echo implode(', ', $anime['genres']); ?></p>
                            <p>Episodes: <?php echo $anime['episodes']; ?></p>
                            <p>Start Date: <?php echo $anime['startDate']['year'] . '-' . $anime['startDate']['month'] . '-' . $anime['startDate']['day']; ?></p>
                            <p>Status: <?php echo $anime['status']; ?></p>
                            <p>Average Score: <?php echo $anime['averageScore']; ?></p>
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