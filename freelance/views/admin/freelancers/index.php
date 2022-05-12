<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Freelancers</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- freelancers list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <table>

        <tr>
            <th>Name</th>
            <th>Rating</th>
            <th>Title</th>
            <th>Skills</th>
            <th>View</th>
            <th></th>
        </tr>

        <?php foreach ($params["freelancers"] as $freelancer) { ?>
        <!-------------------------------- freelancer -------------------------------------------------------->
        <tr>
            <td><?php echo $freelancer->getUser()->getName(); ?></td>
            <td>
                <?php echo $freelancer->getAverageRating(); ?>/5
            </td>
            <td><?php echo $freelancer->getTitle(); ?></td>
            <td>
                <small style="text-align:left; margin:auto 0px;">
                    <?php foreach ($freelancer->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
                </small>
            </td>
            <td>
                <a href="/admin/freelancers/id?freelancerId=<?php echo $freelancer->getId(); ?>">
                    <p class="  ">
                        View &rarr;
                    </p>
                </a>
            </td>
        </tr>
        <!-------------------------------- end freelancer -------------------------------------------------------->
        <?php } ?>

    </table>

</div>
<!-------------------------------- end freelancers list -------------------------------------------------------->