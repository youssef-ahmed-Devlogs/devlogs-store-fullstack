<!-- => update name
    username , country , user photo , eamil , cover Phote , password , 
-->


<?php

ob_start();
session_start();

$pageTitle = "Homepage";
include './init.php';
?>

<main class="setting_page">
    <div class="container">
        <div class="row">
            <form>
                <div class="col-lg-6">
                    <input type="text" placeholder="update your name">
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="update your name">
                </div>
            </form>
        </div>
    </div>

</main>










<?php

include './includes/templates/footer.php';

ob_flush();
?>