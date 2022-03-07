<?php

session_start();

if (isset($_SESSION['username'])) {

  $pageTitle = "Search";
  include './init.php';


  $search         = isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '%';
  $governorate    = isset($_GET['governorate']) && !empty($_GET['governorate']) ? $_GET['governorate'] : '';
  $priceRange     = isset($_GET['price_range']) && is_numeric($_GET['price_range']) ? $_GET['price_range'] : '';

?>

  <main class="search-page section">
    <div class="container">
      <form class="filter__content" action="search.php">
        <div class="row align-items-center">
          <div class="col-xl-6">
            <div class="form-group">
              <label for="search">Search</label>
              <input type="text" name="search" value="<?php echo $search == '%' ? '' : $search; ?>" id="search" placeholder="What are you looking for?" />
            </div>
          </div>
          <div class="col-xl-2">
            <div class="form-group">
              <label for="governorate">Governorate</label>
              <select name="governorate" id="governorate">
                <option value="" <?php echo $governorate == '' ? 'selected' : '' ?>>
                  All
                </option>
                <option value="cairo" <?php echo $governorate == 'cairo' ? 'selected' : '' ?>>
                  Cairo
                </option>
                <option value="alex" <?php echo $governorate == 'alex' ? 'selected' : '' ?>>Alex</option>
                <option value="giza" <?php echo $governorate == 'giza' ? 'selected' : '' ?>>Giza</option>
              </select>
            </div>
          </div>
          <div class="col-xl-2">
            <div class="form-group">
              <label for="price_range">Price Range</label>
              <select name="price_range" id="price_range">
                <option value="" <?php echo $priceRange == '' ? 'selected' : '' ?>>All</option>
                <option value="50" <?php echo $priceRange == '50' ? 'selected' : '' ?>> 50EGP or more </option>
                <option value="100" <?php echo $priceRange == '100' ? 'selected' : '' ?>> 100EGP or more </option>
                <option value="500" <?php echo $priceRange == '500' ? 'selected' : '' ?>> 500EGP or more </option>
                <option value="1000" <?php echo $priceRange == '1000' ? 'selected' : '' ?>> 1000EGP or more </option>
                <option value="5000" <?php echo $priceRange == '5000' ? 'selected' : '' ?>> 5000EGP or more </option>
                <option value="10000" <?php echo $priceRange == '10000' ? 'selected' : '' ?>> 10000EGP or more </option>
              </select>
            </div>
          </div>
          <div class="col-xl-2">

            <button class="btn btn-primary" title="Search" style="transform: translate(10px, 10px);">
              <i class="fas fa-search"></i>
            </button>

          </div>
        </div>

      </form>

      <div class="row mt-5">
        <div class="col-xl-9">
          <div class="products__content ">
            <div class="box_style_content">

              <?php

              $governorate = empty($governorate) ? '' : "AND governorate = '$governorate'";

              $search = '%' . $search . '%';

              $stmt = $conn->prepare("SELECT ads.*, ads.id AS ad_id, categories.title AS category_title, users.country FROM ads
                                        JOIN categories ON categories.id = ads.category_id
                                        JOIN users ON users.id = ads.user_id
                                        WHERE ads.publish_state = 'published'
                                        AND ads.title LIKE ?
                                        $governorate
                                        AND ads.price >= ?
                                        ORDER BY ads.id DESC
                                      ");
              $stmt->execute([$search, $priceRange]);
              $ads = $stmt->fetchAll();

              echo $stmt->rowCount() > 10 ? "<div class='h4 mb-3 mt-3'>+10 Ads found</div>" : "<div class='h4 mb-3 mt-3'>{$stmt->rowCount()} Ads found</div>";

              ?>

              <div class="row">
                <?php foreach ($ads as $ad) { ?>

                  <div class="col-xl-4 col-lg-6 mb-4">
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


              <!-- If no has ads in favorite -->
              <?php

              if (count($ads) == 0) { ?>

                <div class="page-empty text-center">
                  <div>
                    <img src="assets/images/search-empty.svg" alt="">
                    <span>No ads found for this search at the moment.</span>

                    <a href="search.php" class="btn btn-primary" title="Add new ad">
                      <i class="fas fa-home"></i> Browse ads
                    </a>

                  </div>
                </div>

              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-xl-3">
            <!-- START CATEGORIES SECTION -->

            <div class="categories__section mt-4">
                <h2 class="Category_button section__head-sm d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                    aria-controls="collapseExample">Categories<i class="fas fa-caret-down"></i>
                </h2>
                <span data-bs-toggle="collapse" role="button" aria-expanded="true"
                      aria-controls="collapseExample" href="#collapseExample"
                      class="d-none text-center">...</span>
                <ul class="categories__list collapse show" id="collapseExample">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM categories WHERE parent = 0");
                    $stmt->execute();
                    $categories = $stmt->fetchAll();

                    foreach ($categories as $category) {
                        ?>

                        <li>
                            <a href="categories.php?id=<?php echo $category['id'] ?>">
                                <?php echo $category['title'] ?>
                            </a>

                            <ul class="sub-category-list">

                                <?php

                                $stmt = $conn->prepare("SELECT * FROM categories WHERE parent = ?");
                                $stmt->execute([$category['id']]);
                                $subCategories = $stmt->fetchAll();


                                foreach ($subCategories as $subCategory) {
                                    ?>

                                    <li>
                                        <a href="categories.php?id=<?php echo $subCategory['id'] ?>">
                                            <?php echo $subCategory['title'] ?>
                                        </a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </li>

                    <?php } ?>
                </ul>
            </div>

            <!-- END CATEGORIES SECTION-->
        </div>
      </div>
    </div>
  </main>

<?php
} else {
  header('location: login.php');
}

include './includes/templates/footer.php';

?>