<?php
session_start();
if($_GET['mode']=='new'){
    session_unset();
}
?>
<html>
<head>
    <title> Mathematics Game </title>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
    <body>
    <div class="math-box">
        <h1>Mathematics Game</h1>
<!-- =================================================================== -->
        <?php 
        if(!isset($_SESSION['email'])){ 
            ?>
            <form method="post">
                <p>Name</p>
                <input type="text" name="name" id="name" placeholder="Enter Name" required>
                <p>Email</p>
                <input type="email" name="email" id="email" placeholder="Enter Email" required>
                <input type="submit" name="submit" value="Star Game">   
                </form>
<!-- =================================================================== -->
        <?php
        } else {
                ?>
            <form method="post">
            <span>Hallo <?php echo $_SESSION['name'];?>, Selamat datang kembali di permainan ini!!! </span><br>
            <input type="submit" name="submit" value="Star Game">
            <span>Bukan anda? <a href="?mode=new">klik di sini</a></span>
            </form>
        <?php
        }?>
<!-- =================================================================== -->
</div>      
    </body>
</html>
<?php

if(isset($_POST['submit'])){
    if(!isset($_SESSION['email'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
    }
    $_SESSION['lives'] = 5;
    $_SESSION['score'] = 0;
    header('Location: soal1.php');
}
?>