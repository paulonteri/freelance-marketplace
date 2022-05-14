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
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">

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
                <?php echo $freelancer->getAverageRating(); ?>/5
                <img src="<?php echo $freelancer->getAverageRatingImage(); ?>"
                    style="width:100px; height:15px; margin:auto 0px;" />
            </p>
        </div>
    </div>
    <!-------------------------------- end location, date joined & rating -------------------------------------------------------->
    <hr />

    <!-------------------------------- reviews -------------------------------------------------------->
    <h2 style="text-align:left;">
        Reviews
    </h2>
    <?php foreach ($freelancer->getAllRatings() as $rating) { ?>
    <!-------------------------------- single review -------------------------------------------------------->
    <div class="rounded-corners background-color-white" style="margin-bottom:10px">
        <div class="row " style="justify-content:space-between;">
            <div class="column">
                <p style=" margin:auto 0px;" class="center-text-on-small-screen">
                    Rated by:
                    <?php echo $rating->getRaterName(); ?>
                </p>
            </div>
            <div class="column ">
                <p class="center-self-on-screen float-right-on-large-screen"><?php echo $rating->getRating(); ?>
                    <img src="<?php echo $rating->getRatingImage(); ?>"
                        style="width:100px; height:15px; margin:auto 0px;" />
                </p>
            </div>

        </div>
        <p style="text-align:center;">
            <?php echo $rating->getComment(); ?>
        </p>
    </div>
    <!-------------------------------- end single review -------------------------------------------------------->
    <?php } ?>

    <?php if (count($freelancer->getAllRatings()) == 0) { ?>
    <p style="text-align:center;">
        No reviews yet.
    </p>
    <?php } ?>

    <!-------------------------------- end reviews -------------------------------------------------------->

    <hr />

    <a href="/dashboard/freelancer/profile/edit">
        <p>Edit profile &rarr;</p>
    </a>
</div>

<?php

} else {
    echo "Freelancer details not found";
}

?>