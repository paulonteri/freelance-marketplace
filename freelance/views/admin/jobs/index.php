<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Jobs</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- jobs list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <table>

        <tr>
            <th>Title</th>
            <th>Duration</th>
            <th>Date posted</th>
            <th>Budget</th>
            <th>View</th>
        </tr>

        <?php foreach ($params["jobs"] as $job) { ?>
        <!-------------------------------- job -------------------------------------------------------->
        <tr>
            <td><?php echo $job->getTitle(); ?></td>
            <td><?php echo $job->getExpectedDurationInHours(); ?> hours</td>
            <td>
                <small>
                    <script type="text/javascript">
                    formatDateToHumanCalendar("<?php echo $job->getTimeCreated(); ?>");
                    </script>
                </small>
            </td>
            <td>
                KES <?php echo $job->getBudget() ?>
            </td>
            <td>
                <a href="/admin/jobs/id?jobId=<?php echo $job->getId(); ?>">
                    <p class="  ">
                        View &rarr;
                    </p>
                </a>
            </td>

        </tr>
        <!-------------------------------- end job -------------------------------------------------------->
        <?php } ?>

    </table>

</div>
<!-------------------------------- end jobs list -------------------------------------------------------->