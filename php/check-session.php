<?php
    function verify_session($tokent) {
        $db = new PDO('mysql:dbname=jweb;host=localhost', 'root', '');

        $tokenFound = 0;

        if(isset($tokent)) {
            $tokenQuery = $db->prepare("
                SELECT sessiontoken, username, password
                FROM sessions
            ");
                
            $tokenQuery->execute();
            $tokens = $tokenQuery->rowCount()? $tokenQuery : [];
            
            foreach($tokens as $token) {
                if($token['sessiontoken'] == $tokent) {
                    return $token;
                    $tokenFound = 1;
                }
            }
        }
        if ($tokenFound == 0) {
            return 'INVALID';
        }
    }
?>