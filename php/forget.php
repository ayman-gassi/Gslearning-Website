
<?php
$localhost="localhost";
$user="root";
$password="";
$database="login";
$con=mysqli_connect($localhost,$user,$password);
mysqli_select_db($con,$database);
session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    if($email==""){
        header('location:forget.php?error3');
    }
    else{
    $sql="SELECT PASS FROM loogin WHERE email ='$email' LIMIT 1";
    $rslt=mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($rslt);
    if(mysqli_num_rows($rslt)==1){
        $main="GSlearning \r\n this is your password : ".$r;
        $subject="Password Recovery";
        $from ="From"."R141051419@taalim.ma";
        mail($email,$subjct,$main,$from);
        header('location:forget.php?error2');
        session_destroy();
         }
    else{
        header('location:forget.php?error2');
        echo("you need a server");
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/x-icon" href="../images/online-learning.ico">
    <title>Gslearning | Recovering</title>
</head>
<body>
    <nav class="navbar">
            <div class="logo" >
               <a href="../index.php"> <img src="../images/online-learning.png"></a>
                <p>Gslearning</p>
            </div>
            <div class="pages">
                <ul>
                    <li>LOGIN / SIGN UP</li>
                </ul>
            </div>
    </nav>
            <?php

                if(isset($_GET['error2'])){
                    echo("<div class=\"alert1\" style=\"margin-top:63px;\" >Check your email box</div>");    
                }
                if(isset($_GET['error3'])){
                    echo("<div class=\"alert\" style=\"margin-top:63px;\">fill the blank</div>");    
                }
             ?>
    <div class="main">
        <form method="POST" action="#" >
            <img class="img1" src="../images/login.png">
            <h3>Password Recovery</h3>
            <p class="info1">your password will automatically<br> send to your email</p>
            <input placeholder="Enter Your Email" name="email" type="text"><br>
            <button class="login" name="submit" type="submit">Send</button><br>
        </form>
    </div>
</body>
<footer>
        <a class="insta" href="#"><img src="../images/facebook.png"></a>
        <a class="insta" href="#"><img src="../images/instagram.png"></a>
        <a class="insta" href="#"><img src="../images/github.png"></a>
        <a class="insta" href="#"><img src="../images/linkedin.png"></a>
</footer>
</html>