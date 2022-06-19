<!-------------------------------- intro -------------------------------------------------------->
<div class="container">
    <h1 style="text-align:center; margin-top:25px;">Top Rated Freelancers</h1>
</div>
<!-------------------------------- end intro -------------------------------------------------------->

<!-------------------------------- freelancers list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <!-------------------------------- filter -------------------------------------------------------->
    <hr style="margin: 1rem 0;" />
    <h3>Filter</h3>
    <details>
        <summary>View Filters</summary>
        <form id="formID" action="/freelancers" method="GET">
            <fieldset>

                <input hidden type="text" name="pageNumber" id="pageNumber" value="<?php echo $params['pageNumber']; ?>">

                <label for="skills[]">Skills <small>(Select multiple)</small></label>
                <select name="skills[]" id="skills[]" multiple size="10">
                    <?php foreach ($params["allSkills"] as $skill) { ?>
                        <option value="<?php echo $skill->getId(); ?>" <?php if (in_array($skill->getId(), $params['skills'])) { ?> selected <?php } ?>>
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

        <a href="/freelancers">
            <input class="button-primary" type="submit" value="Reset Filters">
        </a>
    </details>
    <!-------------------------------- end filter -------------------------------------------------------->

    <?php foreach ($params["freelancers"] as $freelancer) { ?>
        <!-------------------------------- freelancer -------------------------------------------------------->
        <div class="container rounded-corners background-color-gray" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
            <div class="row" style="justify-content:space-between;">
                <div class="column">
                    <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
                        Freelancer: <?php echo $freelancer->getUser()->getName(); ?>
                    </h3>
                </div>
                <div class="column ">
                    <p class="center-self-on-screen float-right-on-large-screen">
                        <?php echo $freelancer->getAverageRating(); ?>
                        <img src="<?php echo $freelancer->getAverageRatingImage(); ?>" style="width:100px; height:15px; margin:auto 0px;" />
                    </p>
                </div>
            </div>
            <hr style="margin: 1rem 0;" />
            <div class="row">
                <div class="column freelancer-list-image ">
                    <img src="<?php echo $freelancer->getUser()->getImage(); ?>" class="center-on-small-screen container" />
                </div>
                <div class="column freelancer-list-text">
                    <h4 style="text-align:left; margin:auto 0px;">
                        <?php echo $freelancer->getTitle(); ?>
                    </h4>
                    <hr style="margin: 1rem 0;" />
                    <p style="text-align:left; margin:auto 0px;">
                        <?php echo $freelancer->getDescription(); ?>
                    </p>
                    <hr style="margin: 1rem 0;" />
                    <p style="text-align:left; margin:auto 0px;">
                        <b>Skills: </b>
                        <?php foreach ($freelancer->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
                    </p>
                </div>
            </div>
            <hr />
            <div class="row" style="justify-content:space-between;">
                <div class="column" style="margin-bottom:5px;">
                    <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                        Nairobi, Kenya
                    </p>
                </div>
                <div class="column" style="margin-bottom:5px;">
                    <p style="text-align:center; margin:auto 0px;">Joined 4 years, 11 months ago</p>
                </div>
                <div class="column" style="margin-bottom:5px;">
                    <a href="/freelancers/id?freelancerId=<?php echo $freelancer->getId(); ?>">
                        <button class=" center-self-on-screen float-right-on-large-screen ">
                            View
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-------------------------------- end freelancer -------------------------------------------------------->
    <?php } ?>

</div>
<!-------------------------------- end freelancers list -------------------------------------------------------->

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