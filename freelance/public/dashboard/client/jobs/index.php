<?php
session_start();
require '../../../../includes/db.php';
require '../../../../partials/head.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    require '../../../../partials/navbar.php';
    ?>

    <!-------------------------------- intro -------------------------------------------------------->
    <div class="container">
        <h1 style="text-align:center; margin-top:25px;">Your Jobs</h1>
    </div>
    <!-------------------------------- end intro -------------------------------------------------------->

    <!-------------------------------- jobs list -------------------------------------------------------->
    <div class="container" style="margin-top:25px;">

        <?php for ($x = 0; $x <= 5; $x++) { ?>
            <!-------------------------------- job -------------------------------------------------------->
            <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
                <div class="row" style="justify-content:space-between;">
                    <div class="column">
                        <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">Task <?php echo $x; ?></h3>
                    </div>
                    <div class="column">
                        <p class="center-text-on-small-screen" style="text-align:right;">by Client <?php echo $x; ?></p>
                    </div>
                </div>
                <hr style="margin: 1rem 0;" />
                <div class="row">
                    <p style="text-align:left; margin:auto 0px;">Laboris nulla ea nostrud officia dolore. Commodo fugiat
                        ipsum incididunt eiusmod adipisicing sunt qui. Ad elit reprehenderit non magna. Lorem ut culpa
                        adipisicing dolor ex ipsum amet exercitation deserunt consectetur eu laborum occaecat. Nisi Lorem
                        culpa velit labore voluptate id ad duis dolor cillum. Do enim nisi est et mollit labore officia
                        culpa qui officia sit. Occaecat tempor aliquip qui elit dolor ad duis quis occaecat labore eiusmod
                        dolor sunt.
                    </p>
                </div>
                <hr />
                <div class="row" style="justify-content:space-between;">
                    <div class="column" style="margin-bottom:5px;">
                        <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">Budget: KES
                            <?php echo $x * 10000 + 10000; ?>
                        </p>
                    </div>
                    <div class="column" style="margin-bottom:5px;">
                        <p style="text-align:center; margin:auto 0px;">Category <?php echo $x; ?></p>
                    </div>
                    <div class="column" style="margin-bottom:5px;">
                        <a href="/dashboard/client/jobs/id.php">
                            <button class="center-self-on-screen float-right-on-large-screen ">
                                View job
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-------------------------------- end job -------------------------------------------------------->
        <?php } ?>

    </div>
    <!-------------------------------- end jobs list -------------------------------------------------------->

</body>

<?php
require '../../../../partials/footer.php';
?>

</html>