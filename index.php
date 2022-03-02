<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OLX</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="./assets/icons/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="./assets/plugins/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/plugins/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/plugins/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
  <!-- START HEADER SECTION -->
  <header>
    <div class="container">
      <div class="header__content">
        <div class="left-header">
          <a href="index.html" class="logo">
            <img src="./assets/icons/logo.png" alt="Logo" />
          </a>
        </div>
        <div class="right-header">
          <div class="notifications-settings">
            <div class="notification-icon">
              <span class="badge bg-danger">23</span>
              <i class="fas fa-bell fa-lg"></i>
            </div>

            <ul class="notifications-settings-list">
              <h6 class="notifications-head">Notifications</h6>
              <div class="notifications">
                <a href="#" class="notification-link">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  exercitationem expedita distinctio accusamus debitis
                  sapiente!
                </a>
                <a href="#" class="notification-link">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  exercitationem expedita distinctio accusamus debitis
                  sapiente!
                </a>
                <a href="#" class="notification-link">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  exercitationem expedita distinctio accusamus debitis
                  sapiente!
                </a>
                <a href="#" class="notification-link">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                  exercitationem expedita distinctio accusamus debitis
                  sapiente!
                </a>
              </div>
            </ul>
          </div>
          <div class="lang">
            <span class="lang_trigger_icon">
              <img src="./assets/icons/eg_flag.png" alt="arabic" title="arabic" />
            </span>
          </div>
          <div class="nav-links">
            <a href="./pages/addAd.html" class="button-border button-secondary-blue">
              <i class="fas fa-plus"></i>
              <span>Add Ad</span>
            </a>
          </div>
          <div class="user-settings">
            <div class="user-icon">
              <img src="./assets/icons/user-pic1.jpg" alt="user picture" title="user picture" />
            </div>

            <ul class="user-settings-list">
              <a href="./pages/profile.html" class="user-settings-link">
                <div class="user-icon">
                  <img src="./assets/icons/user-pic1.jpg" alt="user picture" title="user picture" />
                </div>
                Profile
              </a>
              <a href="./pages/myAds.html" class="user-settings-link">
                <i class="fas fa-ad"></i>
                My Ads
              </a>
              <a href="./pages/messages.html" class="user-settings-link">
                <i class="fas fa-envelope"></i>
                Messages
              </a>
              <a href="./pages/addAd.html" class="user-settings-link">
                <i class="fas fa-plus"></i>
                Add ad
              </a>
              <a href="./pages/favourite.html" class="user-settings-link">
                <i class="fas fa-star"></i>
                Favourite
              </a>
              <a href="./pages/settings.html" class="user-settings-link">
                <i class="fas fa-cog"></i>
                Settings
              </a>
              <a href="./pages/logout.html" class="user-settings-link">
                <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- END HEADER SECTION -->

  <!-- START MAIN SECTION -->
  <main>
    <!-- Swiper -->
    <div class="swiper home__slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="./assets/images/home_slider1.jpeg" alt="home slider" />
        </div>
        <div class="swiper-slide">
          <img src="./assets/images/home_slider2.jpg" alt="home slider" />
        </div>
        <div class="swiper-slide">
          <img src="./assets/images/home_slider1.jpeg" alt="home slider" />
        </div>
      </div>
      <div class="swiper-button-next home__slider-next"></div>
      <div class="swiper-button-prev home__slider-prev"></div>
      <div class="home__slider-pagination"></div>
    </div>

    <!-- START BANNER ADS -->
    <div class="container">
      <div class="ads__banner py-3">
        <img src="assets/images/banner1.jpg" alt="banner ads" />
      </div>
    </div>
    <!-- END BANNER ADS -->

    <div class="container">
      <div class="row home__content">
        <div class="col-xl-2">
          <!-- START CATEGORIES SECTION -->

          <div class="categories__section">
            <h2 class="section__head-sm">Categories</h2>
            <ul class="categories__list">
              <a href="#">Fashion</a>
              <a href="#">Beauty</a>
              <a href="#">technology</a>
              <a href="#">Vehicles</a>
              <a href="#">Kids</a>
              <a href="#">Babies</a>
              <a href="#">Books</a>
              <a href="#">Sports</a>
              <a href="#">Hobbies</a>
              <a href="#">Pets</a>
              <a href="#">Accessories</a>
              <a href="#">Mobile </a>
              <a href="#">Phones</a>
              <a href="#">Tablets</a>
            </ul>
          </div>

          <!-- END CATEGORIES SECTION-->
        </div>
        <div class="col-xl-10">
          <!-- START PRODUCTS SECTION-->

          <div class="products__section">
            <div class="products__section-content">
              <form class="filter__content" action="./pages/search.html">
                <input type="text" id="search__products" placeholder="What are you looking for?" />
                <select id="filter__products">
                  <option value="all">All</option>
                  <option value="cairo">Cairo</option>
                  <option value="alex">Alex</option>
                  <option value="giza">Giza</option>
                </select>
              </form>

              <!-- Latest Products -->
              <div class="products__content mt-3">
                <h2 class="section__head">Latest Products</h2>

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
                    <div class="swiper-slide">
                      <div class="product card__product" data-adid="42">
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/1.png" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Airbods pro</span>
                              <span class="category">Tech</span>
                            </div>
                            <div class="price">
                              <span class="number">3500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">2/9/2022</span>
                            <span class="location">Cairo</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav active">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/3.jpg" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Black Jacket</span>
                              <span class="category">Men clothes</span>
                            </div>
                            <div class="price">
                              <span class="number">500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">2/9/2022</span>
                            <span class="location">Cairo</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/2.jpg" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Gaming PC</span>
                              <span class="category">Tech</span>
                            </div>
                            <div class="price">
                              <span class="number">2500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">4/9/2022</span>
                            <span class="location">Giza</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/1.png" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Airbods pro</span>
                              <span class="category">Tech</span>
                            </div>
                            <div class="price">
                              <span class="number">3500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">2/9/2022</span>
                            <span class="location">Cairo</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav active">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/3.jpg" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Black Jacket</span>
                              <span class="category">Men clothes</span>
                            </div>
                            <div class="price">
                              <span class="number">500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">2/9/2022</span>
                            <span class="location">Cairo</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="assets/images/2.jpg" alt="product" />
                        <a href="./pages/AdDetails.html" class="product__info">
                          <div class="main__info">
                            <div class="title__category">
                              <span class="title">Gaming PC</span>
                              <span class="category">Tech</span>
                            </div>
                            <div class="price">
                              <span class="number">2500</span>
                              <span class="currency">L.E</span>
                            </div>
                          </div>
                          <div class="date__location">
                            <span class="date">4/9/2022</span>
                            <span class="location">Giza</span>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="latest__products-pagination swiper__pagination"></div>
                </div>
              </div>

              <!-- Top Products -->
              <div class="products__content mt-5">
                <h2 class="section__head">Top Products</h2>

                <div class="row">
                  <div class="col-lg-9">
                    <div class="swiper top__products swiper__container">
                      <div class="swiper__navigation">
                        <div class="top__products-prev prev">
                          <i class="fas fa-arrow-left"></i>
                        </div>
                        <div class="top__products-next next">
                          <i class="fas fa-arrow-right"></i>
                        </div>
                      </div>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/1.png" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Airbods pro</span>
                                  <span class="category">Tech</span>
                                </div>
                                <div class="price">
                                  <span class="number">3500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">2/9/2022</span>
                                <span class="location">Cairo</span>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav active">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/3.jpg" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Black Jacket</span>
                                  <span class="category">Men clothes</span>
                                </div>
                                <div class="price">
                                  <span class="number">500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">2/9/2022</span>
                                <span class="location">Cairo</span>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/2.jpg" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Gaming PC</span>
                                  <span class="category">Tech</span>
                                </div>
                                <div class="price">
                                  <span class="number">2500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">4/9/2022</span>
                                <span class="location">Giza</span>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/1.png" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Airbods pro</span>
                                  <span class="category">Tech</span>
                                </div>
                                <div class="price">
                                  <span class="number">3500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">2/9/2022</span>
                                <span class="location">Cairo</span>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav active">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/3.jpg" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Black Jacket</span>
                                  <span class="category">Men clothes</span>
                                </div>
                                <div class="price">
                                  <span class="number">500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">2/9/2022</span>
                                <span class="location">Cairo</span>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide">
                          <div class="product card__product">
                            <span class="add__to__fav">
                              <i class="fas fa-star"></i>
                            </span>
                            <img class="product__img" src="assets/images/2.jpg" alt="product" />
                            <a href="./pages/AdDetails.html" class="product__info">
                              <div class="main__info">
                                <div class="title__category">
                                  <span class="title">Gaming PC</span>
                                  <span class="category">Tech</span>
                                </div>
                                <div class="price">
                                  <span class="number">2500</span>
                                  <span class="currency">L.E</span>
                                </div>
                              </div>
                              <div class="date__location">
                                <span class="date">4/9/2022</span>
                                <span class="location">Giza</span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>

                      <div class="top__products-pagination swiper__pagination"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="ads__banner border banner__h400">
                      <img src="assets/images/banner3.png" alt="banner" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- END PRODUCTS SECTION -->
        </div>
      </div>
    </div>
  </main>
  <!-- END MAIN SECTION -->

  <!-- START FOOTER SECTION -->
  <footer>
    <div class="top__links">
      <div class="container">
        <div class="row">
          <div class="col-xl-2">
            <div class="logo mb-5">
              <img src="assets/icons/logo.png" alt="logo" />
            </div>
          </div>
          <div class="col-xl-10">
            <div class="links">
              <div class="row">
                <div class="col-xl-4 col-md-6 mb-1">
                  <ul>
                    <a href="#">about us</a>
                    <a href="#">Careers</a>
                    <a href="#">Safety rules</a>
                    <a href="#">FAQ</a>
                    <a href="#">Terms of use</a>
                    <a href="#">Privacy Policy</a>
                  </ul>
                </div>

                <div class="col-xl-4 col-md-6">
                  <ul>
                    <a href="#">Regions map</a>
                    <a href="#">Sitemap</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Customer Support</a>
                  </ul>
                </div>

                <div class="col-xl-4 col-md-6 mt-5">
                  <a href="#" class="store__icon g-play__icon">
                    <img src="assets/icons/googlePlay.png" alt="google play" />
                  </a>
                  <a href="#" class="store__icon g-play__icon">
                    <img src="assets/icons/appStore.png" alt="google play" />
                  </a>
                  <a href="#" class="store__icon g-play__icon">
                    <img src="assets/icons/huaweiAppGallery.png" alt="google play" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bottom__bg">
      <img src="./assets/images/footerBg.png" alt="footer bg" />
    </div>
  </footer>
  <!-- END FOOTER SECTION -->

  <script src="./assets/plugins/js/swiper-bundle.min.js"></script>
  <script src="./assets/plugins/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>