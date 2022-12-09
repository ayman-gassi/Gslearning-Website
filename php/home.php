<?php
     session_start();
     if($_SESSION['name']==""){
         header('location:../index.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" type="image/x-icon" href="../images/online-learning.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Gslearning | home</title>
</head>
<body>
    <nav class="navbar">
            <div class="logo"  id="up">
                <a href="home.php"><img src="../images/online-learning.png"></a>
                <p>Gslearning</p>
            </div>
            <div class="pages">
                <ul class="pg">
                    <a href="./home.php" class="h"><li>Home</li></a>
                    <a href="./courses.php"><li>Courses</li></a>
                    <a href="./publication.php"><li>publications</li></a>
                    <a href="./contact.php"><li>Email Us</li></a>
                    <a href="./logout.php"><li>Log Out</li></a>
                </ul>
                
            </div>
            
    </nav>
    <div class="contact">
        <a href="#" target="_blank"><img src="../images/facebook.png"></a><br>
        <a href="#" target="_blank"><img src="../images/instagram.png"></a><br>
        <a href="#" target="_blank"><img src="../images/linkedin.png"></a><br>
        <a href="#" target="_blank"><img src="../images/github.png"></a><br>
    </div>
    <div class="main1">
        <div class="welcome">
                <img src="../images/Megafone anunciado com balão em um design plano _ Vetor Premium.jpeg">
               
                <?php
                     
                     $name = $_SESSION['name'];
                 echo("<p>welcome $name </p>");
                 ?>
                <h5>To</h5>
                <h4>Gslearning</h4>
        </div>
        <div class="slide">
                <img class="right" src="../images/right-arrow.png">
                <img class="left" src="../images/left-arrow.png">
                <div class="all">
                <img class="active" src="../images/téléchargement (1).jpeg">
                <img src="../images/téléchargement.jpeg">
                <img src="../images/téléchargement.png">
                </div>
        </div>
        <a href="#DN"><img class="go_down" src="../images/go-down.png"></a>
    </div>
    <div class="main2">
            <a href="#end" class="dd"><img  src="../images/down-chevron.png"></a>
            <div id="DN">
                <img src="../images/programing.png" class="cp">
                <div class="if">
                    <h3>Computer Science</h3>
                    <p>Having a computing major will provide you with a foundation of knowledge, problem solving, and logical thinking that will serve as a competitive advantage to you in your career, in whatever field you choose.</p>
                </div>
            </div>
               
            <div id="DN">
                <img src="../images/programming.png" class="cp">
                <div class="if">
                    <h3>Why programming?</h3>
                    <p>Computer programming is vital today because so much of our world is automated. People need to be able to control the interaction between humans and machines. Since computers and devices can do things so efficiently and accurately, we use computer programming to harness that computing power</p>
                </div>
            </div>

            <div id="DN">
                <img src="../images/computer-science.png" class="cp">
                <div class="if">
                    <h3>IS Coding Hard To Learn?</h3>
                    <p>Coding is easy to learn if you choose an introductory programming language. If you try to start off with a more complex coding language, it can be hard to learn to code. Take the time to learn easier languages like <a href="#">HTML</a>, <a href="#"> CSS </a> , <a href="#"> C </a>, before moving on to complex languages like C++ , Java ...</p>
                </div>
            </div>
    </div>

    <div class="vd">
            <h3> -Stay Motivated- </h3>
            <video controls  >
                <source src="../images/How to stay motivated when learning to code_.mp4">
            </video>
            <a href="#up" ><img class="go_up" src="../images/up-arrow.png"></a>
    </div>
             <script src="../js/home.js"> </script>
</body>
<footer id="end">
    &copy;XjonSnow
</footer>
</html>