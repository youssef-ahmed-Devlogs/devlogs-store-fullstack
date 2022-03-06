<?php

include 'init.php';

$action = isset($_GET['action']) && !empty($_GET['action']) $_GET['action'] : "manage";

//if() {
//
//}
?>

    <form action="">
        <label for="slide_img" class="btn btn-primary">upload</label>
        <input type="file" name="slide_img" id="slide_img">
    </form>

<?php
include 'includes/templates/footer.php';