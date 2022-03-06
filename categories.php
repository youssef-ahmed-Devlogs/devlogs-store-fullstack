<?php

ob_start();
session_start();

$pageTitle = "Categories";
include './init.php';


$categoryid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

if ($categoryid > 0) {

  $stmt = $conn->prepare("SELECT                           
                            ads.*,
                            ads.id AS ad_id,
                            users.country,
                            categories.title AS category_title
                          FROM ads
                          JOIN categories ON categories.id = ads.category_id
                          JOIN users ON users.id = ads.user_id
                          WHERE ads.publish_state = 'published'
                          AND categories.id = ?
                          OR parent = ?
                          ORDER BY ads.id DESC
                        ");

  $stmt->execute([$categoryid, $categoryid]);
  $ads = $stmt->fetchAll();

  if ($stmt->rowCount() > 0) {
?>



    <main class="categories-page section">
      <div class="container">

        <h1 class="section__head-xl mb-5"><?php echo $ads[0]['category_title'] ?></h1>

        <div class="box_style_content">
          <div class="row">
            <?php foreach ($ads as $ad) { ?>

              <div class="col-xl-3 col-lg-4 mb-4">
                <div class="product card__product">
                  <?php
                  if (isset($_SESSION['username'])) {

                    $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
                    $stmt->execute([$ad['ad_id'], $_SESSION['id']]);
                    $inFav = $stmt->rowCount();

                  ?>
                    <a href="favourite.php?action=add&adid=<?php echo $ad['ad_id'] ?>" class="add__to__fav <?php echo $inFav == 1 ? 'active' : '' ?>">
                      <i class="fas fa-star"></i>
                    </a>
                  <?php } else { ?>
                    <a href="login.php" class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </a>
                  <?php
                  }
                  ?>
                    <!-- Image -->
                    <?php if(!empty($ad['image'])) { ?>
                        <img class="product__img" src="./uploads/ads/<?php echo $ad['image'] ?>" alt="product" />
                    <?php } else { ?>
                        <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                    <?php }?>
                  <a href="showAd.php?id=<?php echo $ad['ad_id'] ?>" class="product__info">
                    <div class="main__info">
                      <div class="title__category">
                        <span class="title">
                          <?php echo strlen($ad['title']) > 15 ? substr($ad['title'], 0, 15) . '...' : $ad['title'] ?>
                        </span>
                        <span class="category">
                          <?php echo $ad['category_title'] ?>
                        </span>
                      </div>
                      <div class="price">
                        <span class="number">
                          <?php echo $ad['price'] ?>
                        </span>
                        <span class="currency">EGP</span>
                      </div>
                    </div>
                    <div class="date__location">
                      <span class="date">
                        <?php echo $ad['added_date'] ?>
                      </span>
                      <span class="location">
                        <?php echo $ad['country'] . '/' . $ad['governorate'] ?>
                      </span>
                    </div>
                  </a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </main>



<?php

  } else {
    header('location: index.php');
  }
} else {
  header('location: index.php');
}

?>



<?php

include './includes/templates/footer.php';

ob_flush();
