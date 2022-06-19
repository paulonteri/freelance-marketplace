<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">User Profile</h1>
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

    <hr />

    <h1 style="text-align:center; margin:auto 0px;">Admin status</h1>
    <form action="/admin/users/id?userId=<?php echo $_GET['userId']; ?>" method="POST">
        <fieldset>
            <label for="is_admin">Is admin</label>
            <input type="checkbox" id="is_admin" name="is_admin" value="true" <?php if ($params["is_admin"]) {
                                                                                    echo "checked";
                                                                                } ?>>
        </fieldset>
        <input class="button-primary" type="submit" value="Submit">
    </form>

    <hr />
</div>