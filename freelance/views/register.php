<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Register</h1>
    <hr />
    <form action="/register" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="username">Username</label>
            <input type="text" required name="username" id="username" value="<?php echo $params["username"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["usernameError"]; ?>
            </span>

            <label for="first_name">First Name</label>
            <input type="text" required name="first_name" id="first_name" value="<?php echo $params["first_name"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["first_nameError"]; ?>
            </span>

            <label for="last_name">Last name</label>
            <input type="text" required name="last_name" id="last_name" value="<?php echo $params["last_name"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["last_nameError"]; ?>
            </span>

            <label for="phone">Phone number</label>
            <input type="text" required name="phone" id="phone" value="<?php echo $params["phone"]; ?>"
                placeholder="0703130589">
            <span class="invalidFeedback">
                <?php echo $params["phoneError"]; ?>
            </span>

            <label for="email">Email</label>
            <input type="email" required name="email" id="email" value="<?php echo $params["email"]; ?>">
            <span class="invalidFeedback">
                <?php echo $params["emailError"]; ?>
            </span>

            <label for="image">Profile picture</label>
            <input type="file" name="image" id="image">
            <span class="invalidFeedback">
                <?php echo $params["imageError"]; ?>
            </span>

            <label for="password">Password</label>
            <input type="password" required name="password" id="password">
            <span class="invalidFeedback">
                <?php echo $params["passwordError"]; ?>
            </span>

            <label for="confirmPassword">Confirm password</label>
            <input type="password" required name="confirmPassword" id="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $params["confirmPasswordError"]; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Register">
        </fieldset>
        <p> Already have an account? <a href="/login">Login</a> </p>
    </form>
    <hr />
</div>