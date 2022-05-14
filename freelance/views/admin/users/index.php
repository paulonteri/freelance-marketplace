<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Users</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- users list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <table>

        <tr>
            <th>Name</th>
            <th>Is Admin</th>
            <th>Date joined</th>
            <th>View</th>

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
        </tr>
        <!-------------------------------- end user -------------------------------------------------------->
        <?php } ?>

    </table>

</div>
<!-------------------------------- end users list -------------------------------------------------------->