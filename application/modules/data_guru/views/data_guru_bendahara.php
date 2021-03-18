<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url()?>dashboard/master"><strong>Data Master</strong></a></li>
            <li class="active">Data Guru</li>
        </ol>
    </div>
</div>

<div class="row">
	<div class="col-md-3">
		<?php 
            $this->load->view('menu/menu_master');
        ?>
	</div>
	<div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Data Guru</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <table width="100%" class="table table-striped table-bordered">
                                <tr>
                                    <th width="30%" style="background-color: #BDE7FC;">Media</th>
                                    <td width="70%"> 
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#import">Import</button> 
                                        <a href="<?php echo site_url('printer/cetak_guru');?>" target="_blank" class="btn btn-warning btn-sm">Print Data</a></td>
                                </tr>
                                <tr>
                                    <th width="30%" style="background-color: #BDE7FC;">Aksi</th>
                                    <td width="70%"> <button type="button" class="btn btn-info btn-sm" onClick="window.location.reload()">Refresh</button> <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                                    <button type="button" data-toggle="modal" data-target="#semua" class="btn btn-danger btn-sm">Hapus Data Terpilih</button> </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-body bg-info">
                                    <span class="pull-left"><i class="fa fa-user fa-3x"></i></span>
                                    <span class="pull-right"><div class="huge-2x text-right"><?php echo $hitung_guru; ?></div> Data Guru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!-- MODAL BEGIN -->

                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-header-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('data_guru/tambah_data');?>" enctype="multipart/form-data" method="post">
                                        
                                        <div class="form-group">
                                            <h6 for="nama">NIP:</h6>
                                            <input type="text" class="form-control input-sm" name="nip" placeholder="NIP">
                                        </div>
                                        <div class="form-group">
                                            <h6 for="nama">Nama Guru:</h6>
                                            <input type="text" class="form-control input-sm" name="nama_guru" placeholder="Nama Guru">
                                        </div>
                                        <div class="form-group">
                                            <h6 for="nama">Alamat:</h6>
                                            <input type="text" class="form-control input-sm" name="alamat" placeholder="Alamat Guru">
                                        </div>
                                        <div class="form-group">
                                            <h6 for="nama">No Telepon:</h6>
                                            <input type="text" class="form-control input-sm" name="no_telp" placeholder="No Telepon Guru">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-header-success">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Import Excel Data</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('data_guru/import_data');?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <h6 for="nama">Pilih File Excel: <span  id="images" style="display:none;"><img src="<?php echo base_url();?>ajax-loader.gif"> harap tunggu...</span></h6>
                                            <input type="file" class="form-control input-sm" name="file" autofocus="autofocus" required="required">
                                        </div>
                                        <div class="modal-footer">
                                            <p class="pull-left">Contoh Format File Excel <a href="<?php echo base_url();?>assets/backend/excel/contoh-format-guru.xlsx"><code class="text-success">Format Import Excel</code></a></p>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="import" class="btn btn-success">Import Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- MODAL END -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                            <form action="<?php echo site_url('data_guru/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="modal fade" id="semua" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-danger">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data Yang Dipilih</h4>
                                            </div>
                                            <div class="modal-body">
                                                        <p>Apakah anda yakin akan menghapus data yang terpilih ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <table id="table-scroll" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll" name="checkAll"></th>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $nomer=1; foreach ($data_guru as $baris) { ;?>
                                    <tr>
                                        <td><input type="checkbox" name="msg[]" value="<?php echo $baris->id_guru; ?>"></td>
                                        <td><?php echo $nomer ;?></td>
                                        <td><?php echo $baris->nip ;?></td>
                                        <td><?php echo $baris->nama_guru ;?></td>
                                        <td><?php echo $baris->alamat ;?></td>
                                        <td><?php echo $baris->no_telp ;?></td>
                                        <td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil" ></i></a> 
                                        <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
                                    </tr>   
                            </form>
                                <!-- MODAL BEGIN  -->
                                    <div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-primary">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->nama_guru; ?></code></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo site_url('data_guru/edit_data');?>" enctype="multipart/form-data" method="post">
                                                        <input type="hidden" class="form-control" name="id_guru" value="<?php echo $baris->id_guru; ?>">
                                                        <div class="form-group">
                                                            <h6 for="nama">NIP:</h6>
                                                            <input type="text" class="form-control input-sm" name="nip" value="<?php echo $baris->nip;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 for="nama">Nama Guru:</h6>
                                                            <input type="text" class="form-control input-sm" name="nama_guru" value="<?php echo $baris->nama_guru ;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 for="nama">Alamat:</h6>
                                                            <input type="text" class="form-control input-sm" name="alamat" value="<?php echo $baris->alamat ;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <h6 for="nama">No Telepon:</h6>
                                                            <input type="text" class="form-control input-sm" name="no_telp" value="<?php echo $baris->no_telp ;?>">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="hapus<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-danger">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo site_url('data_guru/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                        <input type="hidden" class="form-control" name="id_guru" value="<?php echo $baris->id_guru; ?>">
                                                            <p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama_guru; ?></code> ?</p>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL END -->

                                <?php $nomer++; } ?>
                                </tbody>
                            </table>
                  </div>    
                </div>
            </div>
        </div>


        <!-- END FILE -->

            <script type="text/javascript">
                $(document).ready(function() {
                    $("input[name='checkAll']").click(function() {
                        var checked = $(this).attr("checked");
                        $("#table tr td input:checkbox").attr("checked", checked);
                    });
                });
                $("#checkAll").click(function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });
            </script>

            <script type="text/javascript">
            $(document).ready(function(){

                $("button[name='import']").click(function(){
                     $('#images').show();
                     if(valid)
                        return true;
                     else
                        {
                          $(this).removeAttr('disabled');
                          $('#images').hide();     
                          return false;
                        }
                 });
                 
            });
                 
            </script>
    </div>
</div>