<?php

ob_start();
session_start();


if (isset($_SESSION['username'])) {

    $pageTitle = "Show Ad";
    include './init.php';

    $adid = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;


    // Check if id > 0 this mean there a numric value > 0
    if ($adid > 0) {

        // Get all data from database
        $stmt = $conn->prepare("SELECT
                                    ads.*,
                                    categories.title AS category_title,
                                    users.id AS user_id,
                                    users.username,
                                    users.country,
                                    users.reg_date AS user_reg_date,
                                    users.profile_image,
                                    users.trust_user
                                FROM ads 
                                JOIN categories ON categories.id = ads.category_id
                                JOIN users ON users.id = ads.user_id
                                WHERE ads.id = ?
        ");
        $stmt->execute([$adid]);
        $ad = $stmt->fetch();

        ?>

        <!-- START MAIN SECTION -->
        <main class="ad__deials__page section">
            <div class="container">
                <h1 class="section__head-xl mb-5">
                    <?php echo $ad['title'] ?>
                </h1>
                <div class="main-content">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="left-section">
                                        <div class="addDetails-img fancy-gallery">

                                            <!-- Image -->
                                            <?php if (!empty($ad['image'])) { ?>
                                                <a
                                                        data-fancybox="gallery"
                                                        data-caption="<?php echo $ad['title'] ?>"
                                                        href="./uploads/ads/<?php echo $ad['image'] ?>"
                                                >
                                                    <img class="main-img w-100"
                                                         src="./uploads/ads/<?php echo $ad['image'] ?>" alt="product"/>
                                                </a>
                                                <a
                                                        data-fancybox="gallery"
                                                        data-caption="<?php echo $ad['title'] ?>"
                                                        href="./uploads/ads/<?php echo $ad['image'] ?>"
                                                ></a>
                                            <?php } else { ?>
                                                <a data-fancybox="gallery" data-caption="image"
                                                   href="assets/images/item-empty-img.png">
                                                    <img class="main-img w-100" src="./assets/images/item-empty-img.png"
                                                         alt="product"/>
                                                </a>
                                            <?php } ?>
                                        </div>

                                        <div class="product-info mb-4">
                                            <ul class="unstyled">
                                                <li>
                                                    <span> Item Status </span>
                                                    <strong>
                                                        <?php echo $ad['item_status'] ?>
                                                    </strong>
                                                </li>
                                                <li>
                                                    <span> Category </span>
                                                    <strong>
                                                        <?php echo $ad['category_title'] ?>
                                                    </strong>
                                                </li>
                                                <li>
                                                    <span> Location </span>
                                                    <strong>
                                                        <?php echo $ad['country'] . '/' . $ad['governorate'] ?>
                                                    </strong>
                                                </li>
                                                <li>
                                                    <span> Added Date </span>
                                                    <strong>
                                                        <?php echo $ad['added_date'] ?>
                                                    </strong>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="product__desc">
                                            <h2 class="section__head">Ad Description</h2>
                                        </div>
                                        <div class="product-desc">
                                            <?php echo $ad['description'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="right-section">
                                <span class="triangle text-center d-block mb-2">
                                    <?php echo $ad['price'] ?>
                                    <span class="dollar__sign">L.E</span>
                                </span>
                                        <!-- calling -->
                                        <a href="tel: <?php echo $ad['phone_number'] ?>" class="button button-secondary-blue mb-1 w-100">
                                            <i class="fas fa-mobile-alt"></i>
                                            <span>
                                                <?php echo $ad['phone_number'] ?>
                                            </span>
                                        </a>

                                        <a href="profile.php?userId=<?php echo $ad['user_id'] ?>"
                                           class="user__details ad__publisher">
                                            <div class="position-relative">
                                                <img src="./uploads/users/<?php echo $ad['profile_image'] ?>" alt="">
                                                <?php if($ad['trust_user'] == 1) { ?>
                                                    <span class="trust-check" title="Trust User">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">

                                                    <?php echo $ad['username'] ?>

                                                </h5>
                                                <p>
                                                    On site since <?php echo $ad['user_reg_date'] ?>
                                                </p>
                                            </div>
                                        </a>

                                        <!-- any thing -->
                                        <div class="important-tips">
                                            <h3 class="section__head-sm">Important Safety Tips</h3>
                                            <ol class="pe-3">
                                                <li class="mb-2">Only meet in public/crowded places for example metro
                                                    stations and malls.
                                                </li>
                                                <li class="mb-2">Never go alone to meet a buyer/seller, always take
                                                    someone with you
                                                </li>
                                                <li class="mb-2">Check and inspect the product properly before
                                                    purchasing it
                                                </li>
                                                <li class="mb-2">
                                                    Never pay anything in advance or transfer money before inspecting
                                                    the product
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-12">


                            <div class="comments-section box_style_content">

                                <?php

                                $stmt = $conn->prepare("SELECT comments.comment, users.fullname, user_id, users.profile_image FROM comments
                                                            JOIN users ON users.id = comments.user_id
                                                            WHERE comments.ad_id = ?
                                                            ORDER BY comments.id DESC
                                                        ");
                                $stmt->execute([$adid]);
                                $comments = $stmt->fetchAll();

                                ?>

                                <form action="comment.php" method="POST">
                                    <div class="top-head">
                                        <span>
                                            Comments
                                            <span class="count">
                                                (<?php echo count($comments) ?>)
                                            </span>
                                        </span>
                                        <button class="button button-secondary-blue">
                                            Add a comment
                                        </button>
                                    </div>
                                    <input type="hidden" name="adid" value="<?php echo $adid ?>">
                                    <textarea name="comment" class="form-control mt-4 mb-4" cols="30" rows="5"
                                              placeholder="Write a comment"></textarea>
                                </form>
                                <div class="comments-list">
                                    <?php foreach ($comments as $comment) { ?>
                                        <div class="comment mt-3 box_style_content">
                                            <div class="user-info d-flex align-items-center gap-1">
                                                <div class="position-relative">
                                                    <img src="./uploads/users/<?php echo $comment['profile_image'] ?>"
                                                         alt="">
                                                    <?php if($ad['trust_user'] == 1) { ?>
                                                        <span class="trust-check" title="Trust User">
                                                        <i class="fas fa-check-circle"></i>
                                                    </span>
                                                    <?php } ?>
                                                </div>

                                                <a href="profile.php?userId=<?php echo $comment['user_id'] ?>"
                                                   class="fullname">
                                                    <?php echo $comment['fullname'] ?>
                                                </a>
                                            </div>
                                            <p class="text">
                                                <?php echo $comment['comment'] ?>
                                            </p>
                                        </div>
                                        <?php

                                    }

                                    echo count($comments) <= 0 ? "<div class='has-no'>This ad has no comments.</div>" : "";

                                    ?>
                                </div>
                            </div>

                            <div class="products__content mt-3">
                                <h2 class="section__head mt-4">Other ads for this seller</h2>

                                <div class="swiper other__ads__seller swiper__container">
                                    <div class="swiper__navigation">
                                        <div class="other__ads__seller-prev prev">
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                        <div class="other__ads__seller-next next">
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
                                        AND users.id = ?
                                        LIMIT 8
                                    ");

                                        $stmt->execute([$ad['user_id']]);
                                        $ads_for_this_user = $stmt->fetchAll();


                                        foreach ($ads_for_this_user as $user_ads) {
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="product card__product">
                                                    <?php
                                                    if (isset($_SESSION['username'])) {

                                                        $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
                                                        $stmt->execute([$user_ads['ad_id'], $_SESSION['id']]);
                                                        $inFav = $stmt->rowCount();

                                                        ?>
                                                        <a href="favourite.php?action=add&adid=<?php echo $user_ads['ad_id'] ?>"
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
                                                    <?php if (!empty($user_ads['image'])) { ?>
                                                        <img class="product__img"
                                                             src="./uploads/ads/<?php echo $user_ads['image'] ?>"
                                                             alt="product"/>
                                                    <?php } else { ?>
                                                        <img class="product__img"
                                                             src="./assets/images/item-empty-img.png" alt="product"/>
                                                    <?php } ?>
                                                    <a href="showAd.php?id=<?php echo $user_ads['ad_id'] ?>"
                                                       class="product__info">
                                                        <div class="main__info">
                                                            <div class="title__category">
                                                                <span class="title">
                                                                    <?php echo strlen($user_ads['title']) > 15 ? substr($user_ads['title'], 0, 14) . "..." : $user_ads['title'] ?>
                                                                </span>
                                                                <span class="category">
                                                                    <?php echo $user_ads['category_title'] ?>
                                                                </span>
                                                            </div>
                                                            <div class="price">
                                                                <span class="number">
                                                                    <?php echo $user_ads['price'] ?>
                                                                </span>
                                                                <span class="currency">EGP</span>
                                                            </div>
                                                        </div>
                                                        <div class="date__location">
                                                            <span class="date">
                                                                <?php echo $user_ads['added_date'] ?>
                                                            </span>
                                                            <span class="location">
                                                                <?php echo $user_ads['country'] . '/' . $user_ads['governorate'] ?>
                                                            </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="other__ads__seller-pagination swiper__pagination"></div>
                                </div>
                            </div>
                        </div>
                        <!-- rignt section -->
                        <div class="col-xl-3 col-12">


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
                        <!-- end of right section -->
                    </div>

                    <div class="products__content mt-3">
                        <h2 class="section__head mt-4">Another Ads</h2>
                        <div class="swiper another__products swiper__container">
                            <div class="swiper__navigation">
                                <div class="another__products-prev prev">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <div class="another__products-next next">
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
                                        ORDER BY ads.id DESC LIMIT 15
                                    ");
                                $stmt->execute();
                                $another_ads = $stmt->fetchAll();


                                foreach ($another_ads as $another_ad) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="product card__product">
                                            <?php
                                            if (isset($_SESSION['username'])) {

                                                $stmt = $conn->prepare("SELECT * FROM favorite WHERE ad_id = ? AND user_id = ?");
                                                $stmt->execute([$another_ad['ad_id'], $_SESSION['id']]);
                                                $inFav = $stmt->rowCount();

                                                ?>
                                                <a href="favourite.php?action=add&adid=<?php echo $another_ad['ad_id'] ?>"
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
                                            <?php if (!empty($another_ad['image'])) { ?>
                                                <img class="product__img"
                                                     src="./uploads/ads/<?php echo $another_ad['image'] ?>"
                                                     alt="product"/>
                                            <?php } else { ?>
                                                <img class="product__img" src="./assets/images/item-empty-img.png"
                                                     alt="product"/>
                                            <?php } ?>
                                            <a href="showAd.php?id=<?php echo $another_ad['ad_id'] ?>"
                                               class="product__info">
                                                <div class="main__info">
                                                    <div class="title__category">
                                                        <span class="title">
                                                            <?php echo strlen($another_ad['title']) > 15 ? substr($another_ad['title'], 0, 14) . "..." : $another_ad['title'] ?>
                                                        </span>
                                                        <span class="category">
                                                            <?php echo $another_ad['category_title'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="number">
                                                            <?php echo $another_ad['price'] ?>
                                                        </span>
                                                        <span class="currency">EGP</span>
                                                    </div>
                                                </div>
                                                <div class="date__location">
                                                    <span class="date">
                                                        <?php echo $another_ad['added_date'] ?>
                                                    </span>
                                                    <span class="location">
                                                        <?php echo $another_ad['country'] . '/' . $another_ad['governorate'] ?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="another__products-pagination swiper__pagination"></div>
                        </div>
                    </div>

                    <!-- right section -->
                </div>


            </div>
        </main>
        <!-- END MAIN SECTION -->


        <?php

    } else {
        header('location: index.php');
    }
} else {
    header('location: login.php');
}

include './includes/templates/footer.php';

ob_flush();

?>