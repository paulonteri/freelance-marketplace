<div class="container" style="margin-top:50px;">
    <h1 style="text-align:center; margin-bottom:50px;">Proposals for Job 1</h1>
</div>

<!-------------------------------- proposals list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <?php foreach ($params["proposals"] as $proposal) {
        $job = $proposal->getJob();
        $freelancer = $proposal->getFreelancer();
    ?>
    <!-------------------------------- proposal -------------------------------------------------------->
    <div class="container rounded-corners background-color-gray"
        style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">
                    Title: <?php echo $proposal->getTitle(); ?>
                </h3>
            </div>
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:right;">
                    by Freelancer:
                    <a href="/freelancers/id?freelancerId=<?php echo $freelancer->getId(); ?>">
                        <?php echo $proposal->getFreelancer()->getUser()->getName(); ?>
                    </a>
                </p>
            </div>
        </div>
        <div class="row" style="padding-bottom:25px;">
            <div class=" column">
                <p style="text-align:left; margin:auto 0px;">
                    <b>Description: </b> <?php echo $proposal->getDescription(); ?>
                </p>
            </div>
        </div>
        <hr style="margin: 1rem 0;" />
        <div class="row" style="justify-content:space-between;">
            <div class="column">
                <p class="center-text-on-small-screen" style="text-align:left; margin:auto 0px;">
                    <b>Date proposed:</b>
                    <script type="text/javascript">
                    formatDateToHumanCalendar("<?php echo $proposal->getTimeCreated() ?>");
                    </script>
                </p>
            </div>
            <div class="column">
                <p style="text-align:center; margin:auto 0px;">
                    <b>Proposal status:</b>
                    <span style="text-transform: uppercase;">
                        <?php echo $proposal->getStatus(); ?>
                    </span>
                </p>
            </div>
            <div class="column">
                <p style="text-align:center; margin:auto 0px;">
                    <b>Skills: </b>
                    <?php foreach ($job->getSkills() as $skill) {
                            echo "#" . $skill->getName() . "  ";
                        } ?>
                </p>
            </div>
        </div>

        <hr style="margin: 1rem 0;" />

        <div class="container" style="padding-bottom:25px; padding-top:10px;">
            <a href="/dashboard/client/proposals/id?proposalId=<?php echo $proposal->getId() ?>">
                <button class="" style="margin: auto !important; display: flex !important;">
                    View proposal &rarr;
                </button>
            </a>
        </div>
    </div>
</div>
<!-------------------------------- end proposal -------------------------------------------------------->
<?php } ?>

</div>