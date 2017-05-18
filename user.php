<?php 
require "api/inc/session.php";
require "api/inc/db.php"; 
require "api/helpers/calculate_hand.php";
require_once "api/helpers/check_login.php";
require_once "api/models/sport.model.php";
require_once "api/inc/get_highest_points.php";

$allPoints = getHighestPoints($_SESSION['user_id'], $db);
$done = true;
foreach ($allPoints as $point) {
    if (empty($point)) {
        $done = false;
    }
}

$sport = new SportModel($db);


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
    <script defer src="./static/js/time.js"></script>
    <title>User Dashboard</title>
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
            <a class="link" href="./profile.php"><?= $_SESSION['username']; ?></a>
        </div>
    </nav>
    <div id="pusher"></div>
    <div class="dashboard">
        <div class="setup-mod">
            <a class="btn" href="./profile.php">Check out your old scores ></a>
        </div>
        <div class="module text-center">
            <h1>Your current Handicap:</h1>
            <span class="score"><?= ($done) ? calculateHand($allPoints[1]['points'], $allPoints[2]['points'], $allPoints[3]['points'], $allPoints[4]['points']) : "Fill in all sports!" ?></span>
            <?php if ($done) : ?> <img class="happy" src="./static/img/happy.png" alt="happy"><?php endif; ?>
            <p>Your highest score in Sprint: <?= $allPoints[1]['points'] ?></p>
            <p>Your highest score in Stamina: <?= $allPoints[2]['points'] ?></p>
            <p>Your highest score in Jump: <?= $allPoints[3]['points'] ?></p>
            <p>Your highest score in Throw: <?= $allPoints[4]['points'] ?></p>            
        </div>
        <div class="module o-mod text-center">
            <img class="happy" src="./static/img/happy2.png" alt="happy2"><span class="train">Training videos</span>
            <iframe class="video" src="https://www.youtube.com/embed/lMsvIClmENA?list=PLO1mER_yPySQ5N3GALCeOT68_p65lC1qA" allowfullscreen></iframe>
        </div>
        <div class="module b-mod text-center">
                <?php 
                    $sprint = $sport->getSportsByBranchName('Sprint');
                ?>
                <form action="./api/insert/result.php" method="post">
                    <p>Sprint</p>
                        <select name="sport" class="selectfix">
                        <?php foreach ($sprint as $s) :?>
                            <option value="<?= $s['sport_id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="branch" value="1">
                        <input type="text" id="time1" name="result" placeholder="Min,Sec.MS" class="fixinput variable-width needs-time">
                        <input type="submit" name="sub" value="Save" class="btn">
                </form>
        </div>
        <div class="module o-mod text-center">
                <?php 
                    $stamina = $sport->getSportsByBranchName('Stamina');
                ?>
                <form action="./api/insert/result.php" method="post">
                    <p>Stamina</p>
                        <select name="sport" class="selectfix">
                        <?php foreach ($stamina as $s) :?>
                            <option value="<?= $s['sport_id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach ?>
                        </select>
                        <input type="hidden" name="branch" value="2">
                        <input type="text" id="time2" name="result" placeholder="Min,Sec.MS" class="fixinput variable-width needs-time">
                        <input type="submit" name="sub" value="Save" class="b-mod btn">
                </form>
        </div>
        <div class="module b-mod text-center">
                <?php 
                    $jump = $sport->getSportsByBranchName('Jump');
                ?>
                <form action="./api/insert/result.php" method="post">
                    <p>Jump</p>
                        <select name="sport" class="selectfix">
                        <?php foreach ($jump as $s) :?>
                            <option value="<?= $s['sport_id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach ?>
                        </select>
                        <input type="hidden" name="branch" value="3">
                        <input type="number" id="result3" name="result" value="" step="0.01" placeholder="Your result in cm" class="fixinput variable-width">
                        <input type="submit" name="sub" value="Save" class="btn">
                </form>
        </div>
        <div class="module o-mod text-center">
                <?php 
                    $throw = $sport->getSportsByBranchName('Throw');
                ?>
                <form action="./api/insert/result.php" method="post">
                    <p>Throw</p>
                        <select name="sport" class="selectfix">
                        <?php foreach ($throw as $s) :?>
                            <option value="<?= $s['sport_id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach ?>
                        </select>
                        <input type="hidden" name="branch" value="4">
                        <input type="number" id="result4" name="result" value="" step="0.01" placeholder="Your shot result in m" class="fixinput variable-width">
                        <input type="submit" name="sub" value="Save" class="b-mod btn">
                </form>
        </div>
        <div class="module text-center">
            <h1>If you want to learn more</h1>
            <a class="link" href="http://www.yleisurheilu.fi/" target="_blank">Visit SUL:s webpage ></a>
        </div>
    </div>
        
    <script src="./static/js/jquery-3.2.1.js"></script>
    <script src="./static/js/cleave.js"></script>
</body>
</html>