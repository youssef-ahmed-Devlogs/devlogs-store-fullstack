<?php

include './init.php';

?>

<!-- START MAIN SECTION -->
<main class="login_style">
    <div class="container">
        <div class="main-content">
            <div class="login_form">
                <div class="form-content">
                    <div class="page_title text-right">
                        <h1>Welcom back</h1>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="example: ahmed">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="example: ahmed@gmail.com" />

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter a strong password">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" id="confirmPassword"
                            placeholder="confirm password" />
                        <button class="btn btn-primary mt-3">Login</button>
                    </form>
                </div>
            </div>
            <div class="righ_sec_img">
                <img src="assets/images/undraw.svg" alt="">
            </div>
        </div>
    </div>


</main>
<!-- END MAIN SECTION -->


<?php

include './includes/templates/footer.php';

?>