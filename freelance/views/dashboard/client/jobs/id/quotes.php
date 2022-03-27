<div class="container" style="margin-top:50px;">
    <h1 style="text-align:center; margin-bottom:50px;">Proposals for Job 1</h1>
</div>

<!-------------------------------- proposals list -------------------------------------------------------->
<div class="container" style="margin-top:25px;">

    <?php for ($x = 0; $x <= 3; $x++) { ?>
        <!-------------------------------- proposal -------------------------------------------------------->
        <div class="container rounded-corners" style="padding-bottom:5px; padding-top:10px; margin-bottom:10px">
            <div class="row" style="justify-content:space-between;">
                <div class="column">
                    <h3 style=" margin:auto 0px;" class="center-text-on-small-screen">Proposal <?php echo $x; ?></h3>
                </div>
                <div class="column">
                    <p class="center-text-on-small-screen" style="text-align:right;">by Freelancer <?php echo $x; ?></p>
                </div>
            </div>
            <hr style="margin: 1rem 0;" />
            <div class="row">
                <p style="text-align:left; margin:auto 0px;">Laboris nulla ea nostrud officia dolore. Commodo fugiat
                    ipsum incididunt eiusmod adipisicing sunt qui. Ad elit reprehenderit non magna. Lorem ut culpa
                    adipisicing dolor ex ipsum amet exercitation deserunt consectetur eu laborum occaecat. Nisi Lorem
                    culpa velit labore voluptate id ad duis dolor cillum. Do enim nisi est et mollit labore officia
                    culpa qui officia sit. Occaecat tempor aliquip qui elit dolor ad duis quis occaecat labore eiusmod
                    dolor sunt.
                </p>
            </div>
            <hr />
            <div class="container">

                <button style="margin: auto !important; display: flex !important;">
                    Accept proposal &rarr;
                </button>

            </div>
        </div>
        <!-------------------------------- end proposal -------------------------------------------------------->
    <?php } ?>

</div>
<!-----------