<?php 
require ("db.php");
$order = $_GET["order_id"];
$status = $_GET["status"];
$query = mysqli_query($con,"UPDATE orders SET status = '$status' WHERE id = '$order';");  

$driver = $_GET["driver_id"];
$query = mysqli_query($con,"SELECT * FROM orders WHERE driver_id = '$driver';");  
if ($query) {
    while ($row = mysqli_fetch_array($query)) {
        $flag[] = $row;
    }
    print(json_encode($flag));
}
?>
