<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Create Job</h1>
    <hr />
    <form action="/dashboard/client/jobs/create" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="title">Title</label>
            <input type="text" required name="title" id="title" value="<?php echo $params['title']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['titleError']; ?>
            </span>

            <label for="description">Description</label>
            <textarea required name="description" id="description"><?php echo $params['description']; ?></textarea>
            <span class="invalidFeedback">
                <?php echo $params['descriptionError']; ?>
            </span>

            <label for="payRatePerHour">Pay rate per hour (in Kenyan Shillings)</label>
            <input type="number" min="10" max="100000" required name="payRatePerHour" id="payRatePerHour"
                value="<?php echo $params['payRatePerHour']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['payRatePerHourError']; ?>
            </span>

            <label for="expectedDurationInHours">Expected duration in hours</label>
            <input type="number" min="1" max="100000" required name="expectedDurationInHours"
                id="expectedDurationInHours" value="<?php echo $params['expectedDurationInHours']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['expectedDurationInHoursError']; ?>
            </span>

            <label for="receiveJobProposalsDeadline">Time expires</label>
            <input type="datetime-local" required name="receiveJobProposalsDeadline" id="receiveJobProposalsDeadline"
                value="<?php echo $params['receiveJobProposalsDeadline']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['receiveJobProposalsDeadlineError']; ?>
            </span>

            <label for="image">Image</label>
            <input type="file" name="image" name="image" id="image">
            <span class="invalidFeedback">
                <?php echo $params["imageError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Submit">
        </fieldset>
    </form>
</div>