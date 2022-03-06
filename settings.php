<?php

ob_start();
session_start();

$pageTitle = "Profile";
include './init.php';

if (isset($_SESSION['username'])) {

    $currentUserId = $_SESSION['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$currentUserId]);
    $user = $stmt->fetch();

    ?>


    <!-- START MAIN SECTION -->
    <main class="settings_page">

        <form action="">
            <div class="profile_bg_section">
                <img src="./assets/images/sider.jpg " class="bg_img" alt="">
                <label for="cover_image">
                    <i class="fas fa-images"></i>
                </label>
                <input type="file" name="cover_image" id="cover_image">
            </div>
            <div class="container">
                <div class="middel_section">

                        <div class="profile_img">
                            <img src="assets/images/user-pic1.jpg" alt="">
                            <label for="profile_image">
                                <i class="fas fa-image"></i>
                            </label>
                            <input type="file" name="profile_image" id="profile_image">
                        </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="fullname" class="mb-1">Full name</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Update your full name"/>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="username" class="mb-1">Username</label>
                            <input type="text" name="username" id="username" placeholder="Update your username"/>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="email" class="mb-1">Email</label>
                            <input type="email" name="email" id="email" placeholder="Update your email"/>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" id="country">
                                <option value="egypt">
                                    Egypt
                                </option>
                                <option value="usa">
                                    USA
                                </option>
                                <option value="saudi">
                                    Saudi
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="old_password" class="mb-1">Old Password</label>
                            <input type="password" name="old_password" id="old_password" placeholder="Enter old password"/>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="new_password" class="mb-1">New Password</label>
                            <input type="password" name="new_password" id="new_password" placeholder="Enter new password"/>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="form-group">
                            <label for="confirm_password" class="mb-1">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- END MAIN SECTION -->

    <?php
} else {
    header('location: index.php');
}

include './includes/templates/footer.php';

ob_flush();
?>