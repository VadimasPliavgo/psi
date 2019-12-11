<?php 
require ("db.php");
$driver = $_SESSION["driver_id"];
$query = mysqli_query($con,"SELECT * FROM orders WHERE driver_id = '$driver_id';");  

if ($query) {
    while ($row = mysqli_fetch_array($query)) {
        $flag[] = $row;
    }
    print(json_encode($flag));
}

?>
