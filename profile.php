<?php 
require "api/inc/session.php"; 
require "api/inc/db.php";
require "api/models/result.model.php";

$result = new ResultModel($db);

$results = $result->getAllPoints($_SESSION['user_id']);

?>
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
    <title>User Profile</title>
</head>
<body>
    <nav class="menu">
        <div class="menu-left">
            <a href="./user.php" class="menu-heading"><img class="pure-img" src="static/img/sul-valkoinen.png" alt="SUL logo"></a>
            <div class="spacer"></div>
            <a href="./user.php" class="menu-link brander">Appin Nimi</a>
        </div>
        <div class="menu-right">
            <a class="link" href="./api/logout.php">Logout</a>
            <div class="spacer"></div>
            <a class="link" href="./profile.php"><?= $_SESSION['username'] ?></a>
        </div>
    </nav>
    <div id="pusher"></div>

    <div class="dashboard">
        <div class="module b-mod">
            <div class="pure-g">
                <div class="pure-u-1-2 hide-on-mobi">
                    <img class="profile-img" src="./static/img/happy2.png" alt="profile">
                </div>
                <div class="pure-u-1-2 full-width-mobi">
                    <table class="pure-table full-width">
                        <thead>
                            <tr>
                                <th>Sport name</th>
                                <th>Result</th>
                                <th>Points</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($results as $r) : ?>
                                <tr>
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['results']; ?></td>
                                    <td><?= $r['points']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="./static/js/jquery-3.2.1.js"></script>
</body>
</html>