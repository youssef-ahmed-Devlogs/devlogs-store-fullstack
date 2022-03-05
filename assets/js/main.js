// START HEADER SECTION
if (document.querySelector(".user-settings-list") != null) {
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

  notificationsSettingsList.addEventListener("click", (e) =>
    e.stopPropagation()
  );

  window.addEventListener("click", (e) => {
    userSettingsList.style.display = "none";
    isUserListOpen = false;

    notificationsSettingsList.style.display = "none";
    isNotiListOpen = false;
  });
}

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

// validation for the forms

(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

let requiredInputs = document.querySelectorAll("input[required]");

requiredInputs.forEach((item) => {
  let formGroup = item.parentElement;
  let star = document.createElement("div");
  star.classList.add("star");
  star.innerText = "*";
  formGroup.append(star);
  console.log(formGroup);
});

const gridIcon = document.getElementById("grid_icon");
const colOption = document.querySelectorAll(".col_option");
const product_card = document.querySelectorAll(".card__product");

gridIcon.addEventListener("click", changLayout);

function changLayout() {
  colOption.forEach((item) => {
    item.classList.toggle("col-lg-12");
  });
  product_card.forEach((i) => {
    i.classList.add("card__product_row");
  });
}
