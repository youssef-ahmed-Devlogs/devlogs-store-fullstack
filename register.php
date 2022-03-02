<?php
session_start();

if (isset($_SESSION['username'])) {
  header("location: index.php");
}

$pageTitle = "Register";
include './init.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Get inputs value from form
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $hashPass = sha1($password);


  // Validation
  $formErrors = [];

  if (empty($username)) {
    $formErrors[] = "Username can't be empty.";
  } elseif (strlen($username) < 3) {
    $formErrors[] = "Username can't be less than 3 characters.";
  }

  if (empty($email)) {
    $formErrors[] = "Email can't be empty.";
  } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    $formErrors[] = "Enter a valid email.";
  }

  if (empty($password)) {
    $formErrors[] = "Password can't be empty.";
  } elseif (strlen($password) < 6) {
    $formErrors[] = "Password can't be less than 6 characters.";
  }

  if (empty($confirmPassword)) {
    $formErrors[] = "Confirm Password can't be empty.";
  } elseif (strlen($confirmPassword) < 6) {
    $formErrors[] = "Confirm Password can't be less than 6 characters.";
  } elseif ($confirmPassword !== $password) {
    $formErrors[] = "Password and Confirm Password not match.";
  }


  // Check if this username and email in database
  if (empty($formErrors)) {

    // Check if this username in database
    $username_stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $username_stmt->execute([$username]);

    if ($username_stmt->rowCount() > 0) {
      $formErrors[] = "This username isn't available. try other username.";
    }

    // Check if this email in database
    $email_stmt = $conn->prepare("SELECT username FROM users WHERE email = ?");
    $email_stmt->execute([$email]);

    if ($email_stmt->rowCount() > 0) {
      $formErrors[] = "This email isn't available. try other email.";
    }

    if (empty($formErrors)) {

      $stmt = $conn->prepare("INSERT INTO users(username, email, password, reg_date)
                              VALUES(:username, :email, :password, NOW())
                            ");
      $stmt->execute([
        "username" => $username,
        "email" => $email,
        "password" => $hashPass
      ]);

      echo "<div class='alert alert-success'>Account has been created.</div>";
      header("refresh:3;url=login.php");
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
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control mb-3" placeholder="example: ahmed@gmail.com" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control  mb-3" placeholder="Enter a strong password" />
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="confirm password" />
      </div>
      <button class="btn btn-primary mt-3">Register</button>
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