<?php 
    session_start(); 
    include('koneksi.php'); 
    $username= $_POST['username']; 
    $password= $_POST['password'];

    if(isset($_POST['login'])){
       
        $masuk=mysqli_query($koneksi,"select * from login where username='$username' and password='$password' limit 1");
        if(mysqli_num_rows($masuk)==1){
            $_SESSION['username'] = $username;
            header("Location: switch.php");
        }else{
            $_SESSION['errorMessage'] = true;
            header("Location: index.php");
        }
    }

    
?>