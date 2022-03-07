<?php

session_start();

$pageTitle = "Homepage";
include './init.php';

?>

<!-- START MAIN SECTION -->
<main>
    <!-- Swiper -->
    <div class="swiper home__slider">
        <div class="swiper-wrapper">

            <?php

            $stmt = $conn->prepare("SELECT * FROM slider");
            $stmt->execute();
            $slider = $stmt->fetchAll();

            foreach ($slider as $slide) {
        ?>
            <div class="swiper-slide">
                <img src="<?php echo './admin/uploads/' . $slide['image'] ?>" alt="home slider" />
            </div>
            <?php } ?>

        </div>
        <div class="swiper-button-next home__slider-next"></div>
        <div class="swiper-button-prev home__slider-prev"></div>
        <div class="home__slider-pagination"></div>
    </div>

    <div class="home-container">
        <div class="container">
            <div class="row home__content">
                <div class="col-xl-2">
                    <!-- START CATEGORIES SECTION -->

                    <div class="categories__section">
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
                <div class="col-xl-10">
                    <!-- START PRODUCTS SECTION-->

                    <div class="products__section">
                        <div class="products__section-content">
                            <form class="filter__content" action="search.php">
                                <div class="row align-items-center">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="search">Search</label>
                                            <input type="text" name="search" id="search"
                                                placeholder="What are you looking for?" />
                                        </div>
                                    </div>
                                    <div class="col-xl-2">
                                        <div class="form-group">
                                            <label for="governorate">Governorate</label>
                                            <select name="governorate" id="governorate">
                                                <option value="">All</option>
                                                <option value="cairo">Cairo</option>
                                                <option value="alex">Alex</option>
                                                <option value="giza">Giza</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2">
                                        <div class="form-group">
                                            <label for="price_range">Price Range</label>
                                            <select name="price_range" id="price_range">
                                                <option value="">All</option>
                                                <option value="50"> 50EGP or more </option>
                                                <option value="100"> 100EGP or more </option>
                                                <option value="500"> 500EGP or more </option>
                                                <option value="1000"> 1000EGP or more </option>
                                                <option value="5000"> 5000EGP or more </option>
                                                <option value="10000"> 10000EGP or more </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2">

                                        <button class="btn btn-primary search-btn" title="Search">
                                            <i class="fas fa-search"></i>
                                        </button>

                                    </div>
                                </div>

                            </form>



                            <!-- Latest Products -->
                            <div class="products__content mt-3">
                                <h2 class="section__head">Latest Ads</h2>

                                <div class="swiper latest__products swiper__container">
                                    <div class="swiper__navigation">
                                        <div class="latest__products-prev prev">
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                        <div class="latest__products-next next">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-wrapper">
                                        <?php

                    $stmt = $conn->prepare("SELECT
                                                ads.*,
                                                ads.id AS ad_id,
                                                users.country,
                                                categories.title AS category_title
                                            FROM ads
                                            JOIN categories ON categories.id = ads.category_id
                                            JOIN users ON users.id = ads.user_id
                                            WHERE ads.publish_state = 'published'
                                            ORDER BY ads.id DESC LIMIT 30
                                        ");
                    $stmt->execute();
                    $ads = $stmt->fetchAll();


                    foreach ($ads as $ad) {
                    ?>
                                        <div class="swiper-slide">
                                            <div class="product card__product">
                                                <?php
                          if (isset($_SESSION['username'])) {

                            $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
                            $stmt->execute([$ad['ad_id'], $_SESSION['id']]);
                            $inFav = $stmt->rowCount();

                          ?>
                                                <a href="favourite.php?action=add&adid=<?php echo $ad['ad_id'] ?>"
                                                    class="add__to__fav <?php echo $inFav == 1 ? 'active' : '' ?>">
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
                                                <img class="product__img" src="./uploads/ads/<?php echo $ad['image'] ?>"
                                                    alt="product" />
                                                <?php } else { ?>
                                                <img class="product__img" src="./assets/images/item-empty-img.png"
                                                    alt="product" />
                                                <?php }?>
                                                <a href="showAd.php?id=<?php echo $ad['ad_id'] ?>"
                                                    class="product__info">
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

                                    <div class="latest__products-pagination swiper__pagination"></div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="top__banner mt-2">
                        <img class="w-100" src="./assets/images/banner1.png" alt="banner ads">
                    </div>

                    <!-- END PRODUCTS SECTION -->
                </div>
                <div class="col-12">
                    <div class="products__content">
                        <div class="box_style_content">
                            <div class="row">
                                <?php
                $stmt = $conn->prepare("SELECT ads.*, ads.id AS ad_id, categories.title AS category_title, users.country FROM ads
                                          JOIN categories ON categories.id = ads.category_id
                                          JOIN users ON users.id = ads.user_id
                                          WHERE ads.publish_state = 'published'
                                          ORDER BY ads.id DESC
                                        ");
                $stmt->execute();
                $ads = $stmt->fetchAll();


                foreach ($ads as $ad) {


                ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="product card__product">
                                        <?php
                      if (isset($_SESSION['username'])) {

                        $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
                        $stmt->execute([$ad['ad_id'], $_SESSION['id']]);
                        $inFav = $stmt->rowCount();

                      ?>
                                        <a href="favourite.php?action=add&adid=<?php echo $ad['ad_id'] ?>"
                                            class="add__to__fav <?php echo $inFav == 1 ? 'active' : '' ?>">
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
                                        <img class="product__img" src="./uploads/ads/<?php echo $ad['image'] ?>"
                                            alt="product" />
                                        <?php } else { ?>
                                        <img class="product__img" src="./assets/images/item-empty-img.png"
                                            alt="product" />
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
                </div>
            </div>
        </div>
    </div>
</main>
<!-- END MAIN SECTION -->


<?php

include './includes/templates/footer.php';

?>