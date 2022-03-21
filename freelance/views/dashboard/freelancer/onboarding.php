<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Create freelancer profile</h1>
    <hr />
    <form action="/dashboard/freelancer/onboarding" method="POST">
        <fieldset>
            <label for="title">Title</label>
            <input type="text" required name="title" id="title">
            <span class="invalidFeedback">
                <?php echo $params["titleError"]; ?>
            </span>

            <label for="years_of_experience">Years of experience</label>
            <input type="number" required name="years_of_experience" id="years_of_experience">
            <span class="invalidFeedback">
                <?php echo $params["years_of_experienceError"]; ?>
            </span>

            <label for="description">Description</label>
            <textarea type="text" required name="description" id="description" rows="4">
            </textarea>
            <span class="invalidFeedback">
                <?php echo $params["descriptionError"]; ?>
            </span>

            <label for="skills">Skills</label>
            <select type="number" required name="skills" id="skills" multiple>
                <option value="volvo">Programming</option>
                <option value="saab">Graphic Design</option>
            </select>

            <span class="invalidFeedback">
                <?php echo $params["skillsError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Submit">
        </fieldset>
    </form>
</div>