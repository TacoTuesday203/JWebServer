<html>
    <head>
        <title>JWebServer Prototype</title>
        <link rel="stylesheet" href="css/beta.css?<?php echo time(); ?>" />
    </head>
    <body>
        <img src="img/background.jpg" id="background" />
        <!--<div class="title-container">
            <span id="info">i</span><span id="title">Running JWeb 1.0</span>
            <br />
        </div>!-->
        <center>
            <form action="php/login.php" method="post">
                <div class="login-container">
                    <br />
                    <img src="img/lock.png" id="login-image" />
                    <br />
                    <?php
                    if(isset($_GET['badlogin'])) {
                            echo '<span id="login-fail"> Incorrect username or password.</span>';
                            echo '<br />';
                        }
                        if (isset($_GET['goodlogin'])) {
                            echo '<span id="login-good"> Your account was found in our database.</span>';
                            echo '<br />';
                        }
                    ?>
                    <br />
                    <input name="username" id="username" type="text" placeholder="Username..." />
                    <br />
                    <br />
                    <input name="password" id="password" type="password" placeholder="Password..." />
                    <br />
                    <br />
                    <button id="submit" type="submit">Login</button>
                    <button id="register" type="button" onclick="location.href='register.html'">Register</button>
                    <br />
                    <br />
                    <img src="img/bg.jpg" id="bg" />
                </div>
            </form>
        </center>
    </body>
</html>