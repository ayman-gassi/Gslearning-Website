
<?php
$localhost="localhost";
$user="root";
$password="";
$database="login";
$con=mysqli_connect($localhost,$user,$password);
mysqli_select_db($con,$database);
session_start();
if(isset($_POST['submit'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM loogin WHERE USER ='$name' LIMIT 1";
    $rslt=mysqli_query($con,$sql);
    if(mysqli_num_rows($rslt)==1){
        header('location:signup.php?error');
    }
    else if($name=="" || $email=="" || $password==""){
        header('location:signup.php?error1');
    }
    else{
    $sql2="INSERT INTO loogin (USER,email,PASS) VALUES('$name','$email','$password')";
    $rqlt2=mysqli_query($con,$sql2);
    header('location:../index.php?done');
    session_destroy();
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
    <title>Gslearning | Sign Up</title>
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

                if(isset($_GET['error'])){
                    echo("<div class=\"alert\">UserName allready exist</div>");    
                }
                else if(isset($_GET['error1'])){
                    echo("<div class=\"alert\">Missing Elements</div>");    
                }
             ?>
    <div class="main">
        <form method="POST" action="#" >
            <img class="img1" src="../images/login.png">
            <h3>Sign Up</h3>
            <input placeholder="Enter a Username" name="username" type="text">
            <input placeholder="Enter a Email" name="email" type="email">
            <input placeholder="Enter a password" name="password" type="text"><br>
            <button class="login" name="submit" type="submit">Sign Up</button><br>
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