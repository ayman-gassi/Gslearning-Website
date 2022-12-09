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
    <link rel="stylesheet" href="../css/coursee.css">
    <link rel="icon" type="image/x-icon" href="../images/online-learning.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Gslearning | Courses</title>
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
                    <a href="./contact.php" class="h"><li>Courses</li></a>
                    <a href="./publication.php"><li>publications</li></a>
                    <a href="./contact.php"><li>Email Us</li></a>
                    <a href="./logout.php"><li>Log Out</li></a>
                </ul>
                
            </div>
            
    </nav>
    <h2>-Our Courses-</h2>
    <input class="search" type="text" placeholder="Search for a Course">
    <div class="main">
        <?php
            include 'data.php';
            foreach($Courses as $a){
                echo("<a class=\"clink\" href=\"#\"><div class=\"box\">  ");
                echo("<div class=\"text1\" ><img src=\"{$a['img']}\" ></div>
                <div class=\"text2\">
                <h3>{$a['nom']}</h3>
                <p>{$a['desc']}</p>
                </div>");
                echo("</div></a>");
            }
        ?>
        <div class="pop">
            <img class="close"  id ="top" src="../images/close.png">
            <div class="mam">

            </div>
            <a href="#top"><img class="to_the_top" src="../images/up-arrow.png"></a>
            <div class="wesh"></div>
        </div>
    </div>
    </body>
    <script src="../js/courses.js" ></script>
    </html>