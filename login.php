<?php
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control mb-3" placeholder="example: ahmed" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter a strong password" />
      </div>
      <button class="btn btn-primary mt-3">Login</button>
    </form>

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

?>