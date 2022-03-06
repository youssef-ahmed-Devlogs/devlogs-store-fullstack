<?php

include 'init.php';

$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : "manage";

if($action == 'manage') {
    echo "Manage";
} elseif ($action == 'add') {

?>

    <form action="?action=insert" method="POST" enctype="multipart/form-data">
        <label for="slide_img" class="btn btn-primary">upload</label>
        <input type="file" name="slide_img" id="slide_img">

        <button>Add</button>
    </form>

<?php

} elseif ($action == 'insert') {

    echo '<pre>';
    print_r($_FILES['slide_img']);
    echo '</pre>';

}

?>

<?php
include 'includes/templates/footer.php';