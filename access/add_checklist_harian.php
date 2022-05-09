<?php 

session_start();  

// include_once '../bot/command.php';
include_once 'db_access.php';
// include_once '../partials/global.php';

// if(($_SESSION['logged_role'] == 'SU') || ($_SESSION['logged_role'] == 'AD') ){
$id_admin = 1;// nanti ambil pake session
$jamStart = 0;
$jamStop = 0;
$jamKerja = 0;
$jasa = "";
$sparepart = "";

    if(isset($_POST['id_unit']) && isset($_POST['tanggal']) && isset($_POST['status']) && isset($_POST['lokasi'])){

        $sql = "INSERT INTO 
        checklist_harian (id_unit, model, serial_num, id_client, tahun) 
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