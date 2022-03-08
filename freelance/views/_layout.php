<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Marketplace</title>
    <link rel="stylesheet" href="/static/css/index.css">
    <link rel="stylesheet" href="/static/css/default.css">
</head>

<body>

    <!----------------------------- navbar -------------------------------------------------------->
    <div class="topnav">
        <a href="/">Freelance marketplace</a>
        <a href="/freelancers">Freelancers</a>
        <a href="/jobs">Jobs</a>
        <a href="/dashboard">Dashboard</a>
        <a href="/login">Login</a>
    </div>
    <!----------------------------- end navbar -------------------------------------------------------->


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
                <li> <a href="/dashboard">Dashboard</a> </li>
                <li> <a href="/login">Login</a> </li>
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