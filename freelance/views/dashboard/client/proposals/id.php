<?php if ($params && isset($params['proposal'])) {
    $proposal = $params['proposal'];
    $job = $proposal->getJob();
    $freelancer = $proposal->getFreelancer();
?>
<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Proposal for job: <?php echo $job->getTitle(); ?>
    </h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- proposal -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">
        Proposal Details
    </h2>
    <hr style="margin: 1rem 0;" />
    <div class="row" style="justify-content:space-between;">
        <div class="column">
            <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
                Title: <?php echo $proposal->getTitle(); ?>
            </h3>
        </div>
        <div class="column">
            <p class="center-text-on-small-screen" style="text-align:right;">
                by Freelancer:
                <a href="/freelancers/id?freelancerId=<?php echo $freelancer->getId(); ?>">
                    <?php echo $proposal->getFreelancer()->getUser()->getName(); ?>
                </a>
            </p>
        </div>
    </div>
    <div class="row" style="padding-bottom:25px;">
        <div class=" column">
            <p style="text-align:left; margin:auto 0px;">
                <b>Description: </b> <?php echo $proposal->getDescription(); ?>
            </p>
        </div>
    </div>
    <hr style="margin: 1rem 0;" />
    <div class="row" style="justify-content:space-between;">
        <div class="column">
            <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                <b>Date proposed:</b>
                <script type="text/javascript">
                formatDateToHumanCalendar("<?php echo $proposal->getTimeCreated() ?>");
                </script>
            </p>
        </div>
        <div class="column">
            <p style="text-align:center; margin:auto 0px;">
                <b>Proposal status:</b>
                <span style="text-transform: uppercase;">
                    <?php echo $proposal->getStatus(); ?>
                </span>
            </p>
        </div>
        <div class="column">
            <p style="text-align:center; margin:auto 0px;">
                <b>Skills: </b>
                <?php foreach ($job->getSkills() as $skill) {
                        echo "#" . $skill->getName() . "  ";
                    } ?>
            </p>
        </div>
    </div>
</div>
</div>
<!-------------------------------- end proposal -------------------------------------------------------->

<!-------------------------------- job -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">
        Job Details
    </h2>
    <hr style="margin: 1rem 0;" />
    <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
        Title:
        <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId() ?>">
            <?php echo $job->getTitle(); ?>
        </a>
    </h3>

    <div class="row">
        <p style="text-align:left; margin:auto 0px;">
            <?php echo $job->getDescription(); ?>
        </p>

        <?php if ($job->getImage()) { ?>
        <img src="<?php echo $job->getImage(); ?>" class="center-on-small-screen container" />
        <?php } ?>

    </div>

    <hr />

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
    <hr style="margin: 1rem 0;" />
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
            <p class="center-text-on-small-screen" style="text-align:right;">
                <b>Client:</b>
                Posted by you
            </p>
        </div>
    </div>
</div>
<!-------------------------------- end job -------------------------------------------------------->

<?php if ($proposal->getStatus() == 'sent') { ?>
<div class="container" style="padding-bottom:10px; padding-top:25px;">
    <a href="/dashboard/client/proposals/id?proposalId=<?php echo $proposal->getId() ?>&acceptProposal=true">
        <button style="margin: auto !important; display: flex !important;">
            Accept proposal &rarr;
        </button>
    </a>
</div>

<div class="container" style="padding-bottom:55px; padding-top:10px;">
    <a href="/dashboard/client/proposals/id?proposalId=<?php echo $proposal->getId() ?>&rejectProposal=true">
        <button class="button-red" style="margin: auto !important; display: flex !important;">
            Reject proposal &rarr;
        </button>
    </a>
</div>
<?php } ?>

<?php

} else {
    echo "Proposal details not found";
}

?>