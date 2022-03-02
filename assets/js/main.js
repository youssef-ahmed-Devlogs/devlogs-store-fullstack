// START HEADER SECTION
const userIcon = document.querySelector(".user-icon");
const userSettingsList = document.querySelector(".user-settings-list");
let isUserListOpen = false;
const notificationIcon = document.querySelector(".notification-icon");
const notificationsSettingsList = document.querySelector(
  ".notifications-settings-list"
);
let isNotiListOpen = false;

userIcon.addEventListener("click", (e) => {
  e.stopPropagation();
  if (isUserListOpen) {
    userSettingsList.style.display = "none";
    isUserListOpen = false;
  } else {
    userSettingsList.style.display = "block";
    isUserListOpen = true;
  }

  notificationsSettingsList.style.display = "none";
  isNotiListOpen = false;
});

userSettingsList.addEventListener("click", (e) => e.stopPropagation());

notificationIcon.addEventListener("click", (e) => {
  e.stopPropagation();
  if (isNotiListOpen) {
    notificationsSettingsList.style.display = "none";
    isNotiListOpen = false;
  } else {
    notificationsSettingsList.style.display = "block";
    isNotiListOpen = true;
  }

  userSettingsList.style.display = "none";
  isUserListOpen = false;
});

notificationsSettingsList.addEventListener("click", (e) => e.stopPropagation());

window.addEventListener("click", (e) => {
  userSettingsList.style.display = "none";
  isUserListOpen = false;

  notificationsSettingsList.style.display = "none";
  isNotiListOpen = false;
});

// END HEADER SECTION

// START HOME SLIDER

swiperBigView(".home__slider");

// END HOME SLIDER

// START HOME PRODUCTS SLIDER

swiperConf(".latest__products", 4);
swiperConf(".top__products", 3);

// END HOME PRODUCTS SLIDER

// START AD DETAILS PAGE

if (document.querySelector(".ad__deials__page") !== null) {
  const productCard = document.querySelectorAll(".product");
  const leftSectionContainer = document.querySelector(".left-section");
  const adPublisherContainer = document.querySelector(".ad__publisher");

  productCard.forEach((p) => {
    p.addEventListener("click", () => {
      localStorage.setItem("adid", JSON.stringify(p.dataset.adid));
    });
  });

  async function renderAdPage() {
    const adID = JSON.parse(localStorage.getItem("adid"));
    const { ads, users } = await getData();
    const { userID, title, images, details } = ads.find(
      (ad) => ad.adID == adID
    );
    const { name, profileImg, joinDate } = users.find(
      (user) => user.id == userID
    );

    function renderAdDetailsLeft() {
      // Render Ad Details Top Left Colmun | main info
      function renderProductInfo() {
        let info = [];
        for (const key in details) {
          if (key !== "description") {
            info.push(`
          <li>
          <span> ${key.replace("-", " ")} </span>
          <span>
          <strong> ${details[key]} </strong>
          </span>
          </li>
        `);
          }
        }

        return info.join("");
      }

      const content = `

        <div class="product_title_heading mt-6">
          <h2 class="section__head">${title}</h2>
        </div>

        <div class="addDetails-img fancy-gallery">
        <div>
        ${images
          .map(
            (img, i) =>
              `
              
              <a
              data-fancybox="gallery"
              data-caption="Headphone"
              href="../assets/images/${img}"
              >
              <img
                  src="../assets/images/${img}"
                  ${i == 0 ? `class="main-img first-img"` : `class="main-img"`}
                  alt=""
                />
              </a>
            
            `
          )
          .join("")}
          
        </div>
      </div>

      <div class="desc-of-items text-center">
        <div class="row">
          <div class="col">
            <div class="left-star">
              <i class="far fa-star"></i>
              <span>Add to favoite</span>
            </div>
          </div>
          <div class="col">
            <div class="right-report">
              <i class="far fa-flag"></i>
              <span> report</span>
            </div>
          </div>
          <div class="col">
            <div class="add_to_favourit">
              <i class="fas fa-shopping-bag"></i>
              <span> Add To card</span>
            </div>
          </div>
        </div>
      </div>

      <div class="product-info mb-4">
        <ul class="unstyled">
            
            ${renderProductInfo()}
            
          
        </ul>
      </div>
      <div class="product__desc">
        <h2 class="section__head">Product Description</h2>
      </div>
      <div class="product-desc">
        ${details.description}
      </div>

  
  
  `;
      leftSectionContainer.innerHTML = content;
    }

    renderAdDetailsLeft();

    // Render the ad publisher Content

    adPublisherContainer.innerHTML = `
        <div>
          <img src="../assets/icons/${profileImg}" alt="${name}" />
        </div>
        <div>
          <h5><a href="profile.html">${name}</a></h5>
        </div>
        <p class="text-center mt-1">On site since ${joinDate}</p>
    `;
  }

  renderAdPage();

  // fancy box
  if (document.querySelector(".fancy-gallery") != null) {
    Fancybox.bind('[data-fancybox="gallery"]', {
      Toolbar: true,

      caption: function (fancybox, carousel, slide) {
        let caption = slide.caption;

        return (
          (caption.length ? caption + "<br />" : "") +
          "Image " +
          (slide.index + 1) +
          " of " +
          carousel.pages.length
        );
      },
    });
  }

  swiperConf(".other__ads__seller", 3);
  swiperConf(".another__products", 4);
}

// END AD DETAILS PAGE

// Swiper Conf for many cards

function swiperConf(selector, slidesPerView) {
  var swiper = new Swiper(selector, {
    lazy: true,
    navigation: {
      nextEl: `${selector}-next`,
      prevEl: `${selector}-prev`,
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      clickable: true,
      el: `${selector}-pagination`,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: slidesPerView,
        spaceBetween: 20,
      },
    },
  });
}

// Swiper Conf one big view
function swiperBigView(selector) {
  var swiper = new Swiper(selector, {
    lazy: true,
    navigation: {
      nextEl: `${selector}-next`,
      prevEl: `${selector}-prev`,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      clickable: true,
      el: `${selector}-pagination`,
    },
  });
}

async function getData() {
  const dataResponse = await fetch("../data/data.json");
  const data = await dataResponse.json();

  return await { ...data[0] };
}
