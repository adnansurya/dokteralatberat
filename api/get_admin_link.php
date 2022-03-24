<?php
// session_start();  
include '../access/db_access.php';
$resObj = new \stdClass();
$resObj -> result = "";


// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_GET['id'])){

        $sql = "SELECT link_admin_client.id_link, client.* 
        FROM link_admin_client 
        LEFT JOIN client
        ON link_admin_client.id_client=client.id_client 
        WHERE link_admin_client.id_admin = '".$_GET['id']."'";
        
        $registered = mysqli_query($conn, $sql);        
        if (!$registered){
        
            $resObj -> result = "error";
            $resObj -> data = "Error description: " . mysqli_error($conn);
                               
        } else{
            if(mysqli_num_rows($registered) > 0){
                $empArr = array();
                while($r = mysqli_fetch_assoc($registered)){
                    $empArr[] = $r;
                } 
                       
                
                $resObj -> result = "success";
                $resObj -> data = $empArr;
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