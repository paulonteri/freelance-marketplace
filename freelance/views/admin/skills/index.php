<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Skills</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- skills list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

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
</div>
<!-------------------------------- end skills list -------------------------------------------------------->