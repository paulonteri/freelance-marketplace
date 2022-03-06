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
        <h1 style="text-align:center; margin-top:25px;">Task Title</h1>
    </div>
    <!-------------------------------- end intro -------------------------------------------------------->

    <!-------------------------------- job -------------------------------------------------------->
    <div class="container " style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <h2 style="text-align:left; margin-top:25px;">Details</h2>
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
                <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">

                    <b>Budget:</b> KES
                    100,000
                </p>
            </div>
            <div class="column" style="margin-bottom:5px;">
                <p style="text-align:center; margin:auto 0px;"> <b>Category:</b> #web-development </p>
            </div>
            <div class="column" style="margin-bottom:5px;">
                <p class="center-text-on-small-screen" style="text-align:right;"> <b>Posted by: </b> User </p>
            </div>
        </div>
        <hr />
    </div>
    <!-------------------------------- end job -------------------------------------------------------->



    <!-------------------------------- give quote -------------------------------------------------------->
    <div class="container " style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <h2 style="text-align:left; margin-top:25px;">Give quote</h2>
        <hr style="margin: 1rem 0;" />
        <form>
            <fieldset>
                <label for="titleField">Title</label>
                <input type="text" id="titleField">
                <label for="descriptionField">Description</label>
                <textarea id="descriptionField"></textarea>
                <input class="button-primary" type="submit" value="Send">
            </fieldset>
        </form>
        <hr />
    </div>
    <!-------------------------------- end give quote -------------------------------------------------------->



</body>

<?php
require '../partials/footer.php';
?>

</html>