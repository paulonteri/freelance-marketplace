<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Clients</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- clients list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <form id="formID" action="/admin/clients" method="GET">
        <fieldset>
            <input hidden type="number" required name="pageNumber" id="pageNumber"
                value="<?php echo $params['pageNumber']; ?>">
        </fieldset>
    </form>

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
<!-------------------------------- end clients list -------------------------------------------------------->