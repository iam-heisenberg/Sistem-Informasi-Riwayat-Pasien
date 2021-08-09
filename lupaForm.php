<?php session_start(); ?>
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
    <link rel="stylesheet" type="text/css" href="styling_lock.css?<?=filemtime('styling_lock.css');?>">
    <title>Bantuan Passwoard</title>
</head>
<body>
  <div class="test">
        <?php
            if (isset($_SESSION['errorMessage1'])){ ?>
                <div style="height:15px"></div>
                <span style='color:red; margin-left:5%; margin-top:15%;'>Jawaban anda salah !</span>
            <?php }
        ?>

    <form action="bantuanPass.php" method="POST" style="width:90%;margin-left:5%;margin-top:3%" required>
        <div class="form-row">
            <label for="jawabanAnda">Apa merek kamera DSLR pertama anda? </label>
            <input type="text" name="jawabanAnda"  placeholder="Masukan Jawaban Anda (Case Sensitive)" class="form-control" required>
            
        </div>
        
       
        <div class="form-row" style="margin-top:5%">
            <div class="form-group col">
                <button type="submit" name="jawaban1" class="btn btn-primary form-control">Jawab</button>
                
            </div>
        
            <div class="form-group col">
                <a href="index.php"><button type="button" class="btn btn-primary form-control"> 
                   Kembali 
                </button></a>
            </div>
        </div>
    </form>
  </div>
    
</body>
</html>