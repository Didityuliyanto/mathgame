<?php
session_start();
if($_SESSION['lives'] > 0){
    echo $_SESSION['lives']; 
    header("Location: soa1.php");
}
if (isset($_GET['submit'])) {
	header('Location: index.php');
}
include("function.php");
$lib = new Crud();
?>
<html>
<head>
    <title> Mathematics Game </title>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
    <body>
  	  	<div class="math-box">
        <h1>Mathematics Game</h1>
         <form method="GET">
           		<span>Hello, <?php echo $_SESSION['name']; ?>… Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</span><br>
           		<span>Lives : <?php echo $_SESSION['lives']; ?> | Score : <?php echo $_SESSION['score']; ?></span>
            	<input type="submit" name="submit" value="Mulai">
            	<table align="center" style="color: #fff; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 1px 20px;">No</th>
                                    <th style="padding: 1px 20px;">Nama</th>
                                    <th style="padding: 1px 20px;">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                $select = $lib->read('scores','ORDER BY score DESC LIMIT 10');
                                foreach ($select as $value){
                                    echo '<tr ">';
                                    echo '<td style="padding: 1px 20px;">'.$no.'</td>';
                                    echo '<td style="padding: 1px 20px;">'.$value['name'].'</td>';
                                    echo '<td style="padding: 1px 20px;">'.$value['score'].'</td>';
                                    echo '</tr>';
                                    $no+=1; }?>
                            </tbody>
                        </table>
            </form>
        </div>
    </body>
</html>