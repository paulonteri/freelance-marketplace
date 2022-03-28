<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        <?php
        if (isset($params) && isset($params['pageTitle'])) {
            echo $params['pageTitle'];
        } else {
            echo 'Proposals given';
        }
        ?>
    </h1>

    <?php
    if (isset($params) && isset($params['pageSubTitle'])) {
        echo '<p style="text-align:center;">' . $params['pageSubTitle'] . '</p>';
    }
    ?>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- job proposals list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <?php foreach ($params["jobProposals"] as $jobProposal) {
        $job = $jobProposal->getJob();
    ?>
    <!-------------------------------- job proposal -------------------------------------------------------->
    <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <p style=" margin:auto 0px;" class="center-text-on-small-screen">
                    <b>Proposal title:</b>
                    <?php echo $jobProposal->getTitle(); ?>
                </p>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    <b>Status:</b>
                    <span style="text-transform: uppercase;">
                        <?php echo $jobProposal->getStatus(); ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="text-align:left;">
                    <b>Proposal description:</b>
                    <?php echo $jobProposal->getDescription(); ?>
                </p>
            </div>
        </div>
        <hr style="margin: 0 0;" />
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <p style=" margin:auto 0px;" class="center-text-on-small-screen">
                    <b>Job title:</b>
                    <?php echo $job->getTitle(); ?>
                </p>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    <b>Client:</b>
                    <?php echo $job->getClient()->getTitle(); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="text-align:left; margin:auto 0px;">
                    <b>Job description:</b>
                    <?php echo $job->getDescription(); ?>
                </p>
            </div>
        </div>
        <hr style="margin: 1rem 0;" />
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                    <b>Date proposed:</b>
                    <script type="text/javascript">
                    formatDateToHumanCalendar("<?php echo $jobProposal->getTimeCreated(); ?>");
                    </script>
                </p>
            </div>
            <div class="column">
                <p style="text-align:center; margin:auto 0px;">
                    <b>Job duration:</b>
                    <?php echo $job->getExpectedDurationInHours(); ?> hours
                </p>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    <b>Date job posted:</b>
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
                <a href="/dashboard/freelancer/jobs/id?jobId=<?php echo $job->getId() ?>">
                    <button class=" center-self-on-screen float-right-on-large-screen ">
                        View job &rarr;
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-------------------------------- end job proposal -------------------------------------------------------->
    <?php } ?>

</div>
<!-------------------------------- end job proposals list -------------------------------------------------------->