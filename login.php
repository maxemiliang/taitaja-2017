<?php require "api/inc/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="static/css/pure-min.css">
    <link rel="stylesheet" href="static/css/style.css">
    <title>Kirjaudun Sisään</title>
</head>
<body>
    <div class="full-size blue centered">
        <h1 class="big-header">Kirjaudun sisään</h1>
        <?php if (isset($_SESSION['log_err'])) : session_unset(); ?>
            <p>Username or password is wrong</p>
        <?php endif; ?>
        <form action="api/login.php" method="post" class="centered">
            <input type="text" name="username" value="" class="fixinput no-mar" placeholder="Username">
            <input type="password" name="password" value="" class="fixinput no-mar" placeholder="Password">
            <input type="submit" name="submit" value="Kirjaudu" class="btn item-center">     
        </form>
        <a class="link" href="register.php">Rekisteröiden tällä ></a>
        <a class="link" href="./">Takaisin etusivulle</a>
    </div>
    <script src="./static/js/jquery-3.2.1.js"></script>
</body>
</html>