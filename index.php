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
    <script defer src="./static/js/pusher.js"></script>
    <title>SUL | Appin Nimi</title>
</head>
<body>
    <nav class="menu">
        <div class="menu-left">
            <a href="#" class="menu-heading"><img class="pure-img" src="static/img/sul-valkoinen.png" alt="SUL logo"></a>
            <div class="spacer"></div>
            <a href="#" class="menu-link brander">Appin Nimi</a>
        </div>
        <div class="menu-right">
            <a href="register.php" class="menu-link">Rekisteröidin</a>
            <div class="spacer"></div>
            <a href="login.php" class="menu-link">Kirjaudu sisään</a>
        </div>
    </nav>
    <div id="pusher"></div>
    <div class="hero-img">
        <p class="hero-text rale">
            Entertaining Text
        </p>
    </div>
    <div class="block">
        <div class="content">
            <h1>Lorem Ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ullamcorper diam at sodales eleifend. Nam interdum ut lectus ut dictum. 
                Proin a velit ullamcorper, porta neque in, sollicitudin lectus. 
                Etiam turpis magna, facilisis sit amet interdum a, lobortis id ipsum.</p>
            <a href="./user.php" class="btn">Go directly to your profile if your signed in ></a>
        </div>
    </div>
    <div class="block blue">
        <div class="content">
            <h1 class="heading">If this sounds interesting</h1>
            <a href="register.php" class="btn">Rekisteröintä nyt!</a>
            <h1>Or:</h1>
            <a class="link" href="http://www.yleisurheilu.fi/" target="_blank">Visit SUL:s webpage ></a>
        </div>
    </div>
    <script src="./static/js/jquery-3.2.1.js"></script>
</body>
</html>