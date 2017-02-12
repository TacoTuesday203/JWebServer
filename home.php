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
        <title>Welcome to JWeb</title>
        <link rel="stylesheet" href="css/home.css?<?php echo time(); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#sidebar-btn').click(function() {
                    $('#sidebar').toggleClass('visible');
                });
            });
        </script>
    </head>
    <body>
        <div id="sidebar">
            
            <div id="sidebar-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul id="menu-list">
                <li id="menu-list-item"><a href="app-viewer.php?s=<?php echo $_GET['s']; ?>"><img src="img/apps.png" />Apps</a></li>
                <li id="menu-list-item"><a href="#" onclick="window.open('information.html')"><img src="img/info.png" />Information</a></li>
                <li id="menu-list-item"><a href="old/"><img src="img/key1.png" />Old Site</a></li>
                <li id="menu-list-item"><a href="old/deleted-beta-features/"><img src="img/key2.png" />Beta Features</a></li>
                <li id="menu-list-item"><a href="beta.php"><img src="img/exit.png" />Logout</a></li>
            </ul>
            <span id="version-text">Server running JWeb 1.0</span>
        </div>
    
        <center>
            <div id="content">
                <span id="title">My Feed</span>
                <br />
                <br />
                <ul id="messages">
                    <li id="message"><span id="message-user">ADMIN</span>This feature is still being worked on.</li>
                    <li id="message"><span id="message-user">ADMIN</span>Later on, you will be able to post messages here</li>
                     <li id="message"><span id="message-user">ADMIN</span>PRO-TIP: Open your menu and click 'apps' to see what apps you can use!</li>
                </ul>
            </div>
            <div id="add-message">
                <textarea placeholder="Enter message here..." rows=5 cols=50></textarea>
                <br />
                <button type="submit" id="submit-message">+</button>
            </div>
        </center>
        <div class="footer">
            <span id="title-f">Welcome back, <?php echo $username; ?></span><img id="profile-pic" src="img/lock.png">
        </div>
    </body>
</html>



















<!--<div class="header">
                <span id="title">Welcome back, <?php echo $username; ?></span><img id="profile-pic" src="img/lock.png">
        </div>
        <div class="lines">
            <button id="menu" onclick="resize()">
            <span id="sep">D</span>
            <span id="line">DDDDDD</span><br />
            <span id="sep">D</span>
            <span id="line">DDDDDD</span><br />
            <span id="sep">D</span>
            <span id="line">DDDDDD</span>
            </button>
        </div>
        <div class="sidebar">
            <p>Under construction</p>
        </div>
        <center>
            <div class="footer">
                <span id="footer-text">This server is running JWeb 1.0 beta</span>
            </div>
        </center>!-->