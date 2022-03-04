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
                                <span><i class="fas fa-phone"></i></span>
                                <a href="#">obour</a>
                            </div>
                            <div>
                                <span><i class="fas fa-phone"></i></span>
                                <a href="#">abdorabie</a>
                            </div>
                        </div>
                        <div class="menue_alien">
                            <i class="fa-solid fa-bars"></i>
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
                    <button class="chat_btn">caht</button>
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
                    <div class="col-lg-3 px-2 mb-2">
                        <div class="profile_card">
                            <div class="card">
                                <img src="./assets/images/1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 mb-2">
                        <div class="profile_card">
                            <div class="card">
                                <img src="./assets/images/1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 mb-2">
                        <div class="profile_card">
                            <div class="card">
                                <img src="./assets/images/1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 px-2 mb-2">
                        <div class="profile_card">
                            <div class="card">
                                <img src="./assets/images/1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of the card's content.</p>
                                </div>
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