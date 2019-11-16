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
            <title>Users</title>
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
            <br><br>

            <table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Admin</th>
                    <th>Driver</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    require ('db.php');
                $query = "SELECT id, username, email, admin, company_name, active, driver  FROM `users`";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['company_name'] . "</td>";
                    if($row['admin']==true)
                        echo "<td><input type='checkbox' disabled checked></td>";
                    else
                        echo "<td><input type='checkbox' disabled></td>";
                    
                    if($row['driver']==true)
                        echo "<td><input type='checkbox' disabled checked></td>";
                    else
                        echo "<td><input type='checkbox' disabled></td>";
                    if($row['active']==true)
                        echo "<td><input type='checkbox' disabled checked></td>";
                    else
                        echo "<td><input type='checkbox' disabled></td>";
                    echo "<td><a href='a_edit_user.php?id=".$row['id']."'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </body>
    </html>
<?php } ?>
