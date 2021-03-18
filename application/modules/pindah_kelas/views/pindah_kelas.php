            <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header modal-header-warning">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Perhatian!!!</h4>
                        </div>
                        <div class="modal-body bg-warning">
                            <p class="text-danger">Gunakan Fitur ini dengan hati-hati!!!</p>
                            <div class="modal-footer">
                                <button class="btn btn-warning btn-sm btn-block" data-dismiss="modal"><i class="fa fa-check fa-lg"></i> Mengerti...</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#alert').modal('show');
            </script>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger"><strong>Pilih kelas yang ingin dipindah dan pilih kelas tujuan.</strong></div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <form action="<?php echo site_url('pindah_kelas/pindah_kelasnya');?>" method="POST" class="form">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <label class="title">Kelas Asal</label>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <span class="control-label col-sm-4">Pilih Kelas</span>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="id_kelas" name="id_kelas">
                                                    <option value="">Pilih Kelas</option>
                                                    <?php foreach ($data_kelas as $baris) { ?>
                                                    <option value="<?php echo $baris->id_kelas;?>"><?php echo $baris->nama_kelas;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <label class="title">Kelas Tujuan</label>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <span class="control-label col-sm-4">Pilih Kelas</span>
                                            <div class="col-sm-8">
                                                <div id="kelas">
                                                    <select class="form-control" name="kelas_tujuan" disabled="disabled">
                                                        <option value="">Pilih Kelas</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr style="border-bottom: 1px solid #f8f8f8;">
                        </div>

                        <div class="col-md-4 col-md-offset-4">
                            <a href="" data-toggle="modal" data-target="#konfirmasi" class="btn btn-primary btn-sm btn-block"><i class="fa fa-retweet fa-lg"></i> PINDAH KELAS</a>
                        </div>

                        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Perhatian!!!</h4>
                                    </div>
                                    <div class="modal-body bg-warning">
                                        <p class="text-danger">Apakah Anda Yakin Ingin Memindahkan kelas tersebut???</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-log-off fa-lg"></i> Cancel</button>
                                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-check fa-lg"></i> Yakin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        <script type="text/javascript"> 
            $("#id_kelas").change(function(){
                    var id_kelas = {id_kelas:$("#id_kelas").val()};
                       $.ajax({
                   type: "POST",
                   url : "<?php echo site_url(); ?>pindah_kelas/kelas",
                   data: id_kelas,
                   success: function(msg){
                   $('#kelas').html(msg);
                   }
                });
                  });
       </script>