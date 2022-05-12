<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Clients</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- clients list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <table>

        <tr>
            <th>Name</th>
            <th>Rating</th>
            <th>Title</th>
            <th>Type</th>
            <th>View</th>
        </tr>

        <?php foreach ($params["clients"] as $client) { ?>
        <!-------------------------------- client -------------------------------------------------------->
        <tr>
            <td><?php echo $client->getUser()->getName(); ?></td>
            <td>
                <?php echo $client->getAverageRating(); ?>/5
            </td>
            <td><?php echo $client->getTitle(); ?></td>
            <td><?php echo $client->getType(); ?></td>
            <td>
                <a href="/admin/clients/id?clientId=<?php echo $client->getId(); ?>">
                    <p class="  ">
                        View &rarr;
                    </p>
                </a>
            </td>
        </tr>
        <!-------------------------------- end client -------------------------------------------------------->
        <?php } ?>

    </table>

</div>
<!-------------------------------- end clients list -------------------------------------------------------->