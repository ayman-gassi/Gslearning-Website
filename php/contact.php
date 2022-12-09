<?php
session_start();
if($_SESSION['name']==""){
    header('location:../index.php');
}

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $subject= $_POST['subject'];
    $msg= $_POST['message'];
    $head = "From : ". $email;
    $main = $name."\r\n".$msg;
    $to="aymanegassi972003@gmail.com";
   if($name=="" || $email=="" || $subject=="" || $msg==""){
        header('location:./contact.php?missing');
   }
    else if(mail($to,$subject,$main,$head)){
        header('location:./contact.php?Done');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="icon" type="image/x-icon" href="../images/online-learning.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Gslearning | Contact US</title>
</head>
<body>
    <nav class="navbar">
            <div class="logo" >
                <a href="home.php"><img src="../images/online-learning.png"></a>
                <p>Gslearning</p>
            </div>
            <div class="pages">
                <ul class="pg">
                    <a href="./home.php"><li>Home</li></a>
                    <a href="./courses.php" ><li>Courses</li></a>
                    <a href="./publication.php"><li>publications</li></a>
                    <a href="./contact.php" class="h"><li>Email Us</li></a>

                    <a href="./logout.php?logout=1"><li>Log Out</li></a>
                </ul>
                
            </div>
            
    </nav>
    <h2>-Contact US-</h2>
    <?php
    if(isset($_GET['missing'])){
                    echo("<div class=\"alert\">Fill All the Blanks</div>");    
                }
    if(isset($_GET['Done'])){
                    echo("<div class=\"alert1\">Your Email Has Been Sent</div>");    
                }
    ?>
    <div class="container">
        <img class="pic" src="../images/Gmail_App_3D_Icon-removebg-preview.png">
        <div class="frm">
            <form method="POST" action="#">
                    <input type="text" name="name" placeholder="Enter Your Fullname"><br>
                    <input type="email" name="email" placeholder="Enter Your Email"><br>
                    <input type="text" name="subject" placeholder="Name Your Subject"><br>
                    <textarea name="message" placeholder="Enter Your msg"></textarea><br>
                    <button type="submit" name="submit">SEND</button>
            </form>
        </div>
    </div>
</body>
</html>