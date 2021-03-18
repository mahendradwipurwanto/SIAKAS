<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb alert alert-white" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url()?>dashboard/master"><strong>Data Master</strong></a></li>
            <li class="active">Data Siswa</li>
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
                    <div class="panel-body bg-info">
                        <form action="<?php echo site_url('data_siswa/setpilih');?>" enctype="multipart/form-data" method="POST" class="form-inline">
                            <label style="width:15%">Pilih Jurusan :</label>
                                    <select name="id_jurusan" id="id_jurusan" class="form-control" style="width:25%">
                                        <option value="0">Pilih Jurusan</option>
                                        <?php foreach ($data_jurusan as $baris) { ?>
                                            <option value="<?php echo $baris->id_jurusan;?>"><?php echo $baris->nama_jurusan;?></option>
                                        <?php }?>
                                    </select>
                            <label style="width:15%">Pilih Kelas :</label>
                                    <select class="form-control" name="pilihan" id="kelas" style="width:25%">
                                        <option value="0">Pilih Kelas</option>
                                    </select>
                                    
                                    <button type="submit" class="btn btn-success pull-right" style="width:12%">Tampilkan</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- modal -->

                                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('data_siswa/tambah_data');?>" enctype="multipart/form-data" method="post">
                                                    
                                                    <?php $nomer=1; foreach ($kelas as $row2) { ;?>
                                                    <input type="hidden" class="form-control input-sm" name="id_kelas" value="<?php echo $row2->id_kelas ;?>">
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Kelas:</h6>
                                                        <input type="text" class="form-control input-sm" value="<?php echo $row2->nama_kelas ;?>" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                        <h6 for="nama">NIS:</h6>
                                                        <input type="text" class="form-control input-sm" name="nis" placeholder="NIS">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Nama:</h6>
                                                        <input type="text" class="form-control input-sm" name="nama" placeholder="Nama">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Alamat:</h6>
                                                        <input type="text" class="form-control input-sm" name="alamat" placeholder="Alamat">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Jenis Kelamin:</h6>
                                                        <select class="form-control" name="jk">
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Tempat Lahir:</h6>
                                                        <input type="text" class="form-control input-sm" name="tempat_lahir" placeholder="Tempat Lahir">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Tanggal Lahir:</h6>
                                                        <input type="date" class="form-control input-sm" name="tanggal_lahir" placeholder="Tanggal Lahir">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Agama:</h6>
                                                        <input type="text" class="form-control input-sm" name="agama" placeholder="Agama">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">No Telepon:</h6>
                                                        <input type="text" class="form-control input-sm" name="no_telp" placeholder="No Telepon">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Nama Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="nama_wali" placeholder="Nama Wali">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Alamat Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="alamat_wali" placeholder="Alamat Wali">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Pekerjaan Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="pekerjaan" placeholder="Pekerjaan Wali">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">No Telepon Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="no_telp_ortu" placeholder="No Telepon Wali">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success btn-sm pull-left" data-toggle="modal" data-target="#import">Import</button>
                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                                    </div>

                                                    <?php } ?>
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
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('data_siswa/import_data');?>" enctype="multipart/form-data" method="post">
                                                    <div class="form-group">
                                                        <h6 for="nama">Pilih File Excel: <span  id="images" style="display:none;"><img src="<?php echo base_url();?>ajax-loader.gif"> harap tunggu...</span></h6>
                                                        <input type="file" class="form-control input-sm" name="file" autofocus="autofocus" required="required">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <p class="pull-left">Contoh Format File Excel <a href="<?php echo base_url();?>/assets/backend/contoh-format-siswa.xlsx"><code class="text-success">Format Import Excel</code></a></p>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                       <button type="submit" name="import" class="btn btn-success">Import Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal -->

            <div class="col-md-12">
                <div class="well well-small well-box">
            <form action="<?php echo site_url('data_siswa/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="delete">

            <?php $nomer=1; foreach ($kelas as $rows) { ;?>

            <div class="panel panel-success">
              <div class="panel-heading"><code class="text text-danger"><strong>Data Siswa</strong></code> <code class="label label-danger"><strong><?php echo $rows->nama_kelas ?></strong></code> <code class="label label-success">Jumlah Siswa <strong><?php echo $hitung_siswa ?></strong></code> <a class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#tambah" style="margin-left: 5px;">Tambah Data</a> <a href="<?php echo base_url();?>printer/cetak_siswa/<?php echo $id_kelas ?>" class="btn btn-warning btn-xs pull-right" style="margin-left: 5px;">Print Data</a> <button type="submit" class="btn btn-danger btn-xs pull-right">Hapus Data Terpilih</button> 
            </div>

            <?php } ?>

              <div class="panel-body">
                <table id="table-scroll" class="table table-striped table-bordered" width="100%">  
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" name="checkAll"></th>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>J/K</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>No Telp</th>
                                    <th>Nama Wali</th>
                                    <th>Alamat Wali</th>
                                    <th>Pekerjaan Wali</th>
                                    <th>No Telepon Wali</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $nomer=1; foreach ($data_siswa as $baris) { ;?>
                                <tr>
                                    <td><input type="checkbox" name="msg[]" value="<?php echo $baris->nis; ?>"></td>
                                    <td><?php echo $nomer ;?></td>
                                    <td><?php echo $baris->nis ;?></td>
                                    <td><?php echo $baris->nama ;?></td>
                                    <td><?php echo $baris->alamat ;?></td>
                                    <td><?php echo $baris->jk ;?></td>
                                    <td><?php echo $baris->tempat_lahir ;?></td>
                                    <td><?php echo $baris->tanggal_lahir ;?></td>
                                    <td><?php echo $baris->agama ;?></td>
                                    <td><?php echo $baris->no_telp ;?></td>
                                    <td><?php echo $baris->nama_wali ;?></td>
                                    <td><?php echo $baris->alamat_wali ;?></td>
                                    <td><?php echo $baris->pekerjaan ;?></td>
                                    <td><?php echo $baris->no_telp_ortu ;?></td>
                                    <td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $nomer; ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapus<?php echo $nomer; ?>"><i class="fa fa-eraser"></i></a></td>
                                </tr>   
                                <!-- modal -->
                            </form>
                                <div class="modal fade" id="edit<?php echo $nomer; ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Edit data dari <code class="text-success"><?php echo $baris->nama; ?></code></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('data_siswa/edit_data');?>" enctype="multipart/form-data" method="post">

                                                    <input type="hidden" class="form-control input-sm" name="id_kelas" value="<?php echo $baris->id_kelas ;?>">

                                                    <div class="form-group">
                                                        <h6 for="nama">Kelas:</h6>
                                                        <input type="text" class="form-control input-sm" value="<?php echo $baris->nama_kelas ;?>" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                        <h6 for="nama">NIS:</h6>
                                                        <input type="text" class="form-control input-sm" name="nis" value="<?php echo $baris->nis ;?>" readonly>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Nama:</h6>
                                                        <input type="text" class="form-control input-sm" name="nama" value="<?php echo $baris->nama ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Alamat:</h6>
                                                        <input type="text" class="form-control input-sm" name="alamat" value="<?php echo $baris->alamat ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Jenis Kelamin:</h6>
                                                        <select class="form-control" name="jk">
                                                            <option value="<?php echo $baris->jk ;?>"><?php echo $baris->jk ;?></option>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Tempat Lahir:</h6>
                                                        <input type="text" class="form-control input-sm" name="tempat_lahir" value="<?php echo $baris->tempat_lahir ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Tanggal Lahir:</h6>
                                                        <input type="date" class="form-control input-sm" name="tanggal_lahir" value="<?php echo $baris->tanggal_lahir ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Agama:</h6>
                                                        <input type="text" class="form-control input-sm" name="agama" value="<?php echo $baris->agama ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">No Telepon:</h6>
                                                        <input type="text" class="form-control input-sm" name="no_telp" value="<?php echo $baris->no_telp ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Nama Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="nama_wali" value="<?php echo $baris->nama_wali ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Alamat Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="alamat_wali" value="<?php echo $baris->alamat_wali ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">Pekerjaan Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="pekerjaan" value="<?php echo $baris->pekerjaan ;?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6 for="nama">No Telepon Wali:</h6>
                                                        <input type="text" class="form-control input-sm" name="no_telp_ortu" value="<?php echo $baris->no_telp_ortu ;?>">
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
                                                <form action="<?php echo site_url('data_siswa/hapus_data');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                    <input type="hidden" class="form-control" name="nis" value="<?php echo $baris->nis; ?>">
                                                        <p>Apakah anda yakin akan menghapus data dari: <code class="text-danger"><?php echo $baris->nama; ?></code> ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal -->

                            <?php $nomer++; } ?>
                            </tbody>
                        </table>
                  </div>    
                </div>
            </div>
        </div>

                                

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
                    $("#id_jurusan").change(function(){
                            var id_jurusan = {id_jurusan:$("#id_jurusan").val()};
                               $.ajax({
                           type: "POST",
                           url : "<?php echo site_url(); ?>data_siswa/turun",
                           data: id_jurusan,
                           success: function(msg){
                           $('#kelas').html(msg);
                           }
                        });
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
</div>