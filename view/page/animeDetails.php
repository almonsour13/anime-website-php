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

    if (isset($data['data'])) {
        $anime = $data['data']['Media'];
        if ($anime !== null) {
            ?>
            <section class="anime-details">
                <div class="anime-header-container" style="background-image:linear-gradient(to bottom, rgba(18, 18, 18, 0.2), rgba(18, 18, 18, .8)),url('<?php echo !empty($anime['bannerImage'])?$anime['bannerImage']:'view/assets/img/background.jpg'?>')">
                    <div class="title-outer-container">
                        <div class="title-inner-container">
                            <img class="poster" src="<?php echo $anime['coverImage']['large']; ?>" alt="<?php echo $anime['title']['romaji']; ?>">
                        </div>
                    </div>
                </div>
                <div class="content-outer-container">
                    <div class="content-inner-container">
                        <div class="left">

                        </div>
                        <div class="summary">
                            <div class="title">
                                <h1><?php echo $anime['title']['romaji']; ?></h1>
                            </div>
                            <p><?php echo $anime['description']; ?></p>
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
            <section>

            </section>
            <?php
        } else {
            echo 'Anime not found.';
        }
    }
    
    $reviewQuery = '{
        Page {
          reviews(mediaId:' . $id . ') {
            id
            summary
            rating
            ratingAmount
            createdAt
            updatedAt
            user {
              id
              name
              avatar {
                large
              }
            }
          }
        }
      }';
      
      // Assuming you have a GraphQL client or library for PHP
      // You should create a configuration for your client with the query
      $config = new config($reviewQuery);
      
      // Execute the query and fetch the data
      $reviewData =  $config->getData();;
      
      if (isset($reviewData['data'])) {
        ?>
        <section class="anime-review-outer">
          <div class="anime-review-inner">
            <div class="label-review">Anime Reviews</div>
                <div class="review-card-container">
                <?php
                foreach ($reviewData['data']['Page']['reviews'] as $review) {
            //     echo "Review ID: " . $review['id'] . "<br>";
            //      echo "Summary: " . $review['summary'] . "<br>";
            //     echo "Rating: " . $review['rating'] . "<br>";
            //      echo "Rating Amount: " . $review['ratingAmount'] . "<br>";
            //      echo "Created At: " . $review['createdAt'] . "<br>";
            //     echo "Updated At: " . $review['updatedAt'] . "<br>";
            //     echo "User ID: " . $review['user']['id'] . "<br>";
            //       echo "User Name: " . $review['user']['name'] . "<br>";
            //   echo "User Avatar URL (Large): " . $review['user']['avatar']['large'] . "<br>";
            //   echo "<br>";
                    ?> 
                    <div class="review-card">
                        <div class="user-profile">
                            <img src="<?php echo $review['user']['avatar']['large']?>" alt="<?php echo $review['user']['avatar']['large']?>">        
                        </div>
                        <div class="review-description">
                            <div class="user-name"><?php echo $review['user']['name']?></div>
                            <div class="review">
                                <?php echo $review['summary']?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
            </div>
          </div>
        </section>
        <?php
      }else{

      }
      
}
?>