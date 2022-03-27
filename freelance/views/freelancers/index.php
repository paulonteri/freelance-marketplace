<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Top Rated Freelancers</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- freelancers list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <?php foreach ($params["freelancers"] as $freelancer) { ?>
    <!-------------------------------- freelancer -------------------------------------------------------->
    <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
                    Freelancer: <?php echo $freelancer->getUser()->getName(); ?>
                </h3>
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
                <img src="<?php echo $freelancer->getUser()->getImage(); ?>" class="center-on-small-screen container" />
            </div>
            <div class="column freelancer-list-text">
                <h4 style="text-align:left; margin:auto 0px;">
                    <?php echo $freelancer->getTitle(); ?>
                </h4>
                <hr style="margin: 1rem 0;" />
                <p style="text-align:left; margin:auto 0px;">
                    <?php echo $freelancer->getDescription(); ?>
                </p>
                <hr style="margin: 1rem 0;" />
                <p style="text-align:left; margin:auto 0px;">
                    <b>Skills: </b>
                    <?php foreach ($freelancer->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
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
                <a href="/freelancers/id?freelancerId=<?php echo $freelancer->getId(); ?>">
                    <button class=" center-self-on-screen float-right-on-large-screen ">
                        View
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-------------------------------- end freelancer -------------------------------------------------------->
    <?php } ?>

</div>
<!-------------------------------- end freelancers list -------------------------------------------------------->