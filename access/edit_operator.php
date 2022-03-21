<?php
// session_start();  
include '../access/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['no_hp']) && isset($_POST['nama'])
     && isset($_POST['id_operator'])){
         
        $sql = "UPDATE operator SET no_hp='".$_POST['no_hp']."', nama='".$_POST['nama']."'        
        WHERE id_operator='".$_POST['id_operator']."'"; 
        
       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../operator.php'; </script>";
        }       
     }else{
         echo 'Parameter Tidak Lengkap';
     }

?>