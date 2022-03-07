// START HEADER SECTION
if (document.querySelector(".user-settings-list") != null) {
  const userIcon = document.querySelector(".user-icon");
  const userSettingsList = document.querySelector(".user-settings-list");
  let isUserListOpen = false;


  userIcon.addEventListener("click", (e) => {
    e.stopPropagation();
    if (isUserListOpen) {
      userSettingsList.style.display = "none";
      isUserListOpen = false;
    } else {
      userSettingsList.style.display = "block";
      isUserListOpen = true;
    }

  });

  userSettingsList.addEventListener("click", (e) => e.stopPropagation());

  window.addEventListener("click", (e) => {
    userSettingsList.style.display = "none";
    isUserListOpen = false;
  });
}

// END HEADER SECTION

// START HOME SLIDER

swiperBigView(".home__slider");

// END HOME SLIDER

// START HOME PRODUCTS SLIDER
var latestAdsSwiper = new Swiper('.latest__products', {
  lazy: true,
  navigation: {
    nextEl: `latest__products-next`,
    prevEl: `latest__products-prev`,
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    clickable: true,
    el: `latest__products-pagination`,
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
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1300: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

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

  swiperConf(".another__products", 4);
  swiperConf(".other__ads__seller", 3);

}

if(document.querySelector(".profile_page .another__products") != null) {
  swiperConf(".another__products", 3);
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
      1250: {
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
});

if (document.querySelector(".profile_page") !== null) {
  const flexIcon = document.getElementById("flex_icon");
  const colOption = document.querySelectorAll(".col_option");
  const product_card = document.querySelectorAll(".myads .card__product");

  flexIcon.addEventListener("click", changLayout);
  function changLayout(e) {
    e.target.classList.toggle("fa-th");
    colOption.forEach((item) => {
      item.classList.toggle("col-xl-12");
    });
    product_card.forEach((i) => {
      i.classList.toggle("card__product_row");
    });
  }
}

if (document.querySelector("#from_preview") !== null) {
  const formPreview = document.getElementById("from_preview");
  const cardPrdouctEdited = formPreview.querySelector(".card__product");

  let TitleSpan = cardPrdouctEdited.querySelector(".title");
  let DescSpan = cardPrdouctEdited.querySelector(".desc");
  let PriceSpan = cardPrdouctEdited.querySelector(".price .number");
  let qateogrySpan = cardPrdouctEdited.querySelector(".category");
  let locationSpan = cardPrdouctEdited.querySelector(".location");
  const EditedDate = cardPrdouctEdited.querySelector(".date");

  const EditTitle = formPreview.title;
  const EditedDesc = formPreview.desc;
  const EditedPrice = formPreview.price;
  const EditQategory = formPreview.category;
  const Editgovernorate = formPreview.governorate;
  // EditTitle.addEventListener("input", livePreivew);
  EditTitle.addEventListener("input", (e) => {
    Livepriew(e.target.value, TitleSpan, "Title");
  });

  EditedDesc.addEventListener("input", (e) => {
    Livepriew(e.target.value, DescSpan, "Description written here");
  });
  EditedPrice.addEventListener("change", (e) => {
    Livepriew(e.target.value, PriceSpan, 100);
  });

  Editgovernorate.addEventListener("change", (e) => {
    Livepriew("Egypt/" + e.target.value, locationSpan, "Egypt/cairo");
  });

  function Livepriew(value, ele, def) {
    ele.innerHTML = value == "" ? def : value;
  }

  let date = new Date();
  const year = date.getFullYear();
  const month = date.getMonth() < 10 ? "0" + date.getMonth() : date.getMonth();
  const day =
    date.getUTCDate() < 10 ? "0" + date.getUTCDate() : date.getUTCDate();

  date = `${year}-${month}-${day}`;
  EditedDate.innerHTML = date;

  const addImg = document.getElementById("ad_image");
  addImg.addEventListener("change", uplaodImg);

  let imgAge = document.querySelector(".product__img");

  function uplaodImg() {
    let file = this.files[0];

    getBase64(file);
  }

  function getBase64(file) {
    let reader = new FileReader(file);

    reader.readAsDataURL(file);
    reader.onload = function () {
      imgAge.src = reader.result;
    };
  }
}

if(document.querySelector(".categories__section") !== null) {
  let Category_button = document.querySelector(".Category_button");
  let categories__sectionSpan = document.querySelector(
      ".categories__section span"
  );
  let categories__list = document.querySelector(".categories__list");

  Category_button.addEventListener("click", () => {
    categories__sectionSpan.classList.toggle("d-none");
    categories__sectionSpan.classList.toggle("d-block");
  });

  categories__sectionSpan.addEventListener("click", () => {
    categories__sectionSpan.classList.toggle("d-none");
    categories__sectionSpan.classList.toggle("d-block");
  });

  if (window.innerWidth <= 1199) {
    categories__list.classList.remove('show');
    categories__sectionSpan.classList.toggle("d-none");
    categories__sectionSpan.classList.toggle("d-block");
  }

}