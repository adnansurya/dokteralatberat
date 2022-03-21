<?php 
session_start();
include('access/session.php'); 
include('partials/global.php'); 

 ?>

        
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('partials/head.php'); ?>
        
        <title><?php echo $webname; ?> - Operator</title>        
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
                            <h1>Operator</h1>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-sm float-right"  data-toggle="modal" data-target="#operatorModal">
                                <i class="fas fa-plus"></i> Tambah Operator</button>    
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
                                        <th>Nama Operator</th>
                                        <th>No HP</th>
                                        <th>Foto KTP/SIM</th>
                                        <th>Action</th>                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            include 'access/db_access.php';
                                                                                
                                            $load = mysqli_query($conn, "SELECT * FROM operator ORDER BY id_operator DESC");   
                                            while ($row = mysqli_fetch_array($load)){                                         
                                            echo '<tr>';
                                                echo '<td>'.$row['id_operator'].'</td>';
                                                echo '<td>'.$row['nama'].'</td>';
                                                echo '<td>'.$row['no_hp'].'</td>';  
                                                echo '<td>'.$row['foto_identitas'].'</td>';                                                                                               
                                                echo '<td>
                                                    <button type="button" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#editOperatorModal" 
                                                    data-id-operator="'.$row['id_operator'].'"><i class="fas fa-edit"></i> Edit Data</button>
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

                <div class="modal fade" id="operatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Operator Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/add_operator.php" method="post">                                        
                                    <div class="form-group">
                                        <label class="mb-1" for="namaTxt">Nama</label>
                                        <input class="form-control py-4" id="namaTxt" type="text" name="nama"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="no_hpTxt">No. HP</label>
                                        <input class="form-control py-4" id="no_hpTxt" type="text" name="no_hp"/>
                                    </div>    
                                    <div class="form-group">
                                        <label  class="mb-1" for="exampleInputFile">Foto KTP/SIM</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
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

                <div class="modal fade" id="editOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Operator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/edit_operator.php" method="post">  
                                    <input type="hidden" name="id_operator">                                         
                                    <div class="form-group">
                                        <label class="mb-1" for="namaTxt">Nama</label>
                                        <input class="form-control py-4" id="namaTxt" type="text" name="nama"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="no_hpTxt">No. HP</label>
                                        <input class="form-control py-4" id="no_hpTxt" type="text" name="no_hp"/>
                                    </div>    
                                    <div class="form-group">
                                        <label  class="mb-1" for="exampleInputFile">Foto KTP/SIM</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
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
        <script type="text/javascript">

                
            $(document).ready(function() {            
                $('#editOperatorModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    let id_operator = $(e.relatedTarget).data('id-operator');                     
                    let operator;               

                    $.get( "api/get_operator.php", { id : id_operator } )
                        .done(function( data ) {
                            // alert( "Data Loaded: " + data );
                            let dataHasil = JSON.parse(data);
                            
                            if(dataHasil.result == 'success'){
                                operator = dataHasil.data;                                
                                // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                                // console.log(changeForm);
                                // alert(penerima.card_id);
                                $(e.currentTarget).find('input[name="id_operator"]').val(operator.id_operator);
                                $(e.currentTarget).find('input[name="nama"]').val(operator.nama);
                                $(e.currentTarget).find('input[name="no_hp"]').val(operator.no_hp);                                           
                                
                            }
                        });

                    });


            } );

        </script>
    </body>
</html>
