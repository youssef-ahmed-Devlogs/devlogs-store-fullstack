<?php

session_start();

if (isset($_SESSION['username'])) {

  $pageTitle = "Favorite";
  include "init.php";

  $userid = $_SESSION['id'];

  $stmt = $conn->prepare("SELECT
                            ads.id AS ad_id,
                            ads.title,
                            ads.price,
                            ads.added_date,
                            ads.governorate,
                            categories.title AS category_title,
                            users.country
                            FROM favorite
                            JOIN users ON users.id = favorite.user_id
                            JOIN ads ON ads.id = favorite.ad_id
                            JOIN categories ON categories.id = ads.category_id
                            WHERE users.id = ?
                          ");
  $stmt->execute([$userid]);
  $favAds = $stmt->fetchAll();



?>

  <main class="favorite-page section">
    <div class="container">
      <h1><?php echo $pageTitle ?></h1>

      <div class="row">
        <?php foreach ($favAds as $ad) { ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="product card__product">
              <span class="add__to__fav">
                <i class="fas fa-star"></i>
              </span>
              <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
              <a href="showAd.php?id=<?php echo $ad['ad_id'] ?>" class="product__info">
                <div class="main__info">
                  <div class="title__category">
                    <span class="title">
                      <?php echo strlen($ad['title']) > 15 ? substr($ad['title'], 0, 14) . "..." : $ad['title'] ?>
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
  </main>


<?php

  include "./includes/templates/footer.php";
} else {
  header('location: index.php');
}
