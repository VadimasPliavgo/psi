<?php
require('db.php');
$user_name = $_GET["user_name"];
$user_pass = md5($_GET["password"]);
$mysql_qry = "select * from users where username = '$user_name' and password = '$user_pass';";
$result = mysqli_query($con,$mysql_qry);
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name']= $row["name"];
    $name = $row["name"];
    echo "paviko";
} else {
    echo "rip";
}
?>
