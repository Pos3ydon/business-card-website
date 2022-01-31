<?php 
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="/main_style_low-priority.css">
        

        <link rel="stylesheet" href="/styles/menu_bar.css">
        <script src="/scripts/menu_bar.js"></script>

        
        <link rel="stylesheet" href="/main_style_high-priority.css">

    </head>
    <body>
        <ul id="navBar">
            <li><a href="/index.php">Create Card</a></li>
            <li><a>About Us</a></li>
            <li><a>Explore</a></li>
            <li id='navBarAcc'><a href="/pages/Account/account.php">Account</a>
                <?php
                    if ($_SESSION["account"] == "") {
                        echo "
                            <div id='navBarAccDropdown' hidden>
                                <ul>
                                    <li><a>My Cards</a></li>
                                    <li><a>Contacts</a></li>
                                    <li><a>Messaging</a></li>
                                    <li><a>Scan History</a></li>
                                    <li><a>Saved</a></li>
                                </ul>
                            </div>
                        ";
                    }
                ?>
            </li>  
        </ul>
    </body>
</html>