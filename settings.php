<?php

ob_start();
session_start();

$pageTitle = "Profile";
include './init.php';

if (isset($_SESSION['username'])) {

    $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'edit';

    $currentUserId = $_SESSION['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$currentUserId]);
    $user = $stmt->fetch();


    if ($action == 'edit') {

?>

        <!-- START MAIN SECTION -->
        <main class="settings_page">

            <form action="?action=update" method="POST" enctype="multipart/form-data">
                <div class="profile_bg_section">
                    <!-- Cover Image -->
                    <?php if (!empty($user['cover_image'])) { ?>
                        <img src="./uploads/users/<?php echo $user['cover_image'] ?>" class="bg_img" alt="">
                    <?php } else { ?>
                        <img src="./assets/images/sider.jpg " class="bg_img" alt="">
                    <?php } ?>

                    <label for="cover_image">
                        <i class="fas fa-images"></i>
                    </label>
                    <input type="file" name="cover_image" id="cover_image" onchange="this.form.submit()">
                </div>
                <div class="container">
                    <div class="middel_section">

                        <div class="profile_img">
                            <!-- Profile Image -->
                            <?php if (!empty($user['profile_image'])) { ?>
                                <img src="./uploads/users/<?php echo $user['profile_image'] ?>" alt="">
                            <?php } else { ?>
                                <img src="assets/images/user-empty.png" alt="">
                            <?php } ?>
                            <label for="profile_image">
                                <i class="fas fa-image"></i>
                            </label>
                            <input type="file" name="profile_image" id="profile_image" onchange="this.form.submit()">
                        </div>
                    </div>

                    <div>
                        <?php
                        if (isset($_SESSION['formErrors'])) {
                            // Print all errors
                            foreach ($_SESSION['formErrors'] as $e) {
                                echo "<div class='alert alert-danger'>$e</div>";
                            }

                            $_SESSION['formErrors'] = [];
                        }
                        ?>

                    </div>

                    <div class="row">
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="fullname" class="mb-1">Full name</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Update your full name" value="<?php echo $user['fullname'] ?>" />
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="username" class="mb-1">Username</label>
                                <input type="text" name="username" id="username" placeholder="Update your username" value="<?php echo $user['username'] ?>" />
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="email" class="mb-1">Email</label>
                                <input type="email" name="email" id="email" placeholder="Update your email" value="<?php echo $user['email'] ?>" />
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country">
                                    <option value="egypt" <?php echo $user['country'] == 'egypt' ? 'selected' : '' ?> />
                                    Egypt
                                    </option>
                                    <option value="usa" <?php echo $user['country'] == 'usa' ? 'selected' : '' ?>>
                                        USA
                                    </option>
                                    <option value="saudi" <?php echo $user['country'] == 'saudi' ? 'selected' : '' ?>>
                                        Saudi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="old_password" class="mb-1">Old Password</label>
                                <input type="password" name="old_password" id="old_password" placeholder="Enter old password" />
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="new_password" class="mb-1">New Password</label>
                                <input type="password" name="new_password" id="new_password" placeholder="Enter new password" />
                            </div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="form-group">
                                <label for="confirm_password" class="mb-1">Confirm New Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" />
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
        </main>
        <!-- END MAIN SECTION -->

<?php

    } elseif ($action == 'update') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get images from form
            $profileImg     = $_FILES['profile_image'];
            $profileImgName = $profileImg['name'];
            $profileImgSize = $profileImg['size'];
            $profileImgType = $profileImg['type'];
            $profileImgTmp  = $profileImg['tmp_name'];

            $coverImg       = $_FILES['cover_image'];
            $coverImgName   = $coverImg['name'];
            $coverImgSize   = $coverImg['size'];
            $coverImgType   = $coverImg['type'];
            $coverImgTmp    = $coverImg['tmp_name'];

            // Set images settings
            $profileImgName = 'devlogs-img' . rand(0, 8888888) * 700 . $profileImgName;
            $profileImgType = explode('/', $profileImgType);
            $profileImgType = end($profileImgType);

            $coverImgName = 'devlogs-img' . rand(0, 9999999) * 400 . $coverImgName;
            $coverImgType = explode('/', $coverImgType);
            $coverImgType = end($coverImgType);

            // Valid image
            $validSize = (1024 * 5) * 1024; // 5MB
            $validExtensions = ['png', 'jpg', 'jpeg'];

            // Get variables from form
            $fullname       = filter_var($_POST['fullname'], FILTER_SANITIZE_SPECIAL_CHARS);
            $username       = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email          = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $country        = filter_var($_POST['country'], FILTER_SANITIZE_SPECIAL_CHARS);
            $oldPass        = filter_var($_POST['old_password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $newPass        = filter_var($_POST['new_password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmPass    = filter_var($_POST['confirm_password'], FILTER_SANITIZE_SPECIAL_CHARS);

            // Validation
            $formErrors = [];

            // Profile image
            if (!empty($profileImg['name']) && !in_array($profileImgType, $validExtensions)) {
                $formErrors[] = 'Profile image extension must be : (jpg, png, jpeg)';
            } elseif (!empty($profileImg['name']) && $profileImgSize > $validSize) {
                $formErrors[] = 'Profile image size must be less than 5MB';
            }

            // Cover image
            if (!empty($coverImg['name']) && !in_array($coverImgType, $validExtensions)) {
                $formErrors[] = 'Cover image extension must be : (jpg, png, jpeg)';
            } elseif (!empty($coverImg['name']) && $coverImgSize > $validSize) {
                $formErrors[] = 'Cover image size must be less than 5MB';
            }

            // Full name
            if (empty($fullname)) {
                $formErrors[] = "Full Name can't be empty.";
            }

            // Username
            if (empty($username)) {
                $formErrors[] = "Username can't be empty.";
            }

            // Email
            if (empty($email)) {
                $formErrors[] = "Email can't be empty.";
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $formErrors[] = "Enter a valid email.";
            }

            // Country
            if (empty($country)) {
                $formErrors[] = "Country can't be empty.";
            }

            // Password
            if (!empty($oldPass)) {

                if (strlen($oldPass) < 6) {
                    $formErrors[] = "Old password can't be less than 6 characters.";
                }

                if (empty($newPass)) {
                    $formErrors[] = "New password can't be empty.";
                } elseif (strlen($newPass) < 6) {
                    $formErrors[] = "New password can't be less than 6 characters.";
                }

                if (empty($confirmPass)) {
                    $formErrors[] = "Confirm password can't be empty.";
                } elseif ($newPass !== $confirmPass) {
                    $formErrors[] = "New password and confirm password not match.";
                }
            } elseif (empty($oldPass) && !empty($newPass) || !empty($confirmPass)) {
                $formErrors[] = "Old password can't be empty.";
            }

            // Set form errors in session
            $_SESSION['formErrors'] = $formErrors;

            if (empty($formErrors)) {

                // Check if username is not exist
                $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND id <> ?");
                $stmt->execute([$username, $currentUserId]);

                if ($stmt->rowCount() > 0) {
                    $formErrors[] = "This username is already exist.";
                    $_SESSION['formErrors'] = $formErrors;
                    header('location: settings.php');
                }

                // Check if email is not exist
                $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id <> ?");
                $stmt->execute([$email, $currentUserId]);

                if ($stmt->rowCount() > 0) {
                    $formErrors[] = "This email is already exist.";
                    $_SESSION['formErrors'] = $formErrors;
                    header('location: settings.php');
                }

                // Check if old password is correct
                if (!empty($oldPass)) {
                    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? AND password = ? ");
                    $stmt->execute([$username, sha1($oldPass)]);

                    if ($stmt->rowCount() <= 0) {
                        $formErrors[] = "Old password is wrong.";
                        $_SESSION['formErrors'] = $formErrors;
                        header('location: settings.php');
                    }
                }


                if (empty($_SESSION['formErrors'])) {

                    // if profile image uploaded move to uploads folder
                    if (!empty($profileImg['name'])) {
                        move_uploaded_file($profileImgTmp, 'uploads/users/' . $profileImgName);
                    } else {
                        $stmt = $conn->prepare("SELECT profile_image FROM users WHERE id = ?");
                        $stmt->execute([$currentUserId]);

                        $profileImgName = $stmt->fetchColumn();
                    }

                    // if cover image uploaded move to uploads folder
                    if (!empty($coverImg['name'])) {
                        move_uploaded_file($coverImgTmp, 'uploads/users/' . $coverImgName);
                    } else {
                        $stmt = $conn->prepare("SELECT cover_image FROM users WHERE id = ?");
                        $stmt->execute([$currentUserId]);

                        $coverImgName = $stmt->fetchColumn();
                    }

                    // Check if password not change from user get old from database
                    if (empty($newPass)) {
                        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
                        $stmt->execute([$username]);

                        $newPass = $stmt->fetchColumn();
                    } else {
                        $newPass = sha1($newPass);
                    }


                    // Update user data if database
                    $stmt = $conn->prepare("UPDATE
                                                        users
                                                 SET
                                                        fullname = ?,
                                                        username = ?,
                                                        email = ?,
                                                        country = ?,
                                                        password = ?,
                                                        profile_image = ?,
                                                        cover_image = ?
                                                    WHERE id = ? 
                                                 ");
                    $stmt->execute([$fullname, $username, $email, $country, $newPass, $profileImgName, $coverImgName, $currentUserId]);
                    header('location: settings.php');
                }
            } else {
                header('location: settings.php');
            }
        } else {
            header('location: index.php');
        }
    }
} else {
    header('location: index.php');
}

include './includes/templates/footer.php';

ob_flush();
?>