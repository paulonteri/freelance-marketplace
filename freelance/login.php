<?php
session_start();
require 'includes/db.php';
require 'partials/head.php';
?>

<!DOCTYPE html>



<html lang="en">

<body>
    <?php
    require '../partials/navbar.php';
    ?>

    <!-------------- ------------------ intro -------------------------------------------------------->
    <div class="container">
        <h1 style="text-align:center; margin:auto 0px;">Login</h1>
    </div>
    <!-------------- ------------------ end intro -------------------------------------------------------->

</body>

<?php
require 'partials/footer.php';
?>

</html>