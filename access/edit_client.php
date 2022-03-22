<?php
// session_start();  
include '../access/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['username']) && isset($_POST['nama'])
     && isset($_POST['id_client'])){
         
        $sql = "UPDATE client SET username='".$_POST['username']."', nama='".$_POST['nama']."'        
        WHERE id_client='".$_POST['id_client']."'"; 
        
       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../client.php'; </script>";
        }       
     }else{
         echo 'Parameter Tidak Lengkap';
     }

?>