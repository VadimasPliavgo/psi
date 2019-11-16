<!DOCTYPE html>
<html>
    <head>
        <script src="jquery3_4_1.min.js.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title>PSI</title>
    </head>
    <body>
        <?php
        require('db.php');
        require ('functions.php');
        if (isset($_REQUEST['username'])) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            $company = stripslashes($_REQUEST['companyname']);
            $company = mysqli_real_escape_string($con, $company);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `users` (username, password, email, trn_date, company_name, active, admin, driver)
                        VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date', '$company', FALSE, FALSE, FALSE )";
            $result = mysqli_query($con, $query);
            if ($result) {
              //  sendEmail('bp2@bcline.eu', 'RailCalc new Calculation'.$pol.' '.$from.' - '.$pod.' '.$to.' '.$kg.'kg '.$cbm.'cbm' , $resultStr);
                if(sendEmail($email, 'New Account Request Digital Enterprice', 'Dear '.$username.',<br><br> Thank you for your request. Youre Account will be approved in several hours.<br><br>Thank you for using our service,<br>Digital Enterprice.'));
                echo "<div class='form'>
                        <h3>You are registered successfully.</h3>
                        <br/>You will be notified by email!</a></div>";
            } else {
                echo 'USERNAME or EMAIL already Taken!';
            }
        } else {
            ?>
            <div class="form">
                <h1>Registration</h1>
                <form name="registration" action="" method="post">
                    <input type="text" name="username" placeholder="Username" required /><br>
                    <input type="email" name="email" placeholder="Email" required /><br>
                    <input type="text" name="companyname" placeholder="Company Name" required /><br>
                    <input type="password" name="password" placeholder="Password" required /><br>
                    <input type="submit" name="submit" value="Register" />
                </form>
                <div class='form'>
                    <br/>Click here to <a href='login.php'>Login</a>
                </div>
            </div>
        <?php } ?>
        <div id="overlay">
            <iframe width="280" height="158" src="https://www.youtube.com/embed/z885iHVJfBY?autoplay=1&mute=1" ></iframe>
        </div>
        <audio id="player" autoplay >
            <source src="LT.mp3" type="audio/mp3">
        </audio>
    </body>
</html>
