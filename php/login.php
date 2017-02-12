<?php

    function genSessionToken($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }   

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
                $sessionID = genSessionToken(15);
                $sessionQuery = $db->prepare("
                    INSERT INTO sessions (sessiontoken, username, password)
                    VALUES (:sessiontoken, :username, :password)
                ");
                
                $sessionQuery->execute([
                    'sessiontoken' => $sessionID,
                    'username' => $username,
                    'password' => $password
                ]);
                header("Location: ../home.php?s={$sessionID}");
                $userFound=1;
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