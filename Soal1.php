<?php
session_start();
$a = rand(0,20);
$b = rand(0,20);
if($_SESSION['lives'] <= 0){
    echo $_SESSION['lives']; 
    header("Location: over.php");
}
?>
<html>
<head>
    <title> Mathematics Game | Soal </title>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
    <body>
    <div class="math-box">
        <h1>Mathematics Game</h1>
            <form method="POST">
            <span>Hallo <?php  print_r($_SESSION['name']); ?>, Tetap Semangat ya...</span><br>
            <span>You Can Do The Best!!!</span><br>
            <span>Lives : <?php print_r($_SESSION['lives']) ?> | Score : <?php print_r( $_SESSION["score"]) ?></span><br>
            <span>Berapakah <?php echo $a .' + '.  $b; ?> = </span>
            <input type="hidden" name="a" value="<?php echo $a; ?>">
            <input type="hidden" name="b" value="<?php echo $b; ?>">
            <input type="number" name="jawab" placeholder="Enter Jawaban" required>
            <input type="submit" name="submit" value="SUBMIT">
            </form>
        </div>
    </body>
</html>
<?php 
echo $jawaban;
if($_POST['jawab']){
    if($_POST['isi'] == $_POST['a']+$_POST['b']){
        $_SESSION['score'] += 10;
        header("Location: hasil.php?result=success");
    }else{
        $_SESSION['lives'] -= 1;
        $_SESSION['score'] -= 2;
        if($_SESSION['lives'] > 0){
            header("Location: hasil.php?result=failed");
        } else {
            include("function.php");
            $lib = new Crud();
            $insert = $lib->create('scores', array('name'=>$_SESSION[name],'score'=>$_SESSION['score']));
            header("Location: selesai.php");
        }
        
    }
}
?>