<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Jobs</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- jobs list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <!-------------------------------- filter -------------------------------------------------------->
    <hr style="margin: 1rem 0;" />
    <h3>Filter</h3>
    <details>
        <summary>View Filters</summary>
        <form id="formID" action="/admin/jobs" method="GET">
            <fieldset>

                <input hidden type="text" name="pageNumber" id="pageNumber"
                    value="<?php echo $params['pageNumber']; ?>">

                <label for="skills[]">Skills <small>(Select multiple)</small></label>
                <select name="skills[]" id="skills[]" multiple size="10">
                    <?php foreach ($params["allSkills"] as $skill) { ?>
                    <option value="<?php echo $skill->getId(); ?>"
                        <?php if (in_array($skill->getId(), $params['skills'])) { ?> selected <?php } ?>>
                        <?php echo $skill->getName(); ?>
                    </option>
                    <?php } ?>
                </select>
                <span class="invalidFeedback">
                    <?php echo $params["skillsError"]; ?>
                </span>

                <label for="maxDuration">Max Duration <small>(hours)</small></label>
                <input type="text" name="maxDuration" id="maxDuration" value="<?php echo $params['maxDuration']; ?>">
                <span class="invalidFeedback">
                    <?php echo $params['maxDurationError']; ?>
                </span>

                <label for="minDuration">Min Duration <small>(hours)</small></label>
                <input type="text" name="minDuration" id="minDuration" value="<?php echo $params['minDuration']; ?>">
                <span class="invalidFeedback">
                    <?php echo $params['minDurationError']; ?>
                </span>

                <label for="maxPayRatePerHour">Max Pay Rate Per Hour <small>(KES)</small></label>
                <input type="text" name="maxPayRatePerHour" id="maxPayRatePerHour"
                    value="<?php echo $params['maxPayRatePerHour']; ?>">
                <span class="invalidFeedback">
                    <?php echo $params['maxPayRatePerHourError']; ?>
                </span>

                <label for="minPayRatePerHour">Min Pay Rate Per Hour <small>(KES)</small></label>
                <input type="text" name="minPayRatePerHour" id="minPayRatePerHour"
                    value="<?php echo $params['minPayRatePerHour']; ?>">
                <span class="invalidFeedback">
                    <?php echo $params['minPayRatePerHourError']; ?>
                </span>

                <hr style="margin: 1rem 0;" />

                <input class="button-primary" type="submit" value="Submit">
            </fieldset>
        </form>

        <a href="/admin/jobs">
            <input class="button-primary" type="submit" value="Reset Filters">
        </a>
    </details>
    <!-------------------------------- end filter -------------------------------------------------------->

    <hr />

    <!-------------------------------- chart -------------------------------------------------------->
    <section class="bar-chart-container">

        <div class="bar-chart-title">Jobs Per Skill</div>
        <section class="bar-chart-chart">
            <section class="bar-chart-row-bars">
                <hr />

                <?php foreach ($params["skillPercentages"] as $skillPercentage) { ?>

                <div class="chart-row-bar" style="width:<?php echo $skillPercentage["jobsPercent"]; ?>%">
                    #<?php echo $skillPercentage["name"];  ?>
                    <?php echo $skillPercentage["jobsPercent"]; ?>%
                </div>

                <?php } ?>
                <hr />
            </section>
        </section>
    </section>
    <!-------------------------------- end chart -------------------------------------------------------->

    <hr />

    <table>
        <tr>
            <th>Title</th>
            <th>Duration</th>
            <th>Date posted</th>
            <th>Skills</th>
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
                <small>
                    <?php foreach ($job->getSkills() as $skill) {
                            echo "#" . $skill->getName() . " ";
                        } ?>
                </small>
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

    <!-------------------------------- pagination -------------------------------------------------------->
    <div class="pagination">
        <a onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', 1)">First</a>
        <?php if ($params['previousPageNumber'] > 0) { ?>
        <a
            onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', <?php echo $params['previousPageNumber']; ?> )">
            &laquo;&laquo;
        </a>
        <?php } ?>
        <a onClick="javascript:void(0)" class="active"><?php echo $params['pageNumber']; ?></a>
        <?php if ($params['nextPageNumber'] <= $params['lastPageNumber']) { ?>
        <a onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', <?php echo $params['nextPageNumber']; ?> )">
            &raquo;&raquo;
        </a>
        <?php } ?>
        <a onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', <?php echo $params['lastPageNumber']; ?> )">
            Last
        </a>
        <p style="text-align:right;"><small><?php echo $params['recordsCount'] ?> items</small></p>
    </div>
    <!-------------------------------- end pagination -------------------------------------------------------->

</div>
<!-------------------------------- end jobs list -------------------------------------------------------->