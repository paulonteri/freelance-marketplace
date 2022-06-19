<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Skills</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- skills list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <form id="formID" action="/admin/skills" method="GET">
        <fieldset>
            <input hidden type="text" name="pageNumber" id="pageNumber" value="<?php echo $params['pageNumber']; ?>">
        </fieldset>
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Id</th>
        </tr>

        <?php foreach ($params["skills"] as $skill) { ?>
            <!-------------------------------- skill -------------------------------------------------------->
            <tr>
                <td><?php echo $skill->getName(); ?></td>
                <td><?php echo $skill->getId(); ?></td>
            </tr>
            <!-------------------------------- end skill -------------------------------------------------------->
        <?php } ?>

    </table>

    <p><a href="/admin/skills/create">Create skill &rarr; </a></p>

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
<!-------------------------------- end skills list -------------------------------------------------------->