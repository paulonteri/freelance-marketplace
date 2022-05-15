<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Login</h1>
    <hr />
    <form action="/login" method="POST">
        <fieldset>
            <label for="email">Email</label>
            <input type="email" name="email" required id="email" value="<?php echo $params['email']; ?>">
            <span class="invalidFeedback">
                <?php echo $params['emailError']; ?>
            </span>

            <label for="password">Password</label>
            <input type="password" name="password" required id="password">
            <span class="invalidFeedback">
                <?php echo $params['passwordError']; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Login">
        </fieldset>
        <p> Don't have an account? <a href="/register">Register</a> </p>
        <p> Forgot password? <a href="/reset-password">Reset</a> </p>
    </form>
    <hr />
</div>