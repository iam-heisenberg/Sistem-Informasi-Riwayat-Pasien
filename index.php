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
    <title>Lock</title>
</head>
<body>
  <div class="test">
        <?php
            if (isset($_SESSION['errorMessage'])){ ?>
                <div style="height:15px"></div>
                <span style='color:red; margin-left:5%; margin-top:15%;'>Username atau Password anda salah !</span>
            <?php }
        ?>

    <form action="login.php" method="POST" style="width:90%;margin-left:5%;margin-top:3%" required>
        <div class="form-row">
            <label for="username">Username: </label>
            <input type="text" autocomplete="off" name="username" id="username" placeholder="Masukan username" class="form-control" required>
        </div>

        <div class="form-row" style="margin-top:5%">
            <label for="password">password: </label>
            <input type="password"  autocomplete="off"  name="password" id="password" placeholder="Masukan password" class="form-control" required>
        </div>
        
       
        <div class="form-row" style="margin-top:5%">
            <div class="form-group col">
                <button type="submit" name="login" class="btn btn-primary form-control">Masuk</button>
            </div>
        
            <div class="form-group col">
                <a href="lupaForm.php"><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modelId">
                    Lupa?
                </button></a>
            </div>
        </div>
    </form>
  </div>

  
</body>
</html>