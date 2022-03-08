<!--user:-->
<!--- username-->
<!--- first_name-->
<!--- last_name-->
<!--- email-->
<!--- phone-->
<!--- password-->
<!--- is_admin-->
<!--- image-->

<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Register</h1>
    <hr/>
    <form>
        <fieldset>
            <label for="userNameField">Username</label>
            <input type="text" required id="userNameField">

            <label for="firstNameField">First Name</label>
            <input type="text" required id="firstNameField">

            <label for="lastNameField">Last name</label>
            <input type="text" required id="lastNameField">

            <label for="phoneField">Phone number</label>
            <input type="text" required id="phoneField">

            <label for="emailField">Email</label>
            <input type="email" required id="emailField">

            <label for="imageField">Profile picture</label>
            <input type="file" required id="imageField">

            <label for="passwordField">Password</label>
            <input type="password" required id="passwordField">

            <label for="confirmPasswordField">Confirm password</label>
            <input type="password" required id="confirmPasswordField">

            <input class="button-primary" type="submit" value="Login">
        </fieldset>
    </form>
</div>