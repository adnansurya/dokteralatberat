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
        
        <title><?php echo $webname; ?> - Unit</title>        
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
                            <h1>Unit</h1>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-sm float-right"  data-toggle="modal" data-target="#addUnitModal">Tambah Unit</button>    
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
                                        <th>No. ID</th>
                                        <th>Model</th>
                                        <th>Serial Number</th>
                                        <th>Client</th>
                                        <th>Tahun</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            include 'access/db_access.php';
                                            $sql = "SELECT unit.*, client.nama as nama_client 
                                            FROM unit 
                                            LEFT JOIN client 
                                            ON unit.client = client.id_client 
                                            ORDER BY unit.id_unit DESC";
                                                                                
                                            $load = mysqli_query($conn, $sql);   
                                            while ($row = mysqli_fetch_array($load)){                                         
                                            echo '<tr>';
                                                echo '<td>'.$row['id_unit'].'</td>';
                                                echo '<td>'.$row['no_id'].'</td>';
                                                echo '<td>'.$row['model'].'</td>';
                                                echo '<td>'.$row['serial_num'].'</td>';
                                                echo '<td>'.$row['nama_client'].'</td>';                                                                                 
                                                echo '<td>'.$row['tahun'].'</td>';
                                                echo '<td>-</td>';
                                                echo '<td>
                                                    <button type="button" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#editUnitModal" 
                                                    data-id-unit="'.$row['id_unit'].'"><i class="fas fa-edit"></i> Edit Data</button>
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
                                        <input class="form-control py-4" id="clientTxt" type="text" name="client"/>
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
                <div class="modal fade" id="editUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Unit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                    
                                <form action="access/edit_unit.php" method="post">   
                                    <input type="hidden" name="id_unit">                                     
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
                                        <!-- <input class="form-control py-4" id="clientTxt" type="text" name="client"/> -->
                                        <select class="selectpicker form-control" data-live-search="true">
                                            <?php
                                                 $load = mysqli_query($conn, "SELECT * FROM client");   
                                                 while ($row = mysqli_fetch_array($load)){ 
                                                    echo '<option value="'.$row['id_client'].'">'.$row['nama'].'</option>';
                                                 }
                                            ?>                                            
                                        </select>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">

                
            $(document).ready(function() {
                $('.selectpicker').selectpicker();
                $('#editUnitModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    let id_unit = $(e.relatedTarget).data('id-unit');                     
                    let unit;               

                    $.get( "api/get_unit.php", { id : id_unit } )
                        .done(function( data ) {
                            // alert( "Data Loaded: " + data );
                            let dataHasil = JSON.parse(data);
                            
                            if(dataHasil.result == 'success'){
                                unit = dataHasil.data;                                
                                // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                                // console.log(changeForm);
                                // alert(penerima.card_id);
                                $(e.currentTarget).find('input[name="id_unit"]').val(unit.id_unit);
                                $(e.currentTarget).find('input[name="no_id"]').val(unit.no_id);
                                $(e.currentTarget).find('input[name="model"]').val(unit.model);
                                $(e.currentTarget).find('input[name="serial_num"]').val(unit.serial_num);                                
                                $(e.currentTarget).find('input[name="tahun"]').val(unit.tahun);                                
                                $(e.currentTarget).find('input[name="client"]').val(unit.client);                
                                
                            }
                        });
                   
                });
            } );

        </script>
    </body>
</html>
