<?php if ($params && isset($params['job'])) {
    $job = $params['job'];
?>

    <div class="container">
        <h1 style="text-align:center; margin:auto 0px;">Pay for job</h1>
        <hr />

        <?php if ($job->hasBeenPaidFor()) { ?>

            <p>
                Payment is complete Thank you, Freelancers should start posting proposals soon!
                <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId(); ?>">
                    Go to job &rarr;
                </a>
            </p>

        <?php } else { ?>

            <p>Kindly pay for the job
                (Title: <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId() ?>">
                    <?php echo $job->getTitle(); ?>
                </a>) using Mpesa to activate it.
            </p>

            <form action="/dashboard/client/jobs/id/pay?jobId=<?php echo $job->getId(); ?>" method="POST">
                <fieldset>
                    <input type="hidden" name="jobId" id="jobId" value="<?php echo $job->getId(); ?>">

                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $params["phone"]; ?>" placeholder="254703130589">
                    <span class="invalidFeedback">
                        <?php echo $params["phoneError"]; ?>
                    </span>
                    <small>Enter your Mpesa account details to initiate a STK Push on your device.</small>


                    <hr style="margin: 1rem 0;" />

                    <input class="button-primary" type="submit" value="Submit">
                </fieldset>
            </form>

        <?php } ?>

    </div>

<?php

} else {
    echo "Job details not found";
}

?>