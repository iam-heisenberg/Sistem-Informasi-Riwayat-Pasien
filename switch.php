<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
    <script defer src="js/all.js"></script> 
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styling_index.css?<?=filemtime('styling_index.css');?>">
    <title>Switch</title>
</head>
<body>
    <div class="isi">
        <a href="view/resepsionis/Dashboard_Home_depan.php" class="resepsionis" style="text-decoration:none">
            <div class="icon">
                <center> <i class="fas fa-user-nurse icon_text"></i>
                <p class="deskripsi">Resepsionis</p></center>
             </div>
           
        </a>
       
        <a href="view/dokter/Dashboard_Home_Dokter.php" class="dokter" style="margin-left: 100px; text-decoration:none">
            <div class="icon">
                <center> <i class="fa fa-user-md icon_text" aria-hidden="true"></i> 
                <p class="deskripsi" >Dokter</p></center> 
            </div>
        </a>

        <a href="logout.php" class="dokter" style="margin-left: 100px; text-decoration:none">
            <div class="icon">
                <center> <i class="fa fa-user-lock icon_text" aria-hidden="true"></i> 
                <p class="deskripsi" >Lock</p></center> 
            </div>
        </a>
    </div>
</body>
</html>