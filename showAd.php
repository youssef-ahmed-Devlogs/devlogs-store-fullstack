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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
  <link rel="stylesheet" href="../assets/plugins/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon" />

  <!-- siwper -->
  <link rel="stylesheet" href="../assets/plugins/css/swiper-bundle.min.css" />

  <link rel="stylesheet" href="../assets/plugins/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/AdDetails.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="/assets/css/adDetails.css" />
  <link rel="stylesheet" href="/assets/css/header.css" />
  <link rel="stylesheet" href="/assets/css/main.css" />
</head>

<body>
  <!-- START HEADER SECTION -->
  <header>
    <div class="container">
      <div class="header__content">
        <div class="left-header">
          <a href="../index.html" class="logo">
            <img src="../assets/icons/logo.png" alt="Logo" />
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
              <img src="../assets/icons/eg_flag.png" alt="arabic" title="arabic" />
            </span>
          </div>
          <div class="nav-links">
            <a href="./addAd.html" class="button-border button-secondary-blue">
              <i class="fas fa-plus"></i>
              <span>Add Ad</span>
            </a>
          </div>
          <div class="user-settings">
            <div class="user-icon">
              <img src="../assets/icons/user-pic1.jpg" alt="user picture" title="user picture" />
            </div>

            <ul class="user-settings-list">
              <a href="./profile.html" class="user-settings-link">
                <div class="user-icon">
                  <img src="../assets/icons/user-pic1.jpg" alt="user picture" title="user picture" />
                </div>
                Profile
              </a>
              <a href="./myAds.html" class="user-settings-link">
                <i class="fas fa-ad"></i>
                My Ads
              </a>
              <a href="./messages.html" class="user-settings-link">
                <i class="fas fa-envelope"></i>
                Messages
              </a>
              <a href="./addAd.html" class="user-settings-link">
                <i class="fas fa-plus"></i>
                Add ad
              </a>
              <a href="./favourite.html" class="user-settings-link">
                <i class="fas fa-star"></i>
                Favourite
              </a>
              <a href="./settings.html" class="user-settings-link">
                <i class="fas fa-cog"></i>
                Settings
              </a>
              <a href="./logout.html" class="user-settings-link">
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
  <main class="ad__deials__page">
    <div class="container">
      <div class="main-content">
        <div class="container">
          <div class="row">
            <div class="col-xl-9 col-12">
              <div class="left-section"></div>

              <div class="products__content mt-3">
                <h2 class="section__head mt-4">Other adds for this seller</h2>

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
                    <div class="swiper-slide">
                      <div class="product card__product">
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="../assets/images/1.png" alt="product" />
                        <a href="./AdDetails.html" class="product__info">
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
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="../assets/images/1.png" alt="product" />
                        <a href="./AdDetails.html" class="product__info">
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
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="../assets/images/1.png" alt="product" />
                        <a href="./AdDetails.html" class="product__info">
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
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="../assets/images/1.png" alt="product" />
                        <a href="./AdDetails.html" class="product__info">
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
                        <span class="add__to__fav">
                          <i class="fas fa-star"></i>
                        </span>
                        <img class="product__img" src="../assets/images/1.png" alt="product" />
                        <a href="./AdDetails.html" class="product__info">
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
                  </div>

                  <div class="other__ads__seller-pagination swiper__pagination"></div>
                </div>
              </div>
            </div>
            <!-- rignt section -->
            <div class="col-xl-3 col-12">
              <div class="right-section">
                <span class="triangle text-center d-block mb-2">40<span class="dollar__sign">L.E</span></span>
                <a href="#" class="button button-secondary-blue mb-1 w-100">
                  <i class="far fa-envelope-open"></i>
                  <span>send message</span>
                </a>
                <!-- calling -->
                <button class="button button-secondary-blue mb-1 w-100">
                  <i class="fas fa-phone"></i>
                  <span>011 89 33 254</span>
                </button>
                <!-- any thing -->
                <div class="important-tips">
                  <h3 class="section__head-sm">important Tips</h3>
                  <ol>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>
                      Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet..
                    </li>
                  </ol>
                </div>
              </div>

              <!-- START CATEGORIES SECTION -->

              <div class="categories__section mt-3">
                <h2 class="section__head-sm">Categories</h2>
                <ul class="categories__list">
                  <a href="#">Categories 1</a>
                  <a href="#">Categories 2</a>
                  <a href="#">Categories 3</a>
                  <a href="#">Categories 4</a>
                  <a href="#">Categories 5</a>
                  <a href="#">Categories 6</a>
                  <a href="#">Categories 7</a>
                </ul>
              </div>

              <!-- END CATEGORIES SECTION-->

              <!-- map section -->
              <div class="map__img">
                <img src="../assets/images/map.png" class="w-100" alt="map image" />
                <div class="map__description">
                  <div>
                    <i class="fas fa-compass"></i>
                  </div>
                  <div>
                    <p>Cario city</p>
                    <a href="#">show on the map</a>
                  </div>
                </div>
              </div>
              <!-- end of map -->
              <div class="user__details ad__publisher mt-2">
                <div>
                  <img src="../assets/icons/user-pic2.jpg" alt="user image" />
                </div>
                <div>
                  <h5><a href="profile.html">Adham</a></h5>
                </div>
                <p class="text-center mt-1">On site since Apr 2017</p>
              </div>
            </div>
            <!-- end of right section -->
          </div>

          <div class="products__content mt-3">
            <h2 class="section__head mt-4">Another products</h2>
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
                <div class="swiper-slide">
                  <div class="product card__product">
                    <span class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </span>
                    <img class="product__img" src="../assets/images/1.png" alt="product" />
                    <a href="./AdDetails.html" class="product__info">
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
                    <span class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </span>
                    <img class="product__img" src="../assets/images/1.png" alt="product" />
                    <a href="./AdDetails.html" class="product__info">
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
                    <span class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </span>
                    <img class="product__img" src="../assets/images/1.png" alt="product" />
                    <a href="./AdDetails.html" class="product__info">
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
                    <span class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </span>
                    <img class="product__img" src="../assets/images/1.png" alt="product" />
                    <a href="./AdDetails.html" class="product__info">
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
                    <span class="add__to__fav">
                      <i class="fas fa-star"></i>
                    </span>
                    <img class="product__img" src="../assets/images/1.png" alt="product" />
                    <a href="./AdDetails.html" class="product__info">
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
              </div>

              <div class="another__products-pagination swiper__pagination"></div>
            </div>
          </div>
        </div>
        <!-- right section -->
      </div>

      <div class="container">
        <div class="row mt-4">
          <div class="col-lg-9 col-12">
            <h3 class="section__head">contact center</h3>
            <div class="form-content">
              <div class="phone">
                <!-- icom -->

                <!-- form -->
              </div>
              <form>
                <input class="w-100 mb-2" type="email" placeholder="email" />
                <textarea class="w-100" name="message" id="textarea" placeholder="message"></textarea>
                <div class="custom-file">
                  <label class="button-secondary-blue mt-2" for="uploadAttachment"><span><i class="fas fa-link"></i></span> upload
                    Attachment</label>

                  <input type="file" id="uploadAttachment" />
                </div>
              </form>
              <div class="add_attachment">
                <!-- <div>
                    <a href="">Add attachment</a>
                  </div> -->

                <div>
                  <button class="button-secondary-blue">
                    <span><i class="fas fa-paper-plane"></i></span>send
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="ads__banner h-100 border">
              Blank space for advertisement
            </div>
          </div>
        </div>
      </div>
      <!-- comment section -->
    </div>
  </main>
  <!-- END MAIN SECTION -->

  <!-- START FOOTER SECTION -->
  <footer></footer>
  <!-- END FOOTER SECTION -->
  <script src="../assets/plugins/js/swiper-bundle.min.js"></script>
  <script src="../assets/plugins/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
  <script src="../data/data.json"></script>
  <script src="../assets/js/main.js"></script>
</body>

</html>