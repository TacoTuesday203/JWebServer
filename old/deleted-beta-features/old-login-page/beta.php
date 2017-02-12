<?php


?>


<html>
    <head>
        <title>Josh's Webserver Login [beta]</title>
        <link rel="stylesheet" type="text/css" href="css/beta.css?<?php echo time(); ?>">
        <script type="text/javascript">
            /*function anonymousLogin() {
                document.getElementById('username').value = "???????";
                document.getElementById('password').value = "we've deleted this feature!";
                document.forms.loginform.submit();
            }*/
        </script>
    </head>
    <body>
        <div class="header">
            <center>
                <span id="title">Welcome to Josh's Webserver</span><span id="beta">BETA</span>
                <br /><br />
                <span id="subtitle"><i>Please Login</i></span>
            </center>
        </div>
        <div class="login-container">
            <form id="loginform">
                <center>
                    <span id="login-title">Please login to your JWeb Account</span>
                    <br /><br />
                    <img id="login-image" src="img/lock.png" />
                    <br />
                    <?php
                    if(isset($_GET['badlogin'])) {
                        echo '<br /><span id="login-fail-x">BAD</span><span id="login-fail"> Incorrect username or password.</span>';
                        echo '<br />';
                    }
                    if (isset($_GET['goodlogin'])) {
                        echo '<br /><span id="login-good-x">OK</span><span id="login-good"> Your account was found in our database.</span>';
                        echo '<br />';
                    }
                    ?>
                    <br />
                    <input id="username" name="username" type="text" placeholder="Username..." required/><br />
                    <br /><br />
                    <input id="password" name="password" type="password" placeholder="Password..." required/><br />
                    <br /><br />
                    <button id="submit-login" type="submit">Login</button><!--<button id="guest-login" type="button" onClick="anonymousLogin()">Login as Guest</button>!--><button id="register" type="button">Register</button>
                    <br /><br />
                    <span id="notice-x">!</span><span id="notice"> Our login service is still being buit!</span>
                </center>
            </form>
        </div>
        <!--<img id="bg" src="img/background-beta.jpg" />!-->
    </body>
</html>