<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Create Job</h1>
    <hr/>
    <form>
        <fieldset>
            <label for="titleField">Title</label>
            <input type="text" required id="titleField">

            <label for="descriptionField">Description</label>
            <textarea required id="descriptionField"></textarea>

            <label for="payRatePerHourField">Pay rate per hour (in Kenyan Shillings)</label>
            <input type="number" min="10" max="100000" required id="payRatePerHourField">

            <label for="expectedDurationInHoursField">Expected duration in hours</label>
            <input type="number" min="1" max="100000" required id="expectedDurationInHoursField">

            <label for="timeExpiresField">Time expires</label>
            <input type="datetime-local" required id="timeExpiresField">

            <input class="button-primary" type="submit" value="Login">
        </fieldset>
    </form>
</div>