<?php
require('db.php');
$email =$_GET["name"];
$user_name =$_GET["user_name"];
$user_pass =$_GET["user_pass"];

$query = "INSERT into `users` (username, password, email, trn_date, company_name, active, admin, driver)
                        VALUES ('$user_name', '" . md5($user_pass) . "', '$email', '$trn_date', '$company', FALSE, FALSE, TRUE )";
            $result = mysqli_query($con, $query);
            
