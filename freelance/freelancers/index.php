<?php
session_start();
require '../includes/db.php';
require '../partials/head.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    require '../partials/navbar.php';
    ?>

    <!-------------------------------- intro -------------------------------------------------------->
    <div class="container">
        <h1 style="text-align:center; margin-top:25px;">Top Rated Freelancers</h1>
    </div>
    <!-------------------------------- end intro -------------------------------------------------------->

    <!-------------------------------- freelancers list -------------------------------------------------------->
    <div class="container" style="margin-top:25px;">

        <?php for ($x = 0; $x <= 5; $x++) { ?>
        <!-------------------------------- freelancer -------------------------------------------------------->
        <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
            <div class="row" style="justify-content:space-between;">
                <div class="column">
                    <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">Freelancer <?php echo $x; ?></h3>
                </div>
                <div class="column ">
                    <p class="center-self-on-screen float-right-on-large-screen">5.0
                        <img src="/static/icons/rating/rating-5-stars.png"
                            style="width:100px; height:15px; margin:auto 0px;" />
                    </p>
                </div>
            </div>
            <hr style="margin: 1rem 0;" />
            <div class="row">
                <div class="column freelancer-list-image ">
                    <img src="https://via.placeholder.com/150" class="center-on-small-screen container" />
                </div>
                <div class="column freelancer-list-text">
                    <p style="text-align:left; margin:auto 0px;">Laboris nulla ea nostrud officia dolore. Commodo
                        fugiat
                        ipsum incididunt eiusmod adipisicing sunt qui. Ad elit reprehenderit non magna. Lorem ut culpa
                        adipisicing dolor ex ipsum amet exercitation deserunt consectetur eu laborum occaecat. Nisi
                        Lorem
                        culpa velit labore voluptate id ad duis dolor cillum. Do enim nisi est et mollit labore officia
                        culpa qui officia sit. Occaecat tempor aliquip qui elit dolor ad duis quis occaecat labore
                        eiusmod
                        dolor sunt.
                    </p>
                    <hr style="margin: 1rem 0;" />
                    <p style="text-align:left; margin:auto 0px;">
                        #web-development #graphic-design #python
                    </p>
                </div>
            </div>
            <hr />
            <div class="row" style="justify-content:space-between;">
                <div class="column" style="margin-bottom:5px;">
                    <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                        Nairobi, Kenya
                    </p>
                </div>
                <div class="column" style="margin-bottom:5px;">
                    <p style="text-align:center; margin:auto 0px;">Joined 4 years, 11 months ago</p>
                </div>
                <div class="column" style="margin-bottom:5px;">
                    <a href="/freelancers/id.php" <button
                        class="center-self-on-screen float-right-on-large-screen ">View</button>
                    </a>
                </div>
            </div>
        </div>
        <!-------------------------------- end freelancer -------------------------------------------------------->
        <?php } ?>

    </div>
    <!-------------------------------- end freelancers list -------------------------------------------------------->

</body>

<?php
require '../partials/footer.php';
?>

</html>