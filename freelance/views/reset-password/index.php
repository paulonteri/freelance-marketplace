<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Reset password</h1>
    <hr />
    <form action="/reset-password" method="POST">
        <fieldset>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $params['email']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['emailError']; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Reset">
        </fieldset>
        <p> Don't have an account? <a href="/register">Register</a> </p>
    </form>
    <hr />
</div>