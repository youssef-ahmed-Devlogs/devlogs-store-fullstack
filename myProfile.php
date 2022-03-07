<?php

ob_start();
session_start();

$pageTitle = "Profile";
include './init.php';


if (isset($_SESSION['username'])) {

    $currentUserId = $_SESSION['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$currentUserId]);
    $user = $stmt->fetch();

    ?>


    <!-- START MAIN SECTION -->
    <main class="profile_page">
        <!-- Swiper -->
        <div class="profile_bg_section">
            <!-- Cover Image -->
            <?php if(!empty($user['cover_image'])) { ?>
                <img src="./uploads/users/<?php echo $user['cover_image'] ?>" class="bg_img" alt="">
            <?php } else { ?>
                <img src="./assets/images/sider.jpg " class="bg_img" alt="">
            <?php } ?>
        </div>
        <div class="container">
            <div class="middel_section">
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="middel_section_img">
                            <div class="profile_img">

                            <!-- Profile Image -->
                            <?php if(!empty($user['profile_image'])) { ?>
                                <img src="./uploads/users/<?php echo $user['profile_image'] ?>" alt="">
                            <?php } else { ?>
                                <img src="assets/images/user-empty.png" alt="">
                            <?php } ?>

                                <?php if($user['trust_user'] == 1) { ?>
                                    <span class="trust-check" title="Trust User">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 user_nameAnd_desc-col">
                        <div class="user_nameAnd_desc">
                            <h3 class="m-0">
                                <?php echo $user['fullname'] ?>
                            </h3>
                            <p class="mt-0">
                                @<?php echo $user['username'] ?>
                            </p>
                            <small>
                                On site since
                                <?php echo $user['reg_date'] ?>
                            </small>

                            <div class="menue_alien">
                                <div class="dropdown">
                                    <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="settings.php">Edit Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="myAds.php">Manage Ads</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="favourite.php">My Favorite</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row left-content">
                <div class="col-lg-3">
                    <div class="user_info_right box_style_content">
                        <div class="d-flex align-items-center">
                            <span class="mr-1"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="text">
                                <?php echo $user['country'] ?>
                            </span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span><i class="fas fa-envelope"></i></span>
                            <a  href=<?php echo "mailto:" . $user['email'] ?>  class="text">
                                <?php echo $user['email'] ?>
                            </a>
                        </div>

                    </div>
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
                <div class="col-lg-9">
                    <div class="box_style_content">
                        <div class="row">
                            <div class="flex_icon mb-2" id="flex_icon">
                                <i class="fas fa-list"></i>
                            </div>
                            <?php
                            $stmt = $conn->prepare("SELECT ads.*, ads.id AS ad_id, categories.title AS category_title, users.country FROM ads
                                                            JOIN categories ON categories.id = ads.category_id
                                                            JOIN users ON users.id = ads.user_id
                                                            WHERE ads.publish_state = 'published'
                                                            AND users.id = ?
                                                            ORDER BY ads.id DESC
                                                        ");
                            $stmt->execute([$currentUserId]);
                            $ads = $stmt->fetchAll();


                            foreach ($ads as $ad) {

                                ?>

                                <div class="col-xl-4 px-2 col_option mb-4">
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
                                        <div class="card__product__img">
                                            <!-- Image -->
                                            <?php if(!empty($ad['image'])) { ?>
                                                <img class="product__img" src="./uploads/ads/<?php echo $ad['image'] ?>" alt="product" />
                                            <?php } else { ?>
                                                <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                                            <?php }?>
                                        </div>
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

                            <!-- If no has ads posted -->
                            <?php

                            if (count($ads) == 0) { ?>

                                <div class="page-empty text-center">
                                    <div>
                                        <img src="assets/images/myads-empty.png" alt="">
                                        <span>You have no ads posted at the moment.</span>

                                        <a href="myAds.php?action=add" class="btn btn-primary" title="Add new ad">
                                            <i class="fas fa-plus"></i> Add new ad
                                        </a>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END MAIN SECTION -->

<?php
} else {
    header('location: index.php');
}

include './includes/templates/footer.php';

ob_flush();
?>