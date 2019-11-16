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
            <title>Edit Order</title>
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
                    <th>Owner id</th>
                    <th>Load City</th>
                    <th>Discharge City</th>
                    <th>Volume (m3)</th>
                    <th>Weight (kg)</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Driver Id</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php
                    require ('db.php');
                $query = "SELECT id, owner_id, load_city, discharge_city, volume, weight, quantity, type, status, price, driver_id FROM orders";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['owner_id'] . "</td>";
                    echo "<td>" . $row['load_city'] . "</td>";
                    echo "<td>" . $row['discharge_city'] . "</td>";
                    echo "<td>" . $row['volume'] . "</td>";
                    echo "<td>" . $row['weight'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['driver_id'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    if($row['status']== 'Quote')
                        echo "<td><a href='a_edit_order.php?id=".$row['id']."'>Edit</a></td>";
                    if($row['status']== 'Approved By Client')
                        echo "<td><a href='a_assign_driver.php?id=".$row['id']."'>Assign Driver</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </body>
    </html>
<?php } ?>
