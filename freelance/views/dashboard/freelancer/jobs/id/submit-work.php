<?php if ($params && isset($params['job'])) {
    $job = $params['job'];
    $proposal = $job->getAcceptedProposal();
?>
<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Work done for job
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

    <div class="row">
        <p class="" style="padding-top:15;">
            <a href="/dashboard/freelancer/jobs/id/proposal?jobId=<?php echo $job->getId() ?>">
                View proposal &rarr;
            </a>
        </p>
    </div>
</div>
<!-------------------------------- end job -------------------------------------------------------->


<!-------------------------------- submit work -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">Submit work</h2>
    <hr style="margin: 1rem 0;" />

    <?php if (!$job->hasWorkSubmitted()) { ?>
    <form action="/dashboard/freelancer/jobs/id/submit-work?jobId=<?php echo $job->getId(); ?>"
        enctype="multipart/form-data" method="POST">
        <fieldset>
            <input type="hidden" required name="jobId" id="jobId" value="<?php echo $job->getId(); ?>">

            <label for="description">Description</label>
            <textarea required name="description" id="description"><?php echo $params['description']; ?></textarea>
            <span class="invalidFeedback">
                <?php echo $params['descriptionError']; ?>
            </span>

            <label for="attachment">Attachment</label>
            <input type="file" name="attachment" id="attachment">
            <p style="margin-top:0;"><small>Select zip file</small></p>
            <span class="invalidFeedback">
                <?php echo $params["attachmentError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Submit">
        </fieldset>
    </form>

    <?php } else {  ?>

    <p>
        You have already submitted work for this job.
    </p>
    <b>Status:</b>
    <span style="text-transform: uppercase;">
        <?php echo $proposal->getStatus(); ?>
    </span>

    <?php } ?>
</div>
<!-------------------------------- end submit work -------------------------------------------------------->

<!-------------------------------- rating -------------------------------------------------------->
<?php if ($job->hasFreelancerRating()) {
        $rating = $proposal->getFreelancerRating();
    ?>
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">Rating</h2>
    <hr style="margin: 1rem 0;" />

    <p><b>Rating: </b><?php echo $rating->getRating(); ?>/5
        <img src="<?php echo $rating->getRatingImage(); ?>" style="width:100px; height:15px; margin:auto 0px;" />
    </p>

    <p><b>Comment: </b><?php echo $rating->getComment(); ?></p>

    <hr style="margin: 1rem 0;" />
    <h2 style="text-align:left; margin-top:25px;">Rate client</h2>
    <a href="/dashboard/freelancer/jobs/id/rate-client?jobId=<?php echo $job->getId() ?>">
        <button class="">
            Rate &rarr;
        </button>
    </a>

</div>
<?php }  ?>
<!-------------------------------- end rating -------------------------------------------------------->


<?php
} else {
    echo "Job details not found";
}
?>