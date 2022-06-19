<?php if ($params && isset($params['job']) && isset($params['proposal'])) {
    $job = $params['job'];
    $proposal = $params['proposal'];
?>

    <!-------------------------------- intro -------------------------------------------------------->
    <div class="container">
        <h1 style="text-align:center; margin-top:25px;">Review and Complete Job</h1>
    </div>
    <!-------------------------------- end intro -------------------------------------------------------->




    <!-------------------------------- submission -------------------------------------------------------->
    <div class="container rounded-corners background-color-gray" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <h2 style="text-align:left; margin-top:25px;">Submission Details</h2>
        <hr style="margin: 1rem 0;" />
        <h3>Summary</h3>
        <p>
            <?php echo $proposal->getSubmissionDescription(); ?>
        </p>
        <hr style="margin: 1rem 0;" />
        <h3>Attachments</h3>
        <p>
            <a href="<?php echo $proposal->getSubmissionAttachment(); ?>" download>
                Download zip file &darr;
            </a>
        </p>
    </div>
    <!-------------------------------- end submission -------------------------------------------------------->

    <!-------------------------------- job -------------------------------------------------------->
    <div class="container rounded-corners background-color-gray" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <h2 style="text-align:left; margin-top:25px;">Job</h2>
        <p>
            <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId() ?>">
                View job &rarr;
            </a>
        </p>
        <p>
            <a href="/dashboard/client/proposals/id?proposalId=<?php echo $proposal->getId() ?>">
                View proposal &rarr;
            </a>
        </p>
    </div>
    <!-------------------------------- end job -------------------------------------------------------->


    <!-------------------------------- mark complete -------------------------------------------------------->
    <div class="container rounded-corners background-color-gray" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <h2 style="text-align:left; margin-top:25px;">Mark Task as Complete</h2>
        <hr style="margin: 1rem 0;" />

        <?php if ($proposal->getStatus() == 'completed unsuccessfully') { ?>
            <p>The work has been rejected.</p>
        <?php } ?>

        <?php if ($proposal->getStatus() == 'completed successfully') { ?>
            <p>The work has been accepted.</p>
        <?php } ?>

        <?php if ($proposal->getStatus() == 'work submitted') { ?>
            <form action="/dashboard/client/jobs/id/review-and-complete?jobId=<?php echo $job->getId(); ?>" method="POST">
                <fieldset>
                    <input type="hidden" name="jobId" id="jobId" value="<?php echo $job->getId(); ?>">

                    <label for="comment">Public review (Comment)</label>
                    <textarea id="comment" name="comment"></textarea>
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
                    <input class="" type="submit" value="Accept" <?php if ($proposal->getStatus() != 'work submitted') { ?> disabled <?php } ?>>
                    <p><small>Accept work and close job.</small></p>

                </fieldset>
            </form>


            <a href="/dashboard/client/jobs/id/review-and-complete?jobId=<?php echo $job->getId() ?>&rejectWork=true">
                <button class="button-red" <?php if ($proposal->getStatus() != 'work submitted') { ?> disabled <?php } ?>>
                    Reject
                </button>
            </a>
            <p><small>Reject work and close job.</small></p>
        <?php } ?>
    </div>
    <!-------------------------------- end mark complete -------------------------------------------------------->

    <!-------------------------------- rating -------------------------------------------------------->
    <?php if ($job->hasClientRating()) {
        $rating = $proposal->getClientRating();
    ?>
        <div class="container rounded-corners background-color-gray" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
            <h2 style="text-align:left; margin-top:25px;">Rating</h2>
            <small>Rating given to you by the freelancer.</small>
            <hr style="margin: 1rem 0;" />

            <p><b>Rating: </b><?php echo $rating->getRating(); ?>/5
                <img src="<?php echo $rating->getRatingImage(); ?>" style="width:100px; height:15px; margin:auto 0px;" />
            </p>

            <p><b>Comment: </b><?php echo $rating->getComment(); ?></p>


        </div>
    <?php }  ?>
    <!-------------------------------- end rating -------------------------------------------------------->



<?php

} else {
    echo "Job details not found";
}

?>