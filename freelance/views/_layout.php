<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Marketplace</title>
    <link rel="stylesheet" href="/static/css/index.css">
    <link rel="stylesheet" href="/static/css/default.css">
    <script src="/static/javascript/index.js"></script>

<body>


    <!----------------------------- alert -------------------------------------------------------->
    <?php if ($alert != null) {
        \app\utils\DisplayAlert::displayAlert($alert);
    }
    ?>
    <!----------------------------- end alert -------------------------------------------------------->

    <!----------------------------- errors -------------------------------------------------------->
    <?php
    if ($errors != null) {
        foreach ($errors as $error) {
            \app\utils\DisplayAlert::displayError($error);
        }
    }
    ?>
    <!----------------------------- end errors -------------------------------------------------------->

    <!----------------------------- navbar -------------------------------------------------------->
    <div class="topnav">
        <a href="/">Freelance marketplace</a>
        <a href="/freelancers">Freelancers</a>

        <?php if ($isUserLoggedIn == true) { ?>
        <a href="/dashboard">Dashboard</a>
        <a href="/logout">Logout</a>
        <?php } ?>

        <?php if ($isUserLoggedIn == false) { ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <?php } ?>

    </div>
    <!----------------------------- end navbar -------------------------------------------------------->

    <!----------------------------- info bar -------------------------------------------------------->
    <?php
    if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/freelancer')) {
        echo '<div class="dashboard-freelancer-header">';
        echo '<p class="dashboard-client-header-text">Freelancer dashboard</p>';
        echo '</div>';
    }
    if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/client')) {
        echo '<div class="dashboard-client-header">';
        echo '<p class="dashboard-client-header-text">Client dashboard</p>';
        echo '</div>';
    }
    ?>
    <!----------------------------- end info bar -------------------------------------------------------->


    <!-- <pre>
    <?php var_dump($_GET); ?>
    </pre> -->

    <!-- <pre>
    <?php var_dump($_POST); ?>
    </pre> -->

    <!-- <pre>
    <?php var_dump($_SESSION); ?> 
    </pre> -->

    <!-- <pre>
    <?php var_dump($params); ?>
    </pre> -->

    <!-- <pre>
        <?php var_dump($_FILES); ?>
    </pre> -->

    <!-- <pre>
        $_SERVER
        <?php var_dump($_SERVER); ?>
    </pre> -->

    <!----------------------------- main content -------------------------------------------------------->
    <?php echo $content; ?>
    <!----------------------------- end main content -------------------------------------------------------->

</body>

<!-------------------------------- footer -------------------------------------------------------->
<footer class="container" style="margin-top:50px;">
    <hr />

    <div class="row">
        <div class="column">
            <ul style="list-style: none;">
                <li> <a href="/">Freelance marketplace</a> </li>
                <li><a href="/freelancers">Freelancers</a></li>

                <?php if ($isUserLoggedIn == true) { ?>
                <li> <a href="/dashboard">Dashboard</a> </li>
                <li> <a href="/logout">Logout</a> </li>
                <?php } ?>

                <?php if ($isUserLoggedIn == false) { ?>
                <li> <a href="/login">Login</a> </li>
                <li> <a href="/register">Register</a> </li>
                <?php } ?>

            </ul>
        </div>
    </div>

    <p style="text-align:center;">
        <script>
        document.write("@ " + new Date().getFullYear());
        </script>
    </p>

</footer>
<!-------------------------------- end footer -------------------------------------------------------->