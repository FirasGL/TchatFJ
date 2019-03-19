<!DOCTYPE html>
<html>
    <head>
        <title>Authentification </title>
    </head>
    <body>
    <div class="container">
        <?php
        if (isset($error)) {
            echo $error . "\n";
        }
        ?>
        <form class="form-signin" action="/index.php?page=login" method="post">
            <h2 class="form-signin-heading">Authentification</h2>
            <input type="text" name="username" id="username" class="form-control" placeholder="Login" required autofocus>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
            <div><a href="/user/register">Créer un compte</a></div>
        </form>
    </div>
    </body>
</html>
