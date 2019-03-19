<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Authentication</title>

        <!-- Icons font CSS-->
        <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="/css/main.css" rel="stylesheet" media="all">
    </head>
    <body>
    <div class="container">
        <?php
        if (isset($error)) {
            echo $error . "\n";
        }
        ?>
<!--        <form class="form-signin" action="/index.php?page=login" method="post">-->
<!--            <h2 class="form-signin-heading">Authentification</h2>-->
<!--            <input type="text" name="username" id="username" class="form-control" placeholder="Login" required autofocus>-->
<!--            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>-->
<!--            <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>-->
<!--            <div><a href="/index.php?page=register">Create an account</a></div>-->
<!--        </form>-->
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Authentication</h2>
                        <?php
                        if (isset($error)) {
                            echo $error . "\n";
                        }
                        ?>
                        <form action="/index.php?page=login" method="POST">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Username</label>
                                        <input class="input--style-4" type="text" id="username" name="username" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Password</label>
                                        <input class="input--style-4" type="password" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
                            </div>
                            <div class="p-t-15">
                                <div><a class="row-space" href="/index.php?page=register">Create an account</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/vendor/select2/select2.min.js"></script>
    <script src="/vendor/datepicker/moment.min.js"></script>
    <script src="/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="/js/global.js"></script>
    </body>
</html>
