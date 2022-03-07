<?php

ob_start();
session_start();

if (isset($_SESSION['username'])) {

  $pageTitle = "Favorite";
  include "init.php";
  $currentUserID = $_SESSION['id'];

  $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : "show";

  if ($action == "show") {

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
    $stmt->execute([$currentUserID]);
    $favAds = $stmt->fetchAll();

?>

    <main class="favorite-page section">
      <div class="container">
        <h1 class="section__head-xl mb-5"><?php echo $pageTitle ?></h1>

        <div class="box_style_content ">

          <!-- If no has ads in favorite -->
          <?php

          if (count($favAds) == 0) { ?>

            <div class="page-empty text-center">
              <div>
                <img src="assets/images/fav-empty.png" alt="">
                <span>You have no ads in favorite at the moment.</span>

                <a href="index.php" class="btn btn-primary" title="Add new ad">
                  <i class="fas fa-home"></i> Browse ads
                </a>

              </div>
            </div>

          <?php } ?>

          <!-- All favorite ads -->
          <div class="row">
            <?php

            foreach ($favAds as $ad) {

              $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
              $stmt->execute([$ad['ad_id'], $_SESSION['id']]);
              $inFav = $stmt->rowCount();
            ?>
              <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="product card__product">
                  <a href="favourite.php?action=add&adid=<?php echo $ad['ad_id'] ?>" class="add__to__fav <?php echo $inFav == 1 ? 'active' : '' ?>">
                    <i class="fas fa-star"></i>
                  </a>
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
      </div>
    </main>


<?php

  } elseif ($action == "add") {

    $adid = isset($_GET['adid']) && is_numeric($_GET['adid']) ? intval($_GET['adid']) : 0;

    if ($adid > 0) {

      $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
      $stmt->execute([$adid, $currentUserID]);

      $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";

      if ($stmt->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO favorite(ad_id, user_id) VALUES(:adid, :userid)");
        $stmt->execute([
          "adid"    => $adid,
          "userid"  => $currentUserID
        ]);


        header("location: $url");
      } else {
        $stmt = $conn->prepare("DELETE FROM favorite WHERE ad_id = ? AND user_id = ?");
        $stmt->execute([$adid, $currentUserID]);
        header("location: $url");
      }
    } else {
      header("location: index.php");
    }
  } else {
    // Redirect to Home page if action not equal any action from above
    header('location: index.php');
  }

  include "./includes/templates/footer.php";
} else {
  header('location: index.php');
}

ob_flush();
