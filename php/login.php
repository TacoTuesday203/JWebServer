<?php

    session_start();

    $db = new PDO('mysql:dbname=jweb;host=localhost', 'root', '');

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $userQuery = $db->prepare("
            SELECT id, username, password
            FROM users
        ");
        
        $userQuery->execute();
        
        $users = $userQuery->rowCount()? $userQuery : [];
        
        $userFound = 0;
        
        foreach($users as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                echo 'We are currently working on this!';
            }
        }
        if ($userFound == 0) {
            echo 'test';
            header("Location: ../beta.php?badlogin=1");
        }
    } else {
        echo 'There was a problem processing your request. Please go back and try again.';
    }

?>