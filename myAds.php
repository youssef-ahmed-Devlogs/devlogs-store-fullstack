<?php

ob_start();
session_start();

if (isset($_SESSION['username'])) {


  $pageTitle = "Homepage";
  include './init.php';

  $currentUserID = $_SESSION['id'];
  $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'show';

  if ($action == 'show') {


    $stmt = $conn->prepare("SELECT * FROM ads WHERE ads.user_id = ?");
    $stmt->execute([$currentUserID]);
    $ads = $stmt->fetchAll();

?>

    <main class="myAds-page section">
      <div class="container">
        <h1 class="mb-5">My Ads [ <?php echo count($ads) ?> ]</h1>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($ads as $ad) { ?>
                <tr style="vertical-align: middle;">
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
                    <a href="myAds.php?action=edit&adid=<?php echo $ad['id'] ?>" class="btn btn-success" title="Edit">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="myAds.php?action=delete&adid=<?php echo $ad['id'] ?>" class="btn btn-danger" title="Delete">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>

      </div>
    </main>

    <?php

  } elseif ($action == 'edit') {

    $adid = isset($_GET['adid']) && is_numeric($_GET['adid']) ? intval($_GET['adid']) : 0;

    $stmt = $conn->prepare("SELECT * FROM ads WHERE id = ? AND user_id = ?");
    $stmt->execute([$adid, $currentUserID]);
    $ad = $stmt->fetch();


    if ($stmt->rowCount() > 0) {

    ?>


      <main class="myAds-page section">
        <div class="container">
          <h1 class="mb-5">Edit Ad</h1>

          <form action="">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control mt-1" placeholder="Title" value="<?php echo $ad['title'] ?>">
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="desc">Description</label>
                  <input type="text" name="desc" id="desc" class="form-control mt-1" placeholder="Description" value="">
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" name="price" id="price" class="form-control mt-1" placeholder="Price" value="">
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="phone_number">phone Number</label>
                  <input type="number" name="phone_number" id="phone_number" class="form-control mt-1" placeholder="Phone Number" value="">
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="governorate">Governorate</label>
                  <select name="governorate" id="governorate" class="form-control mt-1">
                    <option value="">Select</option>
                    <option value="cairo">Cairo</option>
                    <option value="giza">Giza</option>
                    <option value="alex">Alex</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <div class="form-group">
                  <label for="item_status">Item Status</label>
                  <select name="item_status" id="item_status" class="form-control mt-1">
                    <option value="">Select</option>
                    <option value="new">New</option>
                    <option value="like_new">Like new</option>
                    <option value="used">Used</option>
                  </select>
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
  }

  include "./includes/templates/footer.php";
} else {
  header('location: index.php');
}

ob_flush();
