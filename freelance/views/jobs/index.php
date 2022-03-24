<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Top Jobs Right Now</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- jobs list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <?php foreach ($params["jobs"] as $job) { ?>
    <!-------------------------------- job -------------------------------------------------------->
    <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
                    <?php echo $job->getTitle(); ?>
                </h3>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    <b>Client:</b>
                    <?php echo $job->getClient()->getTitle(); ?>
                </p>
            </div>
        </div>
        <hr style="margin: 1rem 0;" />
        <div class="row">
            <p style="text-align:left; margin:auto 0px;">
                <?php echo $job->getDescription(); ?>
            </p>
        </div>
        <hr style="margin: 1rem 0;" />
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                    <b>Proposal deadline:</b>
                    <script type="text/javascript">
                    formatDateToHumanCalendar("<?php echo $job->getReceiveJobProposalsDeadline() ?>");
                    </script>
                </p>
            </div>
            <div class="column">
                <p style="text-align:center; margin:auto 0px;">
                    <b>Duration:</b>
                    <?php echo $job->getExpectedDurationInHours(); ?> hours
                </p>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    <b>Date posted:</b>
                    <script type="text/javascript">
                    formatDateToHumanCalendar("<?php echo $job->getTimeCreated(); ?>");
                    </script>
                </p>
            </div>
        </div>
        <div class="row" style="justify-content:space-between;">
            <div class="column" style="margin-bottom:5px;">
                <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                    <b>Budget:</b>
                    KES
                    <?php echo $job->getBudget() ?>
                </p>
            </div>
            <div class="column" style="margin-bottom:5px;">
                <p style="text-align:center; margin:auto 0px;">
                    <b>Skills: </b>
                    <?php foreach ($job->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
                </p>
            </div>
            <div class="column" style="margin-bottom:5px;">
                <a href="/jobs/id?jobId=<?php echo $job->getId() ?>">
                    <button class=" center-self-on-screen float-right-on-large-screen ">
                        Give quote &rarr;
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-------------------------------- end job -------------------------------------------------------->
    <?php } ?>

</div>
<!-------------------------------- end jobs list -------------------------------------------------------->