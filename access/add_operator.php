<?php
session_start();  
include_once 'db_access.php';

// if(($_SESSION['logged_role'] == 'SU')){

    if(isset($_POST['nama']) && isset($_POST['no_hp'])){

     
        $sql = "INSERT INTO 
        operator (nama, no_hp, foto_identitas) 
        VALUES ('".$_POST['nama']."','".$_POST['no_hp']."','-')";

            
        if(!mysqli_query($conn, $sql)){
            echo("Error log: " . $conn -> error);
        }else{
            echo "Berhasil";
            header("location: ../operator.php");
            die();
        }
      
              
     }else{
        echo 'Data tidak lengkap';
     }

    

// }


?>