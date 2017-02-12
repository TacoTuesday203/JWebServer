<?php
    session_start();
    require "php/check-session.php";
?>
    <?php if (gettype(verify_session($_GET['s'])) != 'array'): ?>
        <html>
            <head>
                <title>Invalid Session</title>
                <link rel="stylesheet" href="css/home-iv.css?<?php echo time(); ?>" />
            </head>
            <body>
                <center>
                    <div class="centerbar">
                        <span id="title">Invalid Session</span>
                        <br />
                        <span id="subtitle">This issue can usually be fixed with a relog.</span>
                        <span id="subtitle">If this issue persists, contact support immediately.</span>
                        <br />
                        <a id="back" href="beta.php">BACK</a>
                    </div>
                </center>
            </body>
        </html>
    <?php exit(); endif; ?>
<?php
    $username = verify_session($_GET['s'])['username'];
    $password = verify_session($_GET['s'])['password'];
?>

<html>
    <head>
        <title>JWeb App Viewer</title>
        <link rel="stylesheet" href="css/app-viewer.css?<?php echo time(); ?>" />
    </head>
    <body>
        <center>
            <div id="app-viewer">
                <span id="title">Viewing apps for <?php echo $username; ?></span>
                <br />
                <br />
                <ul id="apps">
                    <li id="app"><img src="img/cc.png" /><a href="apps/ChristmasCountdown/">Christmas Countdown</a></li>
                    <li id="app"><img src="img/fv.png" /><a href="apps/FreeVideo/">FreeVideo</a></li>
                    <li id="app"><img src="img/wc.png" /><a href="apps/WebCreator/">WebCreator</a></li>
                    <li id="app"><img src="img/cd.png" /><a href="#" onclick="alert('Will be available shortly.')">Countdown Maker</a></li>
                    <li id="app"><img src="img/exit.png" /><a href="../home.php?s=<?php echo $_GET['s']; ?>">Return to Home</a></li>
                </ul>
            </div>
        </center>
    </body>
</html>