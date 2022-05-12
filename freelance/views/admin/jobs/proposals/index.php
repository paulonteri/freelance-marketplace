<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Proposals for job</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- proposals list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <table>

        <tr>
            <th>Title</th>
            <th>Skills</th>
            <th>View</th>
            <th></th>
        </tr>

        <?php foreach ($params["proposals"] as $proposal) { ?>
        <!-------------------------------- proposal -------------------------------------------------------->
        <tr>
            <td><?php echo $proposal->getTitle(); ?></td>
            <td>
                ..
            </td>
            <td>
                <a href="/admin/jobs/proposals/id?proposalId=<?php echo $proposal->getId(); ?>">
                    <p class="  ">
                        View &rarr;
                    </p>
                </a>
            </td>
        </tr>
        <!-------------------------------- end proposal -------------------------------------------------------->
        <?php } ?>

    </table>

</div>
<!-------------------------------- end proposals list -------------------------------------------------------->