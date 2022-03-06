<?php
session_start();
require '../../includes/db.php';
require '../../partials/head.php';
?>

<!DOCTYPE html>
<html lang="en">


<body>
    <?php
    require '../../partials/navbar.php';
    ?>

    <!-------------- ------------------ header -------------------------------------------------------->

    <div class="container" style="margin-top:50px;">
        <h1 style="text-align:center; margin-bottom:50px;">Your freelancer dashboard</h1>
        <div class="row">
            <div class="column" style="margin-top:40px;">
                <h2>Freelancer</h2>
                <hr style="margin: 1rem 0;" />
                <h3>Jobs</h3>
                <a href="/dashboard/freelancer/jobs">View jobs assigned to you &rarr; </a>
                <hr style="margin: 1rem 0;" />
                <h3>Quotes</h3>
                <a href="/dashboard/freelancer/quotes.php">View quotes given &rarr; </a>
            </div>
        </div>
    </div>
    <hr />
    <!-------------- ------------------ end header -------------------------------------------------------->




</body>

<?php
require '../../partials/footer.php';
?>

</html>