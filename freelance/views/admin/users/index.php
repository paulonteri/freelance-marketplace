<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Users</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- users list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <form id="formID" action="/admin/users" method="GET">
        <fieldset>
            <input hidden type="text" name="pageNumber" id="pageNumber" value="<?php echo $params['pageNumber']; ?>">
        </fieldset>
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Is Admin</th>
            <th>Date joined</th>
            <th>View</th>
            <th>Logs</th>

        </tr>

        <?php foreach ($params["users"] as $user) { ?>
            <!-------------------------------- user -------------------------------------------------------->
            <tr>
                <td><?php echo $user->getName(); ?></td>
                <td>
                    <?php
                    if ($user->getIsAdmin()) {
                        echo '&#9989;';
                    } else {
                        echo "&#10060;";
                    }
                    ?>
                </td>
                <td>
                    <small>
                        <script type="text/javascript">
                            formatDateToHumanCalendar("<?php echo $user->getTimeCreated(); ?>");
                        </script>
                    </small>
                </td>
                <td>
                    <a href="/admin/users/id?userId=<?php echo $user->getId(); ?>">
                        <p class="  ">
                            View &rarr;
                        </p>
                    </a>
                </td>
                <td>
                    <a href="/admin/users/logs?userId=<?php echo $user->getId(); ?>">
                        <p class="  ">
                            &rarr;
                        </p>
                    </a>
                </td>
            </tr>
            <!-------------------------------- end user -------------------------------------------------------->
        <?php } ?>

    </table>


    <!-------------------------------- pagination -------------------------------------------------------->
    <div class="pagination">
        <a onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', 1)">First</a>
        <?php if ($params['previousPageNumber'] > 0) { ?>
            <a onClick="changeInputValueAndSubmitForm('formID', 'pageNumber', <?php echo $params['previousPageNumber']; ?> )">
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
<!-------------------------------- end users list -------------------------------------------------------->