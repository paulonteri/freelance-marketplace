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
<div class="container " style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">
        Client Details
    </h2>
    <hr style="margin: 1rem 0;" />
    <p><b>Type:</b> <?php echo $client->getType(); ?></p>
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

</div>
<!-------------------------------- end client -------------------------------------------------------->

<?php

} else {
    echo "Client details not found";
}

?>