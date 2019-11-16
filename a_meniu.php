<?php
session_start();
if ($_SESSION['valid'] != true)
    header("Location: login.php");

if ($_SESSION['admin'] == false)
    header("Location: meniu.php");
else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Menu</title>
            <style>
                ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }

                li {
                    display: inline;
                }
            </style>
        </head>
        <body> 
            <ul>
                <li><a href="meniu.php">Home</a></li>
                <li><a href="a_users.php">Users</a></li>
                <li><a href="a_orders.php">Orders</a></li>
                <li><a href="auth.php">Logout</a></li>
            </ul>
            <?php
            // put your code here
            ?>
        </body>
    </html>
<?php } ?>
