<?php if ($params && isset($params['client'])) {
    $client = $params['client'];
?>
<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Client: <?php echo $client->getTitle(); ?>
    </h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->


<!-------------------------------- client -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">
        Client Details
    </h2>
    <hr style="margin: 1rem 0;" />
    <p><b>Type:</b> <?php echo $client->getType(); ?></p>

    <hr style="margin: 1rem 0;" />
    <p class="">
        <b>Overall rating: </b>
        <?php echo $client->getAverageRating(); ?>
        <img src="<?php echo $client->getAverageRatingImage(); ?>" style="width:100px; height:15px; margin:auto 0px;" />
    </p>

    <hr style="margin: 1rem 0;" />
    <div class="row">
        <p style="text-align:left;">
            <?php echo $client->getDescription(); ?>
        </p>
    </div>
    <div class="row">
        <?php if ($client->getImage()) { ?>
        <img src="<?php echo $client->getImage(); ?>" class="center-on-small-screen container" />
        <?php } ?>
    </div>

    <hr />

    <!-------------------------------- reviews -------------------------------------------------------->
    <h2 style="text-align:left;">
        Reviews
    </h2>
    <?php foreach ($client->getAllRatings() as $rating) { ?>
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

    <?php if (count($client->getAllRatings()) == 0) { ?>
    <p style="text-align:center;">
        No reviews yet.
    </p>
    <?php } ?>

    <!-------------------------------- end reviews -------------------------------------------------------->


</div>
<!-------------------------------- end client -------------------------------------------------------->

<?php

} else {
    echo "Client details not found";
}

?>