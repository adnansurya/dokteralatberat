<?php
// session_start();  
include '../access/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['no_id']) && isset($_POST['model']) && isset($_POST['serial_num'])  && isset($_POST['tahun'])
     && isset($_POST['id_client']) && isset($_POST['id_unit'])){
         
        $sql = "UPDATE unit  SET no_id='".$_POST['no_id']."', model='".$_POST['model']."', 
       id_client='".$_POST['id_client']."', tahun='".$_POST['tahun']."' 
        WHERE id_unit='".$_POST['id_unit']."'"; 
        
       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../unit.php'; </script>";
        }       
     }else{
         echo 'Parameter Tidak Lengkap';
     }

?>