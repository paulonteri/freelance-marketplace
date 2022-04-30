<?php if ($params && isset($params['job'])) {
    $job = $params['job'];

    $freelancer = app\models\UserModel::getCurrentUser()->getFreelancer();

    $proposal = $job->getFreelancerProposal($freelancer->getId());
?>

<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">
        Rate Client
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


<!-------------------------------- rate client -------------------------------------------------------->
<div class="container rounded-corners background-color-gray"
    style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
    <h2 style="text-align:left; margin-top:25px;">Rate</h2>
    <hr style="margin: 1rem 0;" />

    <?php if (!$job->hasClientRating()) { ?>
    <form action="/dashboard/freelancer/jobs/id/rate-client?jobId=<?php echo $job->getId(); ?>" method="POST">
        <fieldset>
            <input type="hidden" required name="jobId" id="jobId" value="<?php echo $job->getId(); ?>">

            <label for="comment">Public review (Comment)</label>
            <textarea required id="comment" name="comment"></textarea>
            <span class="invalidFeedback">
                <?php echo $params['commentError']; ?>
            </span>

            <label for="rating">Rating</label>
            <select id="rating" name="rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
            <span class="invalidFeedback">
                <?php echo $params['ratingError']; ?>
            </span>

            <hr style="margin: 1rem 0;" />
            <input class="" type="submit" value="Rate">

        </fieldset>
    </form>

    <?php } else {  ?>
    <p>Already rated!</p>
    <?php } ?>

</div>
<!-------------------------------- end rate client -------------------------------------------------------->


<?php

} else {
    echo "Job details not found";
}

?>