<?php
// session_start();  
include '../access/db_access.php';
$resObj = new \stdClass();
$resObj -> result = "";


// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_GET['id_admin']) || isset($_GET['id_client']) ){
        $sql = "";
        if(isset($_GET['id_admin'])){
            $sql = "SELECT link_admin_client.id_link, client.* 
            FROM link_admin_client 
            LEFT JOIN client
            ON link_admin_client.id_client=client.id_client 
            WHERE link_admin_client.id_admin = '".$_GET['id_admin']."'";
        }else if(isset($_GET['id_client'])){
            $sql = "SELECT link_admin_client.id_link, admin.* 
            FROM link_admin_client 
            LEFT JOIN admin
            ON link_admin_client.id_admin=admin.id_admin 
            WHERE link_admin_client.id_client = '".$_GET['id_client']."'";
        }
       
        
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
                if(isset($_GET['id_admin'])){
                    $resObj -> data = $_GET['id_admin'];
                }else if(isset($_GET['id_client'])){
                    $resObj -> data = $_GET['id_client'];
                }
                
            }
        }
        
        
        
    
        echo json_encode($resObj);
        
    }else{
        echo 'Data tidak lengkap';
    }

?>