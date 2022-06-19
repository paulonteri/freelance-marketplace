<?php if (!isset($GET['token'])) { ?>

    <div class="container">
        <h1 style="text-align:center; margin:auto 0px;">Reset password</h1>
        <hr />
        <form action="/reset-password/reset" method="POST">
            <fieldset>

                <input hidden name="token" id="token" value="<?php echo $_GET['token']; ?>">

                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span class="invalidFeedback">
                    <?php echo $params["passwordError"]; ?>
                </span>

                <label for="confirmPassword">Confirm password</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span class="invalidFeedback">
                    <?php echo $params["confirmPasswordError"]; ?>
                </span>

                <hr style="margin: 1rem 0;" />

                <input class="button-primary" type="submit" value="Reset">
            </fieldset>
            <p>Prefer to login? <a href="/login">Login</a> </p>
        </form>
        <hr />
    </div>

<?php
} else {
    echo "Error. Token not found.";
}
?>