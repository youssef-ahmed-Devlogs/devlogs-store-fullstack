<?php

session_start();

$pageTitle = "Homepage";
include './init.php';

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
                        <h3>jone Done</h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <div class="media">
                            <div>
                                <span><i class="fas fa-phone"></i></span>
                                <a href="#">obour</a>
                            </div>
                            <div>
                                <i class="fas fa-location-arrow"></i>
                                <a href="#">obour</a>
                            </div>
                            <div>
                                <i class="fas fa-envelope"></i>
                                <a href="#">abdorabie</a>
                            </div>
                        </div>
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
                <div class="user_info_right">
                    <div class="d-flex">
                        <span><i class="fas fa-phone"></i></span>
                        <a href="#">0111 89 332 54</a>
                    </div>
                    <div class="d-flex">

                        <a href="#">+11 89 332 54</a>
                    </div>
                    <div class="d-flex">
                        <span><i class="fas fa-mail"></i></span>
                        <a href="#">0111 89 332 54</a>
                    </div>
                    <button class="chat_btn"><i class="fas fa-comment"></i> caht</button>
                    <div class="last_rating">
                        <h3>4.5</h3>
                        <div>
                            <div>1312 reviwes</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="flex_icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="grid_icon">
                        <i class="fas fa-th" id="grid_icon"></i>
                    </div>
                    <div class="col-lg-3 px-2 col_option mb-2">
                        <div class="product card__product">
                            <a href="#" class="add__to__fav">
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="card__product__img">
                                <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                            </div> <a href="#" class="product__info">
                                <div class="main__info">
                                    <div class="title__category">
                                        <span class="title">
                                            Title
                                        </span>
                                        <span class="category">
                                            category
                                        </span>
                                    </div>
                                    <div class="price">
                                        <span class="number">
                                            1400
                                        </span>
                                        <span class="currency">EGP</span>
                                    </div>
                                </div>
                                <div class="date__location">
                                    <span class="date">
                                        2022-5-3
                                    </span>
                                    <span class="location">
                                        Egypt/cairo
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 col_option mb-2">
                        <div class="product card__product">
                            <a href="#" class="add__to__fav">
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="card__product__img">
                                <div class="card__product__img">
                                    <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                                </div>
                            </div>
                            <a href="#" class="product__info">
                                <div class="main__info">
                                    <div class="title__category">
                                        <span class="title">
                                            Title
                                        </span>
                                        <span class="category">
                                            category
                                        </span>
                                    </div>
                                    <div class="price">
                                        <span class="number">
                                            1400
                                        </span>
                                        <span class="currency">EGP</span>
                                    </div>
                                </div>
                                <div class="date__location">
                                    <span class="date">
                                        2022-5-3
                                    </span>
                                    <span class="location">
                                        Egypt/cairo
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 col_option mb-2">
                        <div class="product card__product">
                            <a href="#" class="add__to__fav">
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="card__product__img">
                                <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                            </div> <a href="#" class="product__info">
                                <div class="main__info">
                                    <div class="title__category">
                                        <span class="title">
                                            Title
                                        </span>
                                        <span class="category">
                                            category
                                        </span>
                                    </div>
                                    <div class="price">
                                        <span class="number">
                                            1400
                                        </span>
                                        <span class="currency">EGP</span>
                                    </div>
                                </div>
                                <div class="date__location">
                                    <span class="date">
                                        2022-5-3
                                    </span>
                                    <span class="location">
                                        Egypt/cairo
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 col_option mb-2">
                        <div class="product card__product">
                            <a href="#" class="add__to__fav">
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="card__product__img">
                                <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                            </div> <a href="#" class="product__info">
                                <div class="main__info">
                                    <div class="title__category">
                                        <span class="title">
                                            Title
                                        </span>
                                        <span class="category">
                                            category
                                        </span>
                                    </div>
                                    <div class="price">
                                        <span class="number">
                                            1400
                                        </span>
                                        <span class="currency">EGP</span>
                                    </div>
                                </div>
                                <div class="date__location">
                                    <span class="date">
                                        2022-5-3
                                    </span>
                                    <span class="location">
                                        Egypt/cairo
                                    </span>
                                </div>
                            </a>
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