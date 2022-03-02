<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> <?php echo setPageTitle(); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="./assets/images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="./assets/css/fancybox.css">
  <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
  <!-- START HEADER SECTION -->
  <header>
    <div class="container">
      <div class="header__content">
        <div class="left-header">
          <a href="index.php" class="logo">
            <img src="./assets/images/logo.png" alt="Logo" />
          </a>
        </div>
        <div class="right-header">
          <div class="user-settings">
            <div class="user">
              <div class="user-icon">
                <img src="./assets/images/user-pic1.jpg" alt="user picture" title="user picture" />
              </div>
              <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : "<a href='#'>Login</a>" ?>
            </div>

            <ul class="user-settings-list">
              <a href="./pages/profile.html" class="user-settings-link">
                <div class="user-icon">
                  <img src="./assets/images/user-pic1.jpg" alt="user picture" title="user picture" />
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