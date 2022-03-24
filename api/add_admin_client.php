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
            if($rowcount > 0){
                echo "Sudah ada";
            }else{
                $sql = "INSERT INTO 
                link_admin_client (id_admin, id_client) 
                VALUES ('".$_POST['id_admin']."','".$_POST['id_client']."')";
        
                
            
                if(!mysqli_query($conn, $sql)){
                    echo "ERROR";
                }else{
                    echo "BERHASIL INPUT";
                    die();
                    
                    header("location: ../dashboard.php"); 
                                    
                }       
            }
            // header("location: ../permintaan.php");
            // echo "<script> window.location.href = '../admin.php'; </script>";
        }else{
            echo "ERROR";
            
        }  
        
        //Pake ajax, update setiap di klik
        
     }else{
         echo 'Parameter Tidak Lengkap';
     }

?>