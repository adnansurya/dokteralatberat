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
        
        <title><?php echo $webname; ?> - Input Data</title>        
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
                            <h1>Daily Check</h1>
                        </div>                             
                    </div>
                </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                <!-- Default box -->
                <div class="card">
                   
                    <div class="card-body">
                                                           
                        <form action="#" method="post">                                        
                            <div class="form-group">
                                <label class="mb-1" for="clientTxt">Client</label>
                                <select class="selectpicker form-control" data-live-search="true" name="id_client" id="clientSel" title="Pilih Client">
                                    <?php
                                    include 'access/db_access.php';
                                        $load = mysqli_query($conn, "SELECT * FROM client");   
                                        while ($row = mysqli_fetch_array($load)){ 
                                            echo '<option value="'.$row['id_client'].'">'.$row['nama'].'</option>';
                                        }
                                    ?>                                            
                                </select>
                            </div> 
                            <div class="form-group">
                                <label class="mb-1" for="id_unit">Unit</label>
                                <select class="form-control" name="id_unit" title="Pilih Unit" id="unitSel">
                                    <option value="0" disabled selected>Pilih Unit</option>                                                                                                                                        
                                </select>
                            </div> 
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="mb-1" for="tanggal">Tanggal</label> 
                                    <input type="date" name="tanggal" class="form-control">                                                                                
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="mb-1" for="status">Status</label>
                                        <select class="form-control"id="statusSel" name="status">
                                            <option value="operasi">Operasi</option>
                                            <option value="rusak">Rusak</option>
                                            <option value="standby">Standby</option>
                                            <option value="nonjob">Non Job</option>                                       
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="lokasiTxt">Lokasi</label>
                                <input class="form-control py-4" id="lokasiTxt" type="text" name="lokasi"/>
                            </div>                        
                            <div class="row in-job">
                                <div class="col-12">
                                    <p class="mb-1"><b> Jam Kerja</b></p>
                                </div>
                            </div>                            
                            <div class="row in-job">                                
                                <div class="col-6 col-sm-3">
                                    <div class="form-group">                                        
                                        <input class="form-control" id="jamStartTxt" type="number" name="jamStart" placeholder="Start"/>
                                    </div>
                                </div>                                
                                <div class="col-6 col-sm-3">
                                    <div class="form-group">   
                                        <input class="form-control" id="jamStopTxt" type="number" name="jamStop" placeholder="Stop"/>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-6 offset-3 offset-sm-1">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><small><b>Durasi :</b></small> </span>
                                    </div>
                                    <input type="number" class="form-control" id="totalJamTxt" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text"> <b> Jam</b></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="row in-job">
                                <div class="col-12">
                                    <h4 class="mb-0 mt-3">Service</h4>
                                    <hr>
                                </div>
                            </div>
                           
                            <div class="form-group in-job">                               
                                <div class="form-group">
                                    <label class="mb-1" for="jasaTxt">Jasa</label>
                                    <textarea class="form-control" rows="3" placeholder="Masukkan Rincian Jasa" name="jasa" id="jasaTxt"></textarea>
                                </div>
                            </div>
                            <div class="form-group in-job">                               
                                <div class="form-group">
                                    <label class="mb-1" for="sparepartTxt">Sparepart</label>
                                    <textarea class="form-control" rows="3" placeholder="Masukkan Rincian Sparepart" name="sparepart" id="sparepartTxt"></textarea>
                                </div>
                            </div>                           
                                                                                              
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                <button class="btn btn-primary"  type="submit">Simpan</button>
                            </div>
                        </form>                                                                       
                    </div>
                    <!-- /.card-body -->                    
                </div>
                <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include('partials/footer.php'); ?>
        
           
        </div>
        <?php include('partials/scripts.php'); ?>
        <?php include('partials/datatableJs.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">

            let jamStart = null;
            let jamStop = null;
            let totalJam = null;

                
            $(document).ready(function() {    
                $('.selectpicker').selectpicker(); 
                $('#statusSel').change(function() {
                    let status =   $(this).val();
                 
                    if(status == 'nonjob'){
                        $('.in-job').hide();
                        // alert(status);  
                        
                    }else{
                        $('.in-job').show();
                    }
                });
                $('#jamStartTxt').change(function() { 
                    jamStart =  $(this).val();
                    if(jamStart != null && jamStop != null){
                        totalJam = jamStop - jamStart;
                        $('#totalJamTxt').val(totalJam);
                    }
                });
                $('#jamStopTxt').change(function() { 
                    jamStop =  $(this).val();
                    if(jamStart != null && jamStop != null){
                        totalJam = jamStop - jamStart;
                        $('#totalJamTxt').val(totalJam);
                    }
                });
                $('#clientSel').change(function() {
                    let clientId =   $(this).val();

                  
                    $.get( "api/get_unit_by_client.php", { id_client : clientId } )
                        .done(function( data ) {
                            // alert( "Data Loaded: " + data );
                            let dataHasil = JSON.parse(data);
                            console.log(dataHasil);
                            
                            if(dataHasil.result == 'success'){
                                let units = dataHasil.data; 
                                $('#unitSel').html('');
                                $('#unitSel').append(` <option value="0" disabled selected>Pilih Unit</option>`);
                                units.forEach(unit =>{
                                    console.log(unit.model);
                                  
                                    $('#unitSel').append(`
                                        <option value="`+unit.id_unit+`">`+unit.model+` (`+unit.serial_num+`)</option>                                                                                      
                                    `);
                                    
                                    
                                });  
                                $('#unitSel').change();                                
                               
                            //     operator = dataHasil.data;                                
                            //     // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                            //     // console.log(changeForm);
                            //     // alert(penerima.card_id);
                            //     $(e.currentTarget).find('input[name="id_operator"]').val(operator.id_operator);
                            //     $(e.currentTarget).find('input[name="nama"]').val(operator.nama);
                            //     $(e.currentTarget).find('input[name="no_hp"]').val(operator.no_hp);                                           
                                
                            }
                        });

                    });
                    
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
                });   

            

        </script>
    </body>
</html>
