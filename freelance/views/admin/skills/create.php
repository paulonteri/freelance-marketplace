<div class="container">
    <h1 style="text-align:center; margin:auto 0px;">Create skill</h1>
    <hr />
    <form action="/admin/skills/create" method="POST">
        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <span class="invalidFeedback">
                <?php echo $params['nameError']; ?>
            </span>

            <hr style="margin: 1rem 0;" />

            <input class="button-primary" type="submit" value="Submit">
        </fieldset>
    </form>
</div>s