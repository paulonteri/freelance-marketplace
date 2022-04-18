<?php if ($params && isset($params['job'])) {
    $job = $params['job'];
?>
<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Job proposal
    </h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->


<!-------------------------------- job -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:2px; padding-top:10px; margin-bottom:5px">
    <h2 style="text-align:left; margin-top:25px;">
        Job:
        <a href="/dashboard/freelancer/jobs/id?jobId=<?php echo $job->getId() ?>">
            <?php echo $job->getTitle(); ?>
        </a>
    </h2>
    <hr style="margin: 1rem 0;" />
    <div class="row">
        <p style="text-align:left; margin:auto 0px;">
            <?php echo $job->getDescription(); ?>
        </p>
    </div>
</div>
<!-------------------------------- end job -------------------------------------------------------->


<!-------------------------------- give proposal -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">Proposal</h2>
    <hr style="margin: 1rem 0;" />
    <form action="/dashboard/freelancer/jobs/id/proposal?jobId=<?php echo $job->getId(); ?>" method="POST">
        <fieldset>
            <input type="hidden" required name="jobId" id="jobId" value="<?php echo $job->getId(); ?>">

            <label for="title">Title</label>
            <input type="text" required name="title" id="title" value="<?php echo $params['title']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['titleError']; ?>
            </span>

            <label for="description">Description</label>
            <textarea required name="description" id="description"><?php echo $params['description']; ?></textarea>
            <span class="invalidFeedback">
                <?php echo $params['descriptionError']; ?>
            </span>


            <input class="button-primary" type="submit" <?php if ($params['proposal'] != null) { ?> disabled <?php } ?>
                value="Send">
            <?php if ($params['proposal'] != null) { ?>
            <small>Client has received your proposal.</small>
            <?php } ?>

        </fieldset>
    </form>

    <?php if ($params['proposal'] != null) {
            $proposal = $params['proposal'];
        ?>
    <hr style="margin: 3rem 0;" />
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
    <div class="" style="padding-bottom:15px; padding-top:10px;">
        <a href="/dashboard/freelancer/jobs/id/proposal?jobId=<?php echo $job->getId() ?>&withdrawProposal=true">
            <button class="button-red" <?php if ($proposal->getStatus() != 'sent') { ?> disabled <?php } ?>>
                Withdraw
            </button>
        </a>
    </div>

    <?php if ($proposal->getStatus() == 'accepted') { ?>
    <div class="" style="padding-bottom:15px; padding-top:10px;">
        <a href="/dashboard/freelancer/jobs/id/submit-work?jobId=<?php echo $job->getId() ?>">
            <button class="">
                Submit work &rarr;
            </button>
        </a>
    </div>
    <?php } ?>

    <?php } ?>
    <hr />
</div>
<!-------------------------------- end give proposal -------------------------------------------------------->

<?php

} else {
    echo "Job details not found";
}

?>