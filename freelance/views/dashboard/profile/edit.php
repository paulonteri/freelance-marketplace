<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Edit profile</h1>
    <hr />
    <form action="/dashboard/profile/edit" method="POST" enctype="multipart/form-data">
        <fieldset>

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $params["first_name"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["first_nameError"]; ?>
            </span>

            <label for="middle_name">Middle name</label>
            <input type="text" name="middle_name" id="middle_name" value="<?php echo $params["middle_name"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["middle_nameError"]; ?>
            </span>

            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $params["last_name"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["last_nameError"]; ?>
            </span>

            <label for="phone">Phone number</label>
            <input type="text" name="phone" id="phone" value="<?php echo $params["phone"]; ?>" placeholder="0703130589">
            <span class="invalidFeedback">
                <?php echo $params["phoneError"]; ?>
            </span>

            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $params["email"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["emailError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <label for="county">County</label>
            <input type="text" name="county" id="county" value="<?php echo $params["county"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["countyError"]; ?>
            </span>

            <label for="city">City</label>
            <input type="text" name="city" id="city" value="<?php echo $params["city"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["cityError"]; ?>
            </span>

            <!-- <label for="image">Profile picture</label>
            <input type="file" name="image" id="image">
            <span class="invalidFeedback">
                <?php echo $params["imageError"]; ?>
            </span> -->

            <hr style="margin: 1rem 0;" />
            <input class="button-primary" type="submit" value="Update">

        </fieldset>

    </form>
    <hr />
</div>