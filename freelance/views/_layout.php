<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($params['pageTitle'])) {
            echo $params['pageTitle'] . ' | Freelance Marketplace';
        } else {
            echo 'Freelance Marketplace';
        } ?>
    </title>
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
        <a href="/">Marketplace</a>
        <?php if ($isUserLoggedIn == true) { ?>
        <a href="/logout" style="float:right;">Logout</a>
        <?php } else { ?>
        <a href="/login" style="float:right;">Login</a>
        <?php } ?>

    </div>
    <!----------------------------- end navbar -------------------------------------------------------->

    <!----------------------------- info bar -------------------------------------------------------->
    <?php
    if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/freelancer')) {
        echo '<div class="dashboard-freelancer-header">';
        echo '<p class="dashboard-client-header-text">Freelancer dashboard</p>';
        echo '</div>';
    } else if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/client')) {
        echo '<div class="dashboard-client-header">';
        echo '<p class="dashboard-client-header-text">Client dashboard</p>';
        echo '</div>';
    } else if (str_starts_with($_SERVER['REQUEST_URI'], '/admin')) {
        echo '<div class="admin-header">';
        echo '<p class="admin-header-text">Admin</p>';
        echo '</div>';
    }
    ?>
    <!----------------------------- end info bar -------------------------------------------------------->

    <?php if ($isUserLoggedIn == true) { ?>
    <div id="leftMenu">
        <a href="javscript:void(0)" class="btn-area" onclick="closeLeftMenuBtn()">×</a>
        <div class="mainNav">

            <?php if (!\app\models\UserModel::getCurrentUser()->getIsAdmin()) { ?>
            <hr />
            <a href="/dashboard">Dashboard</a>
            <?php } ?>

            <?php if (\app\models\UserModel::getCurrentUser()->isClient()) { ?>
            <hr />
            <a href="/freelancers">Freelancers</a>
            <a href="/dashboard/client">Client dashboard</a>
            <a class="inner-menu" href="/dashboard/client/jobs">Your jobs</a>
            <a class="inner-menu" href="/dashboard/client/jobs/create">Post job</a>
            <?php } ?>

            <?php if (\app\models\UserModel::getCurrentUser()->isFreelancer()) { ?>
            <hr />
            <a href="/dashboard/freelancer">Freelancer dashboard</a>
            <a class="inner-menu" href="/dashboard/freelancer/jobs">All jobs</a>
            <a class="inner-menu" href="/dashboard/freelancer/jobs/my-jobs">My jobs</a>
            <a class="inner-menu" href="/dashboard/freelancer/jobs/proposals">Proposals</a>
            <?php } ?>

            <?php if (\app\models\UserModel::getCurrentUser()->getIsAdmin()) { ?>
            <hr />
            <a href="/admin">Admin</a>
            <a class="inner-menu" href="/admin/users">Users</a>
            <a class="inner-menu" href="/admin/jobs">Jobs</a>
            <a class="inner-menu" href="/admin/freelancers">Freelancers</a>
            <a class="inner-menu" href="/admin/clients">Clients</a>
            <a class="inner-menu" href="/admin/skills">Skills</a>
            <?php } ?>

            <hr />
            <a href="/dashboard/profile">User profile</a>

            <hr />
            <a href="/logout">Logout</a>

            <hr />
        </div>
    </div>
    <p onclick="openLeftMenuBtn()" style="text-align:left; font-size:xx-large; margin:0; color:black;">☰</p>
    <?php } ?>

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
                <li> <a href="/">Marketplace</a> </li>

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
        document.write("Marketplace @ " + new Date().getFullYear());
        </script>
    </p>

</footer>
<!-------------------------------- end footer -------------------------------------------------------->