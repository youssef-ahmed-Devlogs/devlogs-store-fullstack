<?php
ob_start();
session_start();

if (isset($_SESSION['username'])) {
  header("location: index.php");
}

$pageTitle = "Login";
include './init.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {



  // Get inputs value from form
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
  $password = $_POST['password'];
  $hashPass = sha1($password);

  // Validation
  $formErrors = [];

  if (empty($username)) {
    $formErrors[] = "Username can't be empty.";
  } elseif (strlen($username) < 3) {
    $formErrors[] = "Username can't be less than 3 characters.";
  }

  if (empty($password)) {
    $formErrors[] = "Password can't be empty.";
  } elseif (strlen($password) < 6) {
    $formErrors[] = "Password can't be less than 6 characters.";
  }

  // Check if this user in database and password is correct
  if (empty($formErrors)) {

    // Check if this user in database
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {

      // Check if this password is correct
      $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
      $stmt->execute([$username, $hashPass]);
      $userData = $stmt->fetch();


      if ($stmt->rowCount() > 0) {

        // Set user session
        $_SESSION['username'] = $userData['username'];
        $_SESSION['id'] = $userData['id'];

        // Redirect to Homepage
        header("location: index.php");
      } else {
        $formErrors[] = "This password is not correct.";
      }
    } else {
      $formErrors[] = "This user is not registered. <a href='register.php' class='text-primary'>Create a new account ?</a>";
    }
  }
}

?>


<!-- START MAIN SECTION -->
<main class="login-page section">
  <div class="container">
    <div class="main-content">
      <div class="login_form">
        <div class="form-content">
          <div class="page_title text-right">
            <h1>Welcom back</h1>
          </div>
          <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" novalidate>
            <div class="form-group mb-3">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="username" id="username" placeholder="example: ahmed" required>
              <div class="invalid-feedback">
                Please write a username.
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Enter a strong password" required>
              <div class="invalid-feedback">
                Please write a password.
              </div>
            </div>
            <button class="btn mt-3 login_btn">Login</button>
          </form>
        </div>
      </div>
      <div class="righ_sec_img">
        <img src="assets/images/login.svg" alt="">
      </div>
    </div>

    <?php if (!empty($formErrors)) { ?>
      <div class="backend__errors mt-4">
        <?php

        foreach ($formErrors as $e) {
          echo "<div class='alert alert-danger'>$e</div>";
        }

        ?>
      </div>
    <?php } ?>

  </div>
</main>
<!-- END MAIN SECTION -->

<?php

include './includes/templates/footer.php';
ob_flush();
?>