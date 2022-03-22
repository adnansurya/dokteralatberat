<?php
// session_start();  
include '../access/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['username']) && isset($_POST['nama']) && isset($_POST['email'])
     && isset($_POST['id_admin'])){
         
        $sql = "UPDATE admin SET username='".$_POST['username']."', nama='".$_POST['nama']."', email='".$_POST['email']."'        
        WHERE id_admin='".$_POST['id_admin']."'"; 
        
       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../admin.php'; </script>";
        }       
     }else{
         echo 'Parameter Tidak Lengkap';
     }

?>