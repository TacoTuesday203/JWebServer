<?php
    session_start();
    
    if (!defined('USER_SET')) {
        $_SESSION['user_id'] = 1;
        define('USER_SET', TRUE);
    }

    $db = new PDO('mysql:dbname=jwebserver;host=localhost', 'root', '');

    if(!isset($_SESSION['user_id'])) {
        die('You are not signed in!');
    }
?>