<?php
   session_start(); 
    if($_SESSION['name']==""){
        header('location:../index.php');
    }

    if(isset($_POST['sub'])){
        $msg=$_POST['pub'];
        $title=$_POST['subject'];
        if($msg=="" || $title==""){
            header('location:./publication.php?missing');
        }
        else{
        
        $date = date("d-m-y h:i");
        $user = $_SESSION['name'];
        $dt = file_get_contents('pub.json');
        $array = json_decode($dt,true);
        $data = array(
            'user' => $user,
            'msg' => $msg,
            'date' => $date,
            'title' => $title
        );
        $array[] = $data ; 
        $fdata = json_encode($array);
        if(file_put_contents('pub.json',$fdata)){
            header('location:./publication.php?Done');
            echo("<script>window.location.reload()</script>");
        }
        }

    }
    if(isset($_POST['delete'])){
        $dt = file_get_contents('pub.json');
        $array = json_decode($dt,true);
        foreach($array as $s => $value){
            unset($array[$s]);
        }
        $final= json_encode($array);
        if(file_put_contents('pub.json',$final)){
            header('location:./publication.php?Done2');
            echo("<script>window.location.reload()</script>");
        }
    }
    if(isset($_POST['deleteitems'])){
        $userd = $_POST['userd'];
        $blogn = $_POST['pubd'];
        if($userd=="" || $blogn==""){
            header('location:./publication.php?error1');
        }
        else{
            $dt = file_get_contents('pub.json');
            $array = json_decode($dt,true);
            foreach($array as $s => $value){
                if($value['user'] == $userd && $value['title']==$blogn){
                    unset($array[$s]);
                }
            }
            $final= json_encode($array);
            if(file_put_contents('pub.json',$final)){
                header('location:./publication.php?Done3');
                echo("<script>window.location.reload()</script>");
            }
           
        }
    }
    if(isset($_POST['updateitems'])){
        $userp = $_POST['userud'];
        $blogp = $_POST['pubuud'];
        $blogpp = $_POST['pubud'];
        if($userp=="" || $blogp==""){
            header('location:./publication.php?error1');
        }
        else{
            $dt = file_get_contents('pub.json');
            $array = json_decode($dt,true);
            foreach($array as $s => $value){
                if($value['title']==$userp){
                        if($value['user'] != $_SESSION['name']){
                            header('location:./publication.php?error2');
                            echo("<script>window.location.reload()</script>");  
                        }
                        else{
                        $array[$s]['title']=$blogp;
                        $array[$s]['msg']=$blogpp;
                        $final= json_encode($array);
                        if(file_put_contents('pub.json',$final)){
                            header('location:./publication.php?Done4');
                            echo("<script>window.location.reload()</script>");
                        }
                        }
                }
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
    <link rel="stylesheet" href="../css/publication.css">
    <link rel="icon" type="image/x-icon" href="../images/online-learning.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Gslearning | publications</title>
</head>
<body>
    <nav class="navbar">
            <div class="logo"  id="up">
                <a href="home.php"><img src="../images/online-learning.png"></a>
                <p>Gslearning</p>
            </div>
            <div class="pages">
                <ul class="pg">
                    <a href="./home.php"><li>Home</li></a>
                    <a href="./courses.php"><li>Courses</li></a>
                    <a href="./publication.php" class="h" ><li>publications</li></a>
                    <a href="./contact.php"><li>Email Us</li></a>
                    <a href="./logout.php"><li>Log Out</li></a>
                </ul>
                
            </div>
            
    </nav>
    <div class="main">
        <div class="friends">
                <h4> All Users</h4>
                <?php
                    $localhost="localhost";
                    $user="root";
                    $password="";
                    $database="login";
                    $con=mysqli_connect($localhost,$user,$password);
                    mysqli_select_db($con,$database);
                    $sql="SELECT USER FROM loogin";
                    $rslt= mysqli_query($con,$sql);
                    while($rslt1= mysqli_fetch_assoc($rslt)){
                        echo("<div class=\"FD\">
                            <img class=\"userpic\" src=\"../images/user.png\">
                            <p>  {$rslt1['USER']} </p>
                         </div> ");
                    }
                ?>
        </div>
        <div class="container">
            <div class="add">
                    <img src="../images/publication.png">
                    <div class="right">
                            <?php
                                
                                $name = $_SESSION['name'];
                                echo("<p> $name </p>")
                            ?>
                            <form action="#" method="POST">
                            <input name="subject" type="text" placeholder="name Your Publication" >
                            <textarea name="pub"  placeholder="right your publication" ></textarea>
                            <?php
                                
                                    if(isset($_GET['missing'])){
                                        echo("<div class=\"alert\">missing element</div>");    
                                    }
                                    if(isset($_GET['Done'])){
                                        echo("<div class=\"alert1\">Done</div>");    
                                    }
                                    if(isset($_GET['Done2'])){
                                        echo("<div class=\"alert2\"> ! You Delete All Publications !</div>");    
                                    }
                                    if(isset($_GET['Done3'])){
                                        echo("<div class=\"alert2\"> ! You Delete a Publication !</div>");    
                                    }
                                    if(isset($_GET['Done4'])){
                                        echo("<div class=\"alert2\"> ! You Update a Publication !</div>");    
                                    }
                                    if(isset($_GET['error1'])){
                                        echo("<div class=\"alert3\"> ! fill all the blanks !</div>");    
                                    }
                                    if(isset($_GET['error2'])){
                                        echo("<div class=\"alert3\"> ! not a blog or its not yours !</div>");    
                                    }
                            ?>
                            <button type="submit" class="sub" name="sub">Publish</button>
                            </form>


                            
                    </div>
            </div>
            <?php
                
                
                    echo("
                    <form action=\"\" method=\"POST\" >
                    <div class=\"tools\">  
                        <h4>-Pub Tools-</h4>"); 
                        if($_SESSION['name']=="XjonSnow"){     
                            echo("            
                            <a class=\"special\" >  <img src=\"../images/delete.png\" > <button  name=\"delete\" >Delete All</button></a>  
                            <a>  <img src=\"../images/website.png\" > <button class=\"deleteitm\" >Delete Blog</button></a>  
                            <div class=\"ditm\" >    <input type=\"text\" placeholder=\"name of the user\" name=\"userd\" ><br> <input type=\"text\" placeholder=\"name of the publication\" name=\"pubd\" > <br> <button name=\"deleteitems\" >Delete</button>   </div>          
                            ");
                        }      
                            echo("
                            <a>  <img src=\"../images/pencil.png\" > <button class=\"editp\" >Edit Blog</button></a> 
                            <div class=\"ditm1\" >    <input type=\"text\" placeholder=\" Publication name\" name=\"userud\" ><br> <input type=\"text\" placeholder=\"new subject\" name=\"pubuud\" >  <br><textarea type=\"text\" placeholder=\"new publication\" name=\"pubud\" ></textarea> <br> <button name=\"updateitems\" >Update</button>   </div>   
                     </div>
                        </form>"
                        );
                
             ?>
            <div class="show"></div>
           
            </div>

    </div>
    <script src="../js/publication.js"></script>
</body>
</html>