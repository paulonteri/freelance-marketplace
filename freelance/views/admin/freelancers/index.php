<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Freelancers</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- freelancers list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <!-------------------------------- filter -------------------------------------------------------->
    <hr style="margin: 1rem 0;" />
    <h3>Filter</h3>
    <details>
        <summary>View Filters</summary>
        <form id="formID" action="/admin/freelancers" method="GET">
            <fieldset>

                <input hidden type="number" required name="pageNumber" id="pageNumber"
                    value="<?php echo $params['pageNumber']; ?>">

                <label for="skills[]">Skills <small>(Select multiple)</small></label>
                <select required name="skills[]" id="skills[]" multiple size="10">
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

                <hr style="margin: 1rem 0;" />

                <input class="button-primary" type="submit" value="Submit">
            </fieldset>
        </form>

        <a href="/admin/freelancers">
            <input class="button-primary" type="submit" value="Reset Filters">
        </a>
    </details>
    <!-------------------------------- end filter -------------------------------------------------------->


    <table>
        <tr>
            <th>Title</th>
            <th>Skills</th>
            <th>Experience (yrs)</th>
            <th>Rating</th>
            <th>View</th>
            <th></th>
        </tr>

        <?php foreach ($params["freelancers"] as $freelancer) { ?>
        <!-------------------------------- freelancer -------------------------------------------------------->
        <tr>
            <td><?php echo $freelancer->getTitle(); ?></td>
            <td>
                <small style="text-align:left; margin:auto 0px;">
                    <?php foreach ($freelancer->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
                </small>
            </td>
            <td>
                <?php echo $freelancer->getYearsOfExperience(); ?>
            </td>
            <td>
                <?php echo $freelancer->getAverageRating(); ?>/5
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
<!-------------------------------- end freelancers list -------------------------------------------------------->