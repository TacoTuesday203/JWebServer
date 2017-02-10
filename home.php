<?php
    session_start();

    $db = new PDO('mysql:dbname=jweb;host=localhost', 'root', '');
?>

<html>
    <head>
        <title>Welcome to JWeb</title>
    </head>
    <body>
        <center>
            <h1>You have successfully logged in.</h1>
            <h2>This page is under construction!</h2>
            <p><?php echo $_GET['s']; ?></p>
        </center>
    </body>
</html>