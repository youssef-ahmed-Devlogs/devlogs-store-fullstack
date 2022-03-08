<?php

include 'init.php';

$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : "manage";

if($action == 'manage') {
    echo "Manage";
} elseif ($action == 'add') {

?>

    <main class="section">
        <div class="container">

            <h1 class="section__head-xl mb-5">Add new slide</h1>

            <form action="?action=insert" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="slide_img" class="btn btn-secondary">Upload Slide Image</label>
                    <input type="file" name="slide_img" id="slide_img">
                </div>

                <button class="btn btn-primary mt-4">Add</button>
            </form>
        </div>
    </main>

<?php

} elseif ($action == 'insert') {

    // Image upload settings and validation
    $slideImg       = $_FILES['slide_img'];
    $slideImgName   = $slideImg['name'];
    $slideImgType   = $slideImg['type'];
    $slideImgSize   = $slideImg['size'];
    $slideImgTmp    = $slideImg['tmp_name'];

    // Set random name for image
    $slideImgName = 'olx-image-' . (rand(rand(0, 1000000), 9999999) * 200) . $slideImgName;

    // Get image extension
    $slideImgType = explode('/', $slideImgType);
    $slideImgType = end($slideImgType);

    // Validation
    $validSize = (5 * 1024) * 1024; // 5MB
    $validExtensions = ['jpg', 'png', 'jpeg'];
    $formErrors = [];

    if(empty($slideImgName)) {
        $formErrors[] = "Slide image can't be empty.";
    } elseif (!in_array($slideImgType, $validExtensions)) {
        $formErrors[] = "Slide image extension must be : (jpg, png, jpeg).";
    }

    if($slideImgSize > $validSize) {
        $formErrors[] = "Slide image must be less than 5MB.";
    }


    if(empty($formErrors)) {
        // Move image to uploads folder
        move_uploaded_file($slideImgTmp, 'uploads/' . $slideImgName);

        // Insert image name to database
        $stmt = $conn->prepare("INSERT INTO slider(image) VALUES(:image)");
        $stmt->execute([
                "image" => $slideImgName
        ]);

        header('location: slider.php');
    }

}

?>

<?php
include 'includes/templates/footer.php';