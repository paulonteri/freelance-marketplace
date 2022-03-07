<?php
session_start();
require __DIR__ . '/../../../includes/db.php';
require __DIR__ . '/../../../partials/head.php';
?>

<!DOCTYPE html>
<html lang="en">


<body>
    <?php
    require __DIR__ . '/../../../partials/navbar.php';
    ?>

    <!-------------- ------------------ header -------------------------------------------------------->

    <div class="container" style="margin-top:50px;">
        <h1 style="text-align:center; margin-bottom:50px;">Your client dashboard</h1>
        <div class="row">
            <div class="column" style="margin-top:40px;">
                <h2>Client</h2>
                <hr style="margin: 1rem 0;" />
                <h3>Jobs</h3>
                <a href="/dashboard/client/jobs/create">Post job &rarr; </a>
                <a href="/dashboard/client/jobs">View jobs posted by you &rarr; </a>
                <hr style="margin: 1rem 0;" />
                <h3>Quotes</h3>
                <a href="/dashboard/client/quotes">View quotes received &rarr; </a>
            </div>
        </div>
    </div>
    <hr />
    <!-------------- ------------------ end header -------------------------------------------------------->




</body>

<?php
require __DIR__ . '/../../../partials/footer.php';
?>

</html>