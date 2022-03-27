<?php if ($params && isset($params['job'])) {
    $job = $params['job'];
?>
<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Give proposal
    </h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->


<!-------------------------------- job -------------------------------------------------------->
<div class="container " style="padding-bottom:2px; padding-top:10px; margin-bottom:5px">
    <h2 style="text-align:left; margin-top:25px;">
        Job: <?php echo $params['job']->getTitle(); ?>
    </h2>
    <hr style="margin: 1rem 0;" />
    <div class="row">
        <p style="text-align:left; margin:auto 0px;">
            <?php echo $job->getDescription(); ?>
        </p>
    </div>
    <hr />
</div>
<!-------------------------------- end job -------------------------------------------------------->


<!-------------------------------- give proposal -------------------------------------------------------->
<div class="container " style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">Submit proposal</h2>
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

            <input class="button-primary" type="submit" value="Send">
        </fieldset>
    </form>
    <hr />
</div>
<!-------------------------------- end give proposal -------------------------------------------------------->

<?php

} else {
    echo "Job details not found";
}

?>