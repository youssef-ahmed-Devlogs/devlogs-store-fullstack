<?php

ob_start();
session_start();

if (isset($_SESSION['username'])) {


  $pageTitle = "My Ads";
  include './init.php';

  $currentUserID = $_SESSION['id'];
  $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'manage';

  if ($action == 'manage') {

    $sort = isset($_GET['sort']) && !empty($_GET['sort']) ? $_GET['sort'] : 'desc';
    $sortby = isset($_GET['sort_by']) && !empty($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
    $search = isset($_GET['search']) && !empty($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

    $stmt = $conn->prepare("SELECT * FROM ads
                              WHERE user_id = ?
                              AND title LIKE ?
                              ORDER BY $sortby $sort
                          ");
    $stmt->execute([$currentUserID, $search]);
    $ads = $stmt->fetchAll();

?>

<main class="myAds-page section">
    <div class="container">
        <h1 class="section__head-xl mb-5">My Ads</h1>

        <div class="table-responsive">

            <div class="top-settings d-flex align-items-center justify-content-between mb-2">
                <div class="left">
                    <div class="button-group">
                        <small>Add new</small>
                        <a href="myAds.php?action=add" class="btn btn-primary" title="Add new ad">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <span class="ads-count">You have a [ <strong><?php echo count($ads) ?></strong> ] ads</span>
                </div>
                <div class="right">
                    <form class="d-flex align-items-center gap-2">
                        <div class="form-group">
                            <label for="">Search</label>
                            <input type="text" name="search" placeholder="Ad title?"
                                value="<?php echo isset($_GET['search'])  ? $_GET['search'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Sort By</label>
                            <select name="sort_by" onchange="this.form.submit()">
                                <option value="id" <?php echo $sortby == 'id' ? 'selected' : '' ?>>ID</option>
                                <option value="added_date" <?php echo $sortby == 'added_date' ? 'selected' : '' ?>>Added
                                    Date</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sort type</label>
                            <select name="sort" onchange="this.form.submit()">
                                <option value="desc" <?php echo $sort == 'desc' ? 'selected' : '' ?>>Descending</option>
                                <option value="asc" <?php echo $sort == 'asc' ? 'selected' : '' ?>>Ascending</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($ads as $ad) { ?>
                    <tr>
                        <td>
                            <img style="width: 100px;" src="./assets/images/item-empty-img.png" alt="">
                        </td>
                        <td>
                            <?php echo $ad['title'] ?>
                        </td>
                        <td>
                            <?php echo $ad['price'] ?>EGP
                        </td>
                        <td>
                            <?php echo $ad['added_date'] ?>
                        </td>
                        <td>
                            <span
                                class="badge rounded-pill <?php echo $ad['publish_state'] == 'pending' ? 'bg-warning' : 'bg-info' ?> ">
                                <?php echo $ad['publish_state'] ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">


                                <div class="button-group">
                                    <small>Show</small>
                                    <a href="showAd.php?id=<?php echo $ad['id'] ?>" class="btn btn-secondary"
                                        title="Show">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <div class="button-group">
                                    <small>Edit</small>
                                    <a href="myAds.php?action=edit&adid=<?php echo $ad['id'] ?>" class="btn btn-success"
                                        title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div>
                                <div class="button-group">
                                    <small>Delete</small>
                                    <a href="myAds.php?action=delete&adid=<?php echo $ad['id'] ?>"
                                        class="btn btn-danger" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>


            <!-- If no has ads posted -->
            <?php

          if (count($ads) == 0) { ?>

            <div class="page-empty text-center">
                <div>
                    <img src="assets/images/myads-empty.png" alt="">
                    <span>You have no ads posted at the moment.</span>

                    <a href="myAds.php?action=add" class="btn btn-primary" title="Add new ad">
                        <i class="fas fa-plus"></i> Add new ad
                    </a>
                </div>
            </div>

            <?php } ?>
        </div>

    </div>
</main>

<?php

  } elseif ($action == 'add') { ?>



<main class="addAd-page section">
    <div class="container">

        <?php

        if (isset($_SESSION['formErrors'])) {

          foreach ($_SESSION['formErrors'] as $e) {
            echo "<div class='alert alert-danger'>$e</div>";
          }
        }

        $_SESSION['formErrors'] = [];

        ?>
        <h1 class="section__head-xl mb-5">Add Ad</h1>

        <form action="?action=insert" method="POST">

            <div class="row">
                <div class="col-xl-8 mb-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control mt-1"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="desc" class="form-control mt-1" placeholder="Description"
                                    cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control mt-1"
                                    placeholder="Price">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="phone_number">phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control mt-1"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="governorate">Governorate</label>
                                <select name="governorate" id="governorate" class="form-control mt-1">
                                    <option value="">
                                        Select
                                    </option>
                                    <option value="cairo">
                                        Cairo
                                    </option>
                                    <option value="giza">
                                        Giza
                                    </option>
                                    <option value="alex">
                                        Alex
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="item_status">Item Status</label>
                                <select name="item_status" id="item_status" class="form-control mt-1">
                                    <option value="">
                                        Select
                                    </option>
                                    <option value="new">
                                        New
                                    </option>
                                    <option value="like new">
                                        Like new
                                    </option>
                                    <option value="used">
                                        Used
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control mt-1">
                                    <option value="">
                                        Select
                                    </option>
                                    <?php
                      $stmt = $conn->prepare("SELECT * FROM categories");
                      $stmt->execute();
                      $categories = $stmt->fetchAll();

                      foreach ($categories as $category) {
                      ?>
                                    <option value="<?php echo $category['id'] ?>">
                                        <?php echo $category['title'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <button class="btn btn-primary">Add</button>
                </div>
                <div class="col-xl-4">
                    <div class="product card__product">
                        <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                        <div class="product__info">
                            <div class="main__info">
                                <div class="title__category">
                                    <span class="title">
                                        Title
                                    </span>
                                    <span class="category">
                                        Phones
                                    </span>
                                </div>
                                <div class="price">
                                    <span class="number">
                                        534
                                    </span>
                                    <span class="currency">EGP</span>
                                </div>
                            </div>
                            <p class="desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia tempora nam quidem dolorem
                                enim nostrum asperiores magni accusamus ut incidunt...
                            </p>
                            <div class="date__location">
                                <span class="date">
                                    2022-03-02
                                </span>
                                <span class="location">
                                    Egypt/Cairo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</main>


<?php

  } elseif ($action == 'insert') {


    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $title              = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
      $desc               = filter_var($_POST['desc'], FILTER_SANITIZE_SPECIAL_CHARS);
      $price              = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
      $phoneNumber        = filter_var($_POST['phone_number'], FILTER_SANITIZE_SPECIAL_CHARS);
      $governorate        = filter_var($_POST['governorate'], FILTER_SANITIZE_SPECIAL_CHARS);
      $itemStatus         = filter_var($_POST['item_status'], FILTER_SANITIZE_SPECIAL_CHARS);
      $categoryId         = filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS);

      // Validation
      $formErrors = [];

      if (empty($title)) {
        $formErrors[] = "Title can't be empty.";
      } elseif (strlen($title) < 8) {
        $formErrors[] = "Title can't be less than 8 characters.";
      }

      if (empty($desc)) {
        $formErrors[] = "Description can't be empty.";
      } elseif (strlen($desc) < 20) {
        $formErrors[] = "Description can't be less than 20 characters.";
      }

      if (empty($price) || $price <= 0) {
        $formErrors[] = "Price can't be empty.";
      }

      if (empty($phoneNumber)) {
        $formErrors[] = "Phone Number can't be empty.";
      }

      if (empty($governorate)) {
        $formErrors[] = "Governorate can't be empty.";
      }

      if (empty($itemStatus)) {
        $formErrors[] = "Item Status can't be empty.";
      }

      if (empty($categoryId)) {
        $formErrors[] = "Category Status can't be empty.";
      }

      // Save errors in session to show in add ad page
      $_SESSION['formErrors'] = $formErrors;

      // Add ad
      if (empty($formErrors)) {

        $stmt = $conn->prepare('INSERT INTO
                                  ads(title, description, price, phone_number, governorate, item_status, user_id, category_id, added_date)
                                  VALUES(:title, :desc, :price, :phone_number, :governorate, :item_status, :user_id, :category_id, NOW())
                              ');
        $stmt->execute([
          "title"          => $title,
          "desc"           => $desc,
          "price"          => $price,
          "phone_number"   => $phoneNumber,
          "governorate"    => $governorate,
          "item_status"    => $itemStatus,
          "user_id"        => $currentUserID,
          "category_id"    => $categoryId,
        ]);

        // Redirect to the My Ads page
        header("location: myAds.php");
      } else {
        // Redirect to the add ad page to show form errors from session
        header("location: myAds.php?action=add");
      }
    }
  } elseif ($action == 'edit') {

    $adid = isset($_GET['adid']) && is_numeric($_GET['adid']) ? intval($_GET['adid']) : 0;

    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ? AND user_id = ?");
    $stmt->execute([$adid, $currentUserID]);
    $ad = $stmt->fetch();


    if ($stmt->rowCount() > 0) {

    ?>

<main class="editAd-page section">
    <div class="container">

        <?php

          if (isset($_SESSION['formErrors'])) {

            foreach ($_SESSION['formErrors'] as $e) {
              echo "<div class='alert alert-danger'>$e</div>";
            }
          }

          $_SESSION['formErrors'] = [];

          ?>
        <h1 class="section__head-xl mb-5">Edit Ad</h1>

        <form action="?action=update" method="POST">
            <input type="hidden" name="adid" value="<?php echo $ad['id'] ?>">
            <div class="row">
                <div class="col-xl-8 mb-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control mt-1" placeholder="Title"
                                    value="<?php echo $ad['title'] ?>">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="desc" class="form-control mt-1" placeholder="Description"
                                    cols="30" rows="10"><?php echo $ad['description'] ?></textarea>

                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control mt-1"
                                    placeholder="Price" value="<?php echo $ad['price'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="phone_number">phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control mt-1"
                                    placeholder="Phone Number" value="<?php echo $ad['phone_number'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="governorate">Governorate</label>
                                <select name="governorate" id="governorate" class="form-control mt-1">
                                    <option value="cairo" <?php echo $ad['governorate'] == "cairo" ? "selected" : "" ?>>
                                        Cairo
                                    </option>
                                    <option value="giza" <?php echo $ad['governorate'] == "giza" ? "selected" : "" ?>>
                                        Giza
                                    </option>
                                    <option value="alex" <?php echo $ad['governorate'] == "alex" ? "selected" : "" ?>>
                                        Alex
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="item_status">Item Status</label>
                                <select name="item_status" id="item_status" class="form-control mt-1">
                                    <option value="new" <?php echo $ad['item_status'] == "new" ? "selected" : "" ?>>
                                        New
                                    </option>
                                    <option value="like new"
                                        <?php echo $ad['item_status'] == "like new" ? "selected" : "" ?>>
                                        Like new
                                    </option>
                                    <option value="used" <?php echo $ad['item_status'] == "used" ? "selected" : "" ?>>
                                        Used
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control mt-1">
                                    <?php
                        $stmt = $conn->prepare("SELECT * FROM categories");
                        $stmt->execute();
                        $categories = $stmt->fetchAll();

                        foreach ($categories as $category) {
                        ?>
                                    <option value="<?php echo $category['id'] ?>"
                                        <?php echo $category['id'] == $ad['category_id'] ? 'selected' : '' ?>>
                                        <?php echo $category['title'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <button class="btn btn-primary">Edit</button>
                </div>
                <div class="col-xl-4">
                    <div class="product card__product">
                        <img class="product__img" src="./assets/images/item-empty-img.png" alt="product" />
                        <div class="product__info">
                            <div class="main__info">
                                <div class="title__category">
                                    <span class="title">
                                        Title
                                    </span>
                                    <span class="category">
                                        Phones
                                    </span>
                                </div>
                                <div class="price">
                                    <span class="number">
                                        534
                                    </span>
                                    <span class="currency">EGP</span>
                                </div>
                            </div>
                            <p class="desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia tempora nam quidem dolorem
                                enim nostrum asperiores magni accusamus ut incidunt...
                            </p>
                            <div class="date__location">
                                <span class="date">
                                    2022-03-02
                                </span>
                                <span class="location">
                                    Egypt/Cairo
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</main>

<?php

    } else {
      header('location: index.php');
    }
  } elseif ($action == "update") {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $adid               = filter_var($_POST['adid'], FILTER_SANITIZE_NUMBER_INT);
      $title              = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
      $desc               = filter_var($_POST['desc'], FILTER_SANITIZE_SPECIAL_CHARS);
      $price              = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
      $phoneNumber        = filter_var($_POST['phone_number'], FILTER_SANITIZE_SPECIAL_CHARS);
      $governorate        = filter_var($_POST['governorate'], FILTER_SANITIZE_SPECIAL_CHARS);
      $itemStatus         = filter_var($_POST['item_status'], FILTER_SANITIZE_SPECIAL_CHARS);
      $categoryId         = filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS);


      // Validation
      $formErrors = [];

      if (empty($title)) {
        $formErrors[] = "Title can't be empty.";
      } elseif (strlen($title) < 8) {
        $formErrors[] = "Title can't be less than 8 characters.";
      }

      if (empty($desc)) {
        $formErrors[] = "Description can't be empty.";
      } elseif (strlen($desc) < 20) {
        $formErrors[] = "Description can't be less than 20 characters.";
      }

      if (empty($price) || $price <= 0) {
        $formErrors[] = "Price can't be empty.";
      }

      if (empty($phoneNumber)) {
        $formErrors[] = "Phone Number can't be empty.";
      }

      if (empty($governorate)) {
        $formErrors[] = "Governorate can't be empty.";
      }

      if (empty($itemStatus)) {
        $formErrors[] = "Item Status can't be empty.";
      }

      if (empty($categoryId)) {
        $formErrors[] = "Category Status can't be empty.";
      }

      // Save errors in session to show in edit ad page
      $_SESSION['formErrors'] = $formErrors;

      // Update ad
      if (empty($formErrors)) {

        $adid = is_numeric($adid) ? intval($adid) : 0;


        if ($adid > 0) {

          $stmt = $conn->prepare("UPDATE
                                      ads
                                  SET
                                      title = ?,
                                      description = ?,
                                      price = ?,
                                      phone_number = ?,
                                      governorate = ?,
                                      item_status = ?,
                                      category_id  = ?,
                                      publish_state = 'pending'
                                  WHERE id = ?
                                ");
          $stmt->execute([$title, $desc, $price, $phoneNumber, $governorate, $itemStatus, $categoryId, $adid]);

          // Redirect to the My Ads page
          header("location: myAds.php");
        } else {

          // Redirect to home page if ad id is empty or not numeric
          header('location: index.php');
        }
      } else {
        // Redirect to the edit ad page to show form errors from session
        header("location: myAds.php?action=edit&adid=$adid");
      }
    } else {
      // Redirect to My Ads page if user not comed from post request
      header('location: myAds.php');
    }
  } elseif ($action == 'delete') {

    $adid = isset($_GET['adid']) && is_numeric($_GET['adid']) ? intval($_GET['adid']) : 0;

    if ($adid > 0) {
      $stmt = $conn->prepare('DELETE FROM ads WHERE id = ? AND user_id = ?');
      $stmt->execute([$adid, $currentUserID]);
      header('location: myAds.php');
    } else {
      header('location: myAds.php');
    }
  } else {
    // Redirect to Home page if action not equal any action from above
    header('location: index.php');
  }

  include "./includes/templates/footer.php";
} else {

  // Redirect to Home page if user not login
  header('location: index.php');
}

ob_flush();