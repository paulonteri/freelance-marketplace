<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Create client profile</h1>
    <hr />
    <form action="/dashboard/client/onboarding" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $params["title"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["titleError"]; ?>
            </span>

            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            <span class="invalidFeedback">
                <?php echo $params["imageError"]; ?>
            </span>

            <label for="national_id">National Id (Front)</label>
            <input type="file" name="national_id" id="national_id">
            <span class="invalidFeedback">
                <?php echo $params["national_idError"]; ?>
            </span>

            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" rows="4">
               <?php echo $params["description"]; ?>
            </textarea>
            <span class="invalidFeedback">
                <?php echo $params["descriptionError"]; ?>
            </span>

            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="individual">
                    Individual
                </option>
                <option value="company">
                    Company
                </option>
            </select>
            <span class="invalidFeedback">
                <?php echo $params["typeError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Submit">
        </fieldset>
    </form>
</div>