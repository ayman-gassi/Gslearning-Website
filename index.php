
<?php
$localhost="localhost";
$user="root";
$password="";
$database="login";
$con=mysqli_connect($localhost,$user,$password);
mysqli_select_db($con,$database);
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM loogin WHERE USER = '$username' AND PASS ='$password' LIMIT 1";
    $rslt= mysqli_query($con,$sql);
    if($username=="" || $password==""){
        header('location:index.php?missing');
    }
    if(mysqli_num_rows($rslt)==1){
        $_SESSION['name'] = $username;
        header('location:php/home.php');
        die;
    }
    else{
        header('location:index.php?error');
        exit();
    }
} 
if(isset($_POST['sign'])){
    header('location:php/signup.php');
}
if(isset($_POST['forget'])){
    header('location:php/forget.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" type="image/x-icon" href="./images/online-learning.ico">
    <title>Gslearning</title>
</head>
<body>
    <nav class="navbar">
            <div class="logo" >
                <a href="index.php"><img src="./images/online-learning.png"></a>
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
                    echo("<div class=\"alert\">User name or Password is incorrect</div>");    
                }
                if(isset($_GET['missing'])){
                    echo("<div class=\"alert\">Fill all the blanks</div>");    
                }
                if(isset($_GET['done'])){
                    echo("<div class=\"alert1\">Account Created</div>");    
                }
             ?>
    <div class="main" id=main >
        <form method="POST" action="#" >
            <img class="img1" src="./images/login.png">
            <h3>LOGIN</h3>
            <input placeholder="Enter Your Username" autocomplete="off"  name="username" v-model="UP" type="text">
            <input placeholder="Enter Your Password" name="password" autocomplete="off"  :type="Field"><br>
            <img @click.prevent="change" :src="pic1"  class="hide">
            <button class="login" name="submit" :disabled="!UP"  type="submit">Login</button><br>
            <button class="fg" name="forget">Forget Password</button>
            <button class="sn" name="sign" >Sign up</button>
        </form>
    </div>
</body>
<footer>
        <a class="insta" href="#"><img src="./images/facebook.png"></a>
        <a class="insta" href="#"><img src="./images/instagram.png"></a>
        <a class="insta" href="#"><img src="./images/github.png"></a>
        <a class="insta" href="#"><img src="./images/linkedin.png"></a>
</footer>
<script src="./js/vue.js" ></script> 
<script>
    var ump = new Vue({
        el:"#main",
        data:{
            UP: null ,
            Field : "password",
            pic1 : "./images/show.png",
        },
        methods: {
            change : function(){
                this.Field= this.Field === "password" ? "text" : "password";
                this.pic1 = this.pic1 === "./images/show.png" ? "./images/hidden.png" : "./images/show.png" ;
            }
        },


    });


</script>  
</html>