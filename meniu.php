<?php
session_start();
if ($_SESSION['valid'] != true)
    header("Location: login.php");

if ($_SESSION['admin'] == true)
    header("Location: a_meniu.php");
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
                <li><a href="new_order.php">New Order</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="auth.php">Logout</a></li>
            </ul>
        </body>
    </html>
<?php } ?>