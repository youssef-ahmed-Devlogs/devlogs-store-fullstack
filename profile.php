<?php

ob_start();
session_start();

$pageTitle = "Homepage";
include './init.php';


if (isset($_SESSION['username']) && isset($_GET['userId'])) {

    $userId = is_numeric($_GET['userId']) ? intval($_GET['userId']) : 0;



    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();


    if ($stmt->rowCount() > 0) {


?>

<!-- START MAIN SECTION -->
<main>
    <!-- Swiper -->
    <div class="profile_bg_section">
        <img src="./assets/images/sider.jpg " class="bg_img" alt="">
    </div>
    <div class="container">
        <div class="middel_section">
            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="middel_section_img">
                        <img src="assets/images/user-pic1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user_nameAnd_desc">
                        <h3 class="m-0">
                            <?php echo $user['fullname'] ?>
                        </h3>
                        <p class="mt-0">
                            @<?php echo $user['username'] ?>
                        </p>

                        <div class="menue_alien">
                            <div class="dropdown">
                                <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="user_info_right box_style_content">
                    <div class="d-flex">
                        <span class="mr-1"><i class="fas fa-mobile-alt"></i></span>
                        <a>
                            <?php echo $user['country'] ?>
                        </a>
                    </div>
                    <div class="d-flex">
                        <span><i class="fas fa-envelope"></i></span>
                        <a href="mailto:abdoRaibe.6a@gmail.com">
                            <?php echo $user['email'] ?>
                        </a>
                    </div>
                    <button class="chat_btn"><i class="fas fa-comment"></i> caht</button>
                    <div class="last_rating">
                        <div>
                            <span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i> <i class="fas fa-star"></i> </span>
                            <div class="mt-0">1312 reviwes</div>
                        </div>
                    </div>
                </div>

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
                                $stmt->execute([$userId]);
                                $ads = $stmt->fetchAll();


                                foreach ($ads as $ad) {

                                ?>

                        <div class="col-lg-3 px-2 col_option mb-4">
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
                                <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
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
</main>
<!-- END MAIN SECTION -->


<?php

    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

include './includes/templates/footer.php';

ob_flush();
?>