<?php

    require_once 'php/init.php';

    $itemsQuery = $db->prepare("
        SELECT name, user, created
        FROM messages
    ");

    $itemsQuery->execute();

    $items = $itemsQuery->rowCount()? $itemsQuery : [];

    
    $userQuery = $db->prepare("
        SELECT id, username
        FROM users
    ");

    $userQuery->execute();

    $users = $userQuery->rowCount()? $userQuery : [];

    $username_array = array();
    $userid_array = array();

    foreach($users as $user) {
        array_push($username_array, $user['username']);
        array_push($userid_array, $user['id']);
    }

?>

<html>
    <head>
        <title>Message Board [beta]</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="js/index.js" type="text/javascript"></script>
    </head>
    
    <body>
        <center>
            <div class="header">
                <span id="title-1">Message Board </span><span id="title-2">BETA</span>
                <br />
                <p>PROGRESS REPORT: You can post messages again; debugging login script!</p>
            </div>
            <div class="list">
                <h1 id="subtitle">Messages</h1>
                
                <?php if(!empty($items)): ?>

                <?php
                $keys = array_keys($userid_array);
                $last = end($keys);
                //$y=0;
                
                foreach($items as $item) {
                    /*for($x=0; $x<$userid_array[$last];$x++) {
                        
                        echo $x;
                        if($userid_array[$x] == $item['user']) {
                            
                            echo '<span id=user>', $username_array[$x], '</span><br />';
                            
                        }
                        
                    }*/
                    
                    for($x=0;$x<=$last;$x++) {
                        if ($userid_array[$x] == $item['user']) {
                            echo '<span id=user>', $username_array[$x], '</span><br />';
                        }
                    }
                    
                    echo '<span id=item>', $item['name'], '</span><br /><br />';
                }
                ?>

                    
                <br /><br/>

                <?php else: ?>
                    <p>No Messages</p>
                
                <?php endif; ?>
                
            </div>
            
            <div class="enter">
                <form id="input-message" action="php/add.php" method="post">
                    <textarea name="message" id="input-message-text" placeholder="Share your message..." rows="10" cols="60" autocomplete="off" required></textarea>
                    <br /><br />
                    <button type="submit" id="submit-message">+ Add</button>
                    <!--<button type="button" id="submit-message" onclick="alert('Disabled for now!')">+ Add</button>!-->
                </form>
            </div>
            
            <!--<div class="footer">
                <form id="login-information" action="php/login.php" method="post">
                    <span id="login-intro">Login to your MessageBoard account | </span><input type="username" name="username" id="username" placeholder="Username.." autocomplete="off" required /><span id="divider"> & </span><input type="password" name="password" id="password" placeholder="Password.." autocomplete="off" required /><button type="submit" id="submit-login">Login</button>
                    
                </form>
            </div>!-->
        </center>
    </body>
</html>