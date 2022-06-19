<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">User Logs</h1>
    <p style="text-align:center;">View more detailed logs from the server log files</p>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- logs list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <!-------------------------------- filter -------------------------------------------------------->
    <hr style="margin: 1rem 0;" />
    <h3>Filter</h3>
    <details>
        <summary>View Filters</summary>
        <form id="formID" action="/admin/users/logs" method="GET">
            <fieldset>

                <input hidden type="text" name="pageNumber" id="pageNumber"
                    value="<?php echo $params['pageNumber']; ?>">

                <input hidden type="text" name="userId" id="userId" value="<?php echo $_GET['userId']; ?>">

                <label for="types[]">Types <small>(Select multiple)</small></label>
                <select name="types[]" id="types[]" multiple size="10">
                    <?php foreach ($params["allTypes"] as $type) { ?>
                    <option <?php if (in_array($type, $params['types'])) { ?> selected <?php } ?>
                        value="<?php echo $type; ?>">
                        <?php echo $type; ?>
                    </option>
                    <?php } ?>
                </select>
                <span class="invalidFeedback">
                    <?php echo $params["typesError"]; ?>
                </span>

                <hr style="margin: 1rem 0;" />

                <input class="button-primary" type="submit" value="Submit">
            </fieldset>
        </form>

        <a href="/admin/users/logs?userId=<?php echo $_GET['userId']; ?>">
            <input class="button-primary" type="submit" value="Reset Filters">
        </a>
    </details>
    <!-------------------------------- end filter -------------------------------------------------------->


    <table style="max-width:80vw;">
        <tr>
            <th>Type</th>
            <th>Time</th>
            <th>Action</th>
            <th>IP address</th>
            <th>#</th>
        </tr>

        <?php foreach ($params["logs"] as $log) { ?>
        <!-------------------------------- log -------------------------------------------------------->
        <tr>
            <td><small><?php echo $log->getType(); ?></small></td>
            <td>
                <small>
                    <script type="text/javascript">
                    formatDateToHumanCalendarAccurate("<?php echo $log->getTimeCreated(); ?>");
                    </script>
                </small>
            </td>
            <td><small><?php echo htmlentities($log->getAction()); ?></small></td>
            <td><small><?php echo $log->getIpAddress(); ?></small></td>
            <td><small><?php echo $log->getId(); ?></small></td>
        </tr>
        <!-------------------------------- end log -------------------------------------------------------->
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
<!-------------------------------- end logs list -------------------------------------------------------->