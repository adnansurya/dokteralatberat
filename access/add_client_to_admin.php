<?php
// session_start();  
include '../access/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['id_client']) && isset($_POST['id_admin'])){

        // $values = $_POST['id_client'];
        // foreach ($values as $a){
        //     echo $a;
        // }
        
        if($result = mysqli_query($conn, "SELECT * FROM link_admin_client WHERE id_client=".$_POST['id_client']." AND id_admin=".$_POST['id_admin'])){
            echo "BERHASIL";
            $rowcount=mysqli_num_rows($result);
            echo "The total number of rows are: ".$rowcount; 
            // header("location: ../permintaan.php");
            // echo "<script> window.location.href = '../admin.php'; </script>";
        }else{
            echo "ERROR";
            
        }  
        
        //Pake ajax, update setiap di klik
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