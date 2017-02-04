<?php
    session_start();
    $dab = new PDO('mysql:dbname=jweb;host=localhost', 'root', '');

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['displayname'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $displayname = $_POST['displayname'];
        
        $userQuery = $dab->prepare("
           SELECT username
           FROM users
        ");
        
        $userQuery->execute();
        
        $users = $userQuery->rowCount()? $userQuery : [];
        
        foreach($users as $user) {
            if ($user['username'] == $username) {
                echo 'Sorry, that username is taken.';
                header("Location: ../register/taken.html");
                exit;
            }
        }
        
        if (!empty($username) && !empty($password) && !empty($displayname)) {
            $addQuery = $dab->prepare("
                INSERT INTO users (username, password, displayname)
                VALUES (:username, :password, :displayname)
            ");

            $addQuery->execute([
                'username' => $username,
                'password' => $password,
                'displayname' => $displayname
            ]);
            header("Location: ../register/complete.php");
            echo 'Account created.';
        } else {
            echo 'There was a problem processing your request. Please go back and try again.';
        }
    } else {
        echo 'There was a problem processing your request. Please go back and try again.';
    }
?>