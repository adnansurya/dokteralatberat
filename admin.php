<?php 
session_start();
include('access/session.php'); 
include('partials/global.php'); 

 ?>

        
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/head.php'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        
        <title><?php echo $webname; ?> - Admin</title>        
    </head>
    <body>
        <div class="wrapper">
            <?php include('partials/topbar_back.php'); ?>
           
            <?php include('partials/sidebar.php'); ?>
           
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin</h1>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-sm float-right"  data-toggle="modal" data-target="#addAdminModal">
                            <i class="fas fa-plus"></i> Tambah Admin</button>    
                        </div>          
                    </div>
                </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                <!-- Default box -->
                <div class="card">
                   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>                                              
                                        <th>No.</th>
                                        <th>Nama Admin</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Client</th>
                                        <th>Action</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            include 'access/db_access.php';
                                                                                
                                            $load = mysqli_query($conn, "SELECT * FROM admin ORDER BY id_admin DESC");   
                                            while ($row = mysqli_fetch_array($load)){                                         
                                            echo '<tr>';
                                                echo '<td>'.$row['id_admin'].'</td>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.$row['username'].'</td>';
                                                echo '<td>'.$row['email'].'</td>';
                                                echo '<td>
                                                    <button type="button" class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#addClientModal" 
                                                    data-id-admin="'.$row['id_admin'].'" data-nama-admin="'.$row['nama'].'"><i class="fas fa-plus"></i> Tambah</button>
                                                    <a href="unit.php?client='.$row['username'].'">
                                                        <button type="button" class="btn btn-info btn-sm m-1"><i class="fas fa-search"></i> Lihat Semua</button>
                                                    </a>
                                                </td>';
                                                echo '<td>
                                                    <button type="button" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#editAdminModal" 
                                                    data-id-admin="'.$row['id_admin'].'"><i class="fas fa-edit"></i> Edit Data</button>
                                                    <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#resetPassModal" 
                                                    data-id-admin="'.$row['id_admin'].'"><i class="fas fa-sync"></i> Reset Password</button>
                                                </td>';
                                            echo '</tr>';                                
                                            }   
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->                    
                </div>
                <!-- /.card -->

                </section>
                <!-- /.content -->

                <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/add_admin.php" method="post">                                        
                                    <div class="form-group">
                                        <label class="mb-1" for="namaTxt">Nama</label>
                                        <input class="form-control py-4" id="namaTxt" type="text" name="nama"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="usernameTxt">Username</label>
                                        <input class="form-control py-4" id="usernameTxt" type="text" name="username"/>
                                    </div>  
                                    <div class="form-group">
                                        <label class="mb-1" for="emailTxt">Email</label>
                                        <input class="form-control py-4" id="emailTxt" type="email" name="email"/>
                                    </div> 
                                    <div class="form-group">
                                        <label class="mb-1" for="passwordTxt">Password</label>
                                        <input class="form-control py-4" id="passwordTxt" type="password" name="password"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="password2Txt">Ulangi Password</label>
                                        <input class="form-control py-4" id="password2Txt" type="password" name="password2"/>
                                    </div>                                                                              
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                        <button class="btn btn-primary"  type="submit">Simpan</button>
                                    </div>
                                </form>                                    
                            </div>
                        
                        </div>
                    </div>
                </div>  

                <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/edit_admin.php" method="post"> 
                                    <input type="hidden" name="id_admin">                                       
                                    <div class="form-group">
                                        <label class="mb-1" for="namaTxt">Nama</label>
                                        <input class="form-control py-4" id="namaTxt" type="text" name="nama"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="usernameTxt">Username</label>
                                        <input class="form-control py-4" id="usernameTxt" type="text" name="username"/>
                                    </div>         
                                    <div class="form-group">
                                        <label class="mb-1" for="emailTxt">Email</label>
                                        <input class="form-control py-4" id="emailTxt" type="email" name="email"/>
                                    </div>                                                                                                          
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                        <button class="btn btn-primary"  type="submit">Simpan</button>
                                    </div>
                                </form>                                    
                            </div>
                        
                        </div>
                    </div>
                </div> 

                <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Client Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/add_client_to_admin.php" method="post"> 
                                    <input type="hidden" name="id_admin">   
                                    <div class="form-group">
                                        <label class="mb-1" for="nama_adminTxt">Admin</label>
                                        <input class="form-control py-4" id="nama_adminTxt" type="text" name="nama_admin" disabled/>
                                    </div>          
                                    <label class="mb-1" for="clientTxt">Client</label>                         
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                              
                                                <select id="clientSel" class="selectpicker form-control" data-live-search="true" name="id_client[]">
                                                    <?php
                                                        $load = mysqli_query($conn, "SELECT * FROM client");   
                                                        while ($row = mysqli_fetch_array($load)){ 
                                                            echo '<option value="'.$row['id_client'].'">'.$row['nama'].'</option>';
                                                        }
                                                    ?>                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button id="addClientBtn" type="button" class="btn btn-success btn-block float-right align-baseline">Tambah</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="clientDiv"></div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                        <button class="btn btn-primary"  type="submit">Simpan</button>
                                    </div>
                                </form>                                    
                            </div>
                        
                        </div>
                    </div>
                </div>  


            </div>
            <!-- /.content-wrapper -->
            <?php include('partials/footer.php'); ?>
        
           
        </div>
        <?php include('partials/scripts.php'); ?>
        <?php include('partials/datatableJs.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">

                
            $(document).ready(function() { 
                $('.selectpicker').selectpicker();    
               
                $('#addUnitModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    let id_client = $(e.relatedTarget).data('id-client');
                    let nama = $(e.relatedTarget).data('nama-client');    
                    
                    $(e.currentTarget).find('input[name="id_client"]').val(id_client);
                    $(e.currentTarget).find('input[name="nama_client"]').val(nama); 
                   
                });

                $('#editAdminModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    let id_admin = $(e.relatedTarget).data('id-admin');                     
                    let admin;               

                    $.get( "api/get_admin.php", { id : id_admin } )
                        .done(function( data ) {
                            // alert( "Data Loaded: " + data );
                            let dataHasil = JSON.parse(data);
                            
                            if(dataHasil.result == 'success'){
                                admin = dataHasil.data;                                
                                // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                                // console.log(changeForm);
                                // alert(penerima.card_id);
                                $(e.currentTarget).find('input[name="id_admin"]').val(admin.id_admin);
                                $(e.currentTarget).find('input[name="nama"]').val(admin.nama);
                                $(e.currentTarget).find('input[name="username"]').val(admin.username); 
                                $(e.currentTarget).find('input[name="email"]').val(admin.email);                                          
                                
                            }
                    });

                });
                
               
                $('#addClientModal').on('show.bs.modal', function(e) {
                    let id_admin = $(e.relatedTarget).data('id-admin');     
                    let nama = $(e.relatedTarget).data('nama-admin');  
                    $(e.currentTarget).find('input[name="id_admin"]').val(id_admin);
                    $(e.currentTarget).find('input[name="nama_admin"]').val(nama);                                        

                    $('#addClientBtn').click(function(){
                        let id_client = $('#clientSel').val();
                        // alert();
                        $.post( "api/add_client_to_admin.php", { id_admin : id_admin, id_client : id_client } )
                        .done(function( data ) {
                            alert(data);
                        });
                    });
                    
                    // $('#clientSel').change(function(){
                    //     // alert($(this).val());
                    //     var selectedCountry = $(this).children("option:selected").val();
                    //     alert("You have selected the country - " + selectedCountry);
                    // })

                    $.get( "api/get_admin_link.php", { id : id_admin } )
                        .done(function( data ) {
                            alert( "Data Loaded: " + data );
                            let dataHasil = JSON.parse(data);
                            // alert(data);
                            
                            
                            if(dataHasil.result == 'success'){
                                let clients = dataHasil.data; 

                                for(const client in clients){
                                    
                                }
                                                               
                                // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                                // console.log(changeForm);
                                // alert(penerima.card_id);
                                // $(e.currentTarget).find('input[name="id_admin"]').val(admin.id_admin);
                                // $(e.currentTarget).find('input[name="nama"]').val(admin.nama);
                                // $(e.currentTarget).find('input[name="username"]').val(admin.username); 
                                // $(e.currentTarget).find('input[name="email"]').val(admin.email);                                          
                                
                            }
                    });

                });

              
            } );

        </script>
    </body>
</html>
