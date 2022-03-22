<?php
session_start();  
include_once 'db_access.php';

// if(($_SESSION['logged_role'] == 'SU')){

    if(isset($_POST['nama']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])){

      if($_POST['password'] != $_POST['password2']){
         echo 'Password tidak cocok';
      }else{
         $sql = "INSERT INTO 
         admin (nama, username, email, password) 
         VALUES ('".$_POST['nama']."','".$_POST['username']."','".$_POST['email']."','".password_hash($_POST['password'], PASSWORD_DEFAULT)."')";

               
         if(!mysqli_query($conn, $sql)){
               echo("Error log: " . $conn -> error);
         }else{
               echo "Berhasil";
               header("location: ../admin.php");
               die();
         }
      }
              
     }else{
        echo 'Data tidak lengkap';
     }

    

// }


?>