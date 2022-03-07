<?php
session_start();
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../partials/head.php';
?>

<!DOCTYPE html>



<html lang="en">

<body>
    <?php
    require __DIR__ . '/../partials/navbar.php';
    ?>

    <!-------------- ------------------ intro -------------------------------------------------------->
    <div class="container">
        <h1 style="text-align:center; margin:auto 0px;">Login</h1>
    </div>
    <!-------------- ------------------ end intro -------------------------------------------------------->

</body>

<?php
require __DIR__ . '/../partials/footer.php';
?>

</html>