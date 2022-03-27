<?php if ($params && isset($params['freelancer'])) {
    $freelancer = $params['freelancer'];
?>

<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        <?php echo $freelancer->getUser()->getName(); ?>
    </h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- freelancer -------------------------------------------------------->
<div class="container" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">

    <!-- <h3 style=" margin:auto 0px; text-align:center" class="">Name </h3> -->

    <hr style="margin: 1rem 0;" />
    <!-------------------------------- bio & skills -------------------------------------------------------->
    <div class="row">
        <div class="column freelancer-list-image ">
            <?php if ($freelancer->getUser()->getImage()) { ?>
            <img src="<?php echo $freelancer->getUser()->getImage(); ?>" class="center-on-small-screen container" />
            <?php } ?>
        </div>
        <div class="column freelancer-list-text">
            <h2 style="text-align:left; margin:auto 0px;">
                Bio
            </h2>
            <p style="text-align:left; margin:auto 0px;">
                <?php echo $freelancer->getDescription(); ?>
            </p>
            <hr style="margin: 1rem 0;" />
            <h2 style="text-align:left; margin:auto 0px;">
                Skills
            </h2>
            <p style="text-align:left; margin:auto 0px;">
                <?php foreach ($freelancer->getSkills() as $skill) {
                        echo "#" . $skill->getName() . "  ";
                    } ?>
            </p>
        </div>
    </div>
    <!-------------------------------- end bio & skills -------------------------------------------------------->
    <hr />
    <!-------------------------------- location, date joined & rating -------------------------------------------------------->
    <div class="row" style="justify-content:space-between;">
        <div class="column" style="margin-bottom:5px;">
            <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                <b>Location: </b>
                <?php echo $freelancer->getUser()->getCity(); ?>,
                <?php echo $freelancer->getUser()->getCountry(); ?>
            </p>
        </div>
        <div class="column" style="margin-bottom:5px;">
            <p style="text-align:center; margin:auto 0px;">
                <b>Joined: </b>
                <script type="text/javascript">
                formatDateToHumanCalendar("<?php echo $freelancer->getTimeCreated(); ?>");
                </script>
            </p>
        </div>
        <div class="column " style="margin-bottom:5px;">
            <p class="center-text-on-small-screen float-right-on-large-screen">
                <b>Overall rating:</b>
                5.0
                <img src="/static/icons/rating/rating-5-stars.png" style="width:100px; height:15px; margin:auto 0px;" />
            </p>
        </div>
    </div>
    <!-------------------------------- end location, date joined & rating -------------------------------------------------------->
    <hr />
    <!-------------------------------- reviews -------------------------------------------------------->
    <h2 style="text-align:left;">
        Reviews
    </h2>
    <?php for ($x = 0; $x <= 5; $x++) { ?>
    <!-------------------------------- single review -------------------------------------------------------->
    <div class="rounded-corners" style="margin-bottom:10px">
        <div class="row " style="justify-content:space-between;">
            <div class="column">
                <p style=" margin:auto 0px;" class="center-text-on-small-screen">User <?php echo $x; ?></p>
            </div>
            <div class="column ">
                <p class="center-self-on-screen float-right-on-large-screen">4.0
                    <img src="/static/icons/rating/rating-4-stars.png"
                        style="width:100px; height:15px; margin:auto 0px;" />
                </p>
            </div>

        </div>
        <p style="text-align:center;">
            Quis elit occaecat fugiat laborum minim reprehenderit consequat nisi ipsum qui aliquip magna non dolor.
            Ex consequat et sit nostrud amet deserunt mollit adipisicing deserunt esse. Eiusmod non ex veniam est
            pariatur cupidatat dolor exercitation proident labore fugiat deserunt. Irure magna excepteur officia
            irure eiusmod est aliqua enim non nisi elit et excepteur id.
        </p>
    </div>
    <!-------------------------------- end single review -------------------------------------------------------->
    <?php } ?>
    <!-------------------------------- end reviews -------------------------------------------------------->
</div>

<?php

} else {
    echo "Freelancer details not found";
}

?>