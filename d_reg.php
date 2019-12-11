<?php
require('db.php');
$name =$_GET["name"];
$user_name =$_GET["user_name"];
$user_pass =$_GET["user_pass"];

echo $name;
/*
$mysql_qry ="insert into user(username, password, driver) values('$user_name','$user_pass', 1);";

if($conn->query($mysql_qry) === TRUE) {
    echo "Insert successful";
} else {
    echo "Error".$mysql_qry."<br>".$conn->error;
}
$conn->close();*/
?>
