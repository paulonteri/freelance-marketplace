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
    <?php for ($x = 0; $x <= 5; $x++) { ?>
    <!-------------------------------- single review -------------------------------------------------------->
    <div class="rounded-corners background-color-white" style="margin-bottom:10px">
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
<!-------------------------------- end client -------------------------------------------------------->

<?php

} else {
    echo "Client details not found";
}

?>