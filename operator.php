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
                                                    <button type="button" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#resetPassModal" 
                                                    data-cliend-id="'.$row['id_operator'].'"><i class="fas fa-sync"></i> Reset Password</button>
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

                <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/add_unit.php" method="post"> 
                                    <input type="hidden" name="id_client">                                       
                                    <div class="form-group">
                                        <label class="mb-1" for="no_idTxt">No. ID</label>
                                        <input class="form-control py-4" id="no_idTxt" type="text" name="no_id"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="modelTxt">Model</label>
                                        <input class="form-control py-4" id="modelTxt" type="text" name="model"/>
                                    </div>  
                                    <div class="form-group">
                                        <label class="mb-1" for="serial_numTxt">Serial Number</label>
                                        <input class="form-control py-4" id="serial_numTxt" type="text" name="serial_num"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="clientTxt">Client</label>
                                        <input class="form-control py-4" id="clientTxt" type="text" name="nama_client" disabled/>
                                    </div> 
                                    <div class="form-group">
                                        <label class="mb-1" for="tahunTxt">Tahun</label>
                                        <input class="form-control py-4" id="tahunTxt" type="number" name="tahun"/>
                                    </div> 
                                    <div class="form-group">
                                        <label  class="mb-1" for="exampleInputFile">Foto</label>
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
                $('#addUnitModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    let id_client = $(e.relatedTarget).data('id-client');
                    let nama = $(e.relatedTarget).data('nama-client');    
                    
                    $(e.currentTarget).find('input[name="id_client"]').val(id_client);
                    $(e.currentTarget).find('input[name="nama_client"]').val(nama); 
                   
                });
            } );

        </script>
    </body>
</html>