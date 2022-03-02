<?php

include './init.php';

?>

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


<?php

include './includes/templates/footer.php';

?>