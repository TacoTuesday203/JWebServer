<?php
    
    //require_once 'nofunctionality.php';
    require_once 'init.php';

    if(isset($_POST['message'])) {
        $name = trim($_POST['message']);
        
        if (!empty($name)) {
            $addedQuery = $db->prepare("
                INSERT INTO messages (name, user, created)
                VALUES (:message, :user, NOW())
            ");
            
            //echo $_SESSION['user_id'];
            
            $addedQuery->execute([
                'message' => $name,
                'user' => $_SESSION['user_id']
            ]);
        }
    }
    else {
        echo 'Value not set.';
    }

    header('Location: ../interface.php');

?>