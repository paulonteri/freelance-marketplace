<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Your Profile</h1>
    <hr />
    <form>
        <fieldset>

            <label for="first_name">First Name</label>
            <input disabled type="text" name="first_name" id="first_name" value="<?php echo $params["first_name"]; ?>">

            <label for="middle_name">Middle name</label>
            <input disabled type="text" name="middle_name" id="middle_name" value="<?php echo $params["middle_name"]; ?>">

            <label for="last_name">Last name</label>
            <input disabled type="text" name="last_name" id="last_name" value="<?php echo $params["last_name"]; ?>">

            <label for="phone">Phone number</label>
            <input disabled type="text" name="phone" id="phone" value="<?php echo $params["phone"]; ?>" placeholder="0703130589">

            <label for="email">Email</label>
            <input disabled type="text" name="email" id="email" value="<?php echo $params["email"]; ?>">

            <hr style="margin: 1rem 0;" />

            <label for="county">County</label>
            <input disabled type="text" name="county" id="county" value="<?php echo $params["county"]; ?>">

            <label for="city">City</label>
            <input disabled type="text" name="city" id="city" value="<?php echo $params["city"]; ?>">

            <!-- <label for="image">Profile picture</label>
            <input type="file" name="image" id="image">
            <span class="invalidFeedback">
                <?php echo $params["imageError"]; ?>
            </span> -->


        </fieldset>

    </form>

    <a href="/dashboard/profile/edit">
        <p>Edit profile &rarr;</p>
    </a>

    <hr />
</div>