<?php 
    session_start(); 
    include('koneksi.php'); 
    if(isset($_POST['jawaban1'])){ 
        $jawaban= $_POST['jawabanAnda']; 
        $masuk=mysqli_query($koneksi,"select * from login where pertanyaan='$jawaban' limit 1");
        if(mysqli_num_rows($masuk)==1){
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
    <link rel="stylesheet" type="text/css" href="styling_lock.css?<?=filemtime('styling_lock.css');?>">
    <title>Lock</title>
</head>
<body>
  <div class="test">
    <form method="POST" style="width:90%;margin-left:5%;margin-top:3%" required>
        
        <?php
            include "koneksi.php";
            $lupa = mysqli_query($koneksi,"select * from login"); 
            $lupa_tampil = mysqli_fetch_array($lupa);
            
        ?>

        <div class="form-row">
            <label for="username">Username: </label>
            <input type="text" value="<?php echo $lupa_tampil['username'] ?>" class="form-control" disabled>
        </div>

        <div class="form-row" style="margin-top:5%">
            <label for="password">password: </label>
            <input type="text" value="<?php echo $lupa_tampil['password'] ?>"  class="form-control" disabled>
        </div>
        
       
        <div class="form-row" style="margin-top:5%">
        
            <div class="form-group col">
                <a href="index.php"><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modelId">
                    Kembali
                </button></a>
            </div>
        </div>
    </form>
  </div>

  
</body>
</html>

            <?php
            unset($_SESSION['errorMessage']);
            session_unset();
            session_destroy();
        }else{
            $_SESSION['errorMessage1'] = true;
            header("Location: lupaForm.php");
        }
    }

    
?>