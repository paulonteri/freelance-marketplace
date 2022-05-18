<?php if ($params && isset($params['job'])) {
    $job = $params['job'];
?>

<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Confirm payment for job </h1>
    <p style="text-align:center; margin:auto 0px;">
        <small>
            (Job title: <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId() ?>">
                <?php echo $job->getTitle(); ?>
            </a>)
        </small>
    </p>

    <hr />

    <?php if ($job->hasBeenPaidFor()) { ?>

    <p>
        Payment is complete Thank you, Freelancers should start posting proposals soon!
        <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId(); ?>">
            Go to job &rarr;
        </a>
    </p>

    <?php } else { ?>

    <p><b>You should have received a payment request from Mpesa on your device:</b></p>
    <p>
        Completed payment? Thank you, Freelancers should start posting proposals soon!
        <a href="/dashboard/client/jobs/id?jobId=<?php echo $job->getId(); ?>">
            Go to job &rarr;
        </a>
    </p>
    <p>
        Something went wrong?
        <a href="/dashboard/client/jobs/id/pay?jobId=<?php echo $job->getId(); ?>">
            &larr; Retry
        </a>
    </p>

    <?php } ?>
</div>

<?php

} else {
    echo "Job details not found";
}

?>