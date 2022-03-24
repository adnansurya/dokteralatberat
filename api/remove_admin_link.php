<?php
// session_start();  
include '../access/db_access.php';

if(isset($_GET['id_link'])){
    $sql = "DELETE from link_admin_client WHERE id_link=".$_GET['id_link'];

        
    if(!mysqli_query($conn, $sql)){
        echo("Error log: " . $conn -> error);
    }else{
        echo "Berhasil";
        header("location: ../admin.php");
        die();
    }
}else{
    echo 'ERROR:Parameter Tidak Lengkap';
}

?>