<?php 

session_start();  

// include_once '../bot/command.php';
include_once 'db_access.php';
// include_once '../partials/global.php';

// if(($_SESSION['logged_role'] == 'SU') || ($_SESSION['logged_role'] == 'AD') ){

    if(isset($_POST['no_id']) && isset($_POST['model']) && isset($_POST['serial_num']) && isset($_POST['id_client']) && isset($_POST['tahun'])){

        $sql = "INSERT INTO 
        unit (no_id, model, serial_num, id_client, tahun) 
        VALUES ('".$_POST['no_id']."','".$_POST['model']."','".$_POST['serial_num']."','".$_POST['id_client']."','".$_POST['tahun']."')";

            
        if(!mysqli_query($conn, $sql)){
            echo("Error log: " . $conn -> error);
        }else{
            echo "Berhasil";
            header("location: ../unit.php");
            die();
        }
    }else{
        echo 'ERROR:Parameter Tidak Lengkap';
    }
// }else{
//     echo 'Akses tidak terotorisasi';
// }
?>