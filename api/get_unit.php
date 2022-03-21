<?php
// session_start();  
include '../access/db_access.php';
$resObj = new \stdClass();
$resObj -> result = "";


// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_GET['id'])){
        
        $registered = mysqli_query($conn, "SELECT * FROM unit WHERE id_unit = '".$_GET['id']."'");        
        if (!$registered){
        
            $resObj -> result = "error";
            $resObj -> data = "Error description: " . mysqli_error($conn);
                               
        } else{
            if(mysqli_num_rows($registered) > 0){
                $r = mysqli_fetch_assoc($registered); 
                       
                
                $resObj -> result = "success";
                $resObj -> data = $r;
            }else{
                $resObj -> result = "unknown";
                $resObj -> data = $_GET['id'];
            }
        }
        
        
        
    
        echo json_encode($resObj);
        
    }else{
        echo 'Data tidak lengkap';
    }

?>